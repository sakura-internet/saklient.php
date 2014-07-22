<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;
use SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;
use SakuraInternet\Saclient\Cloud\Errors\HttpConflictException;
use SakuraInternet\Saclient\Cloud\Resource\Server;

class ServerTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	const TESTS_DUPLICATE_DISK = false;
	const TESTS_CONFIG_DISK = false;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}

	/**
	 * @depends testAuthorize
	 */
	public function testFind(API $api)
	{
		$servers = $api->server->find();
		$this->assertInstanceOf("ArrayObject", $servers);
		$this->assertCountAtLeast(1, $servers, "server");
		foreach ($servers as $server) {
			$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Server", $server);
			$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\ServerPlan", $server->plan);
			$this->assertGreaterThanOrEqual(1, $server->plan->cpu);
			$this->assertGreaterThanOrEqual(1, $server->plan->memoryMib);
			$this->assertGreaterThanOrEqual(1, $server->plan->memoryGib);
			$this->assertEquals($server->plan->memoryMib / $server->plan->memoryGib, 1024);
			$this->assertInstanceOf("ArrayObject", $server->tags);
			foreach ($server->tags as $tag) {
				$this->assertTrue(is_string($tag));
			}
		}
		
		$servers = $api->server->limit(1)->find();
		$this->assertEquals(1, count($servers));
	}

	/**
	 * @depends testAuthorize
	 */
	public function testCrud(API $api)
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saclient PHPUnit Test";
		$tag = "saclient-test";
		$cpu = 1;
		$mem = 2;
		$hostName = "saclient-test";
		$sshPublicKey = "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQC3sSg8Vfxrs3eFTx3G//wMRlgqmFGxh5Ia8DZSSf2YrkZGqKbL1t2AsiUtIMwxGiEVVBc0K89lORzra7qoHQj5v5Xlcdqodgcs9nwuSeS38XWO6tXNF4a8LvKnfGS55+uzmBmVUwAztr3TIJR5TTWxZXpcxSsSEHx7nIcr31zcvosjgdxqvSokAsIgJyPQyxCxsPK8SFIsUV+aATqBCWNyp+R1jECPkd74ipEBoccnA0pYZnRhIsKNWR9phBRXIVd5jx/gK5jHqouhFWvCucUs0gwilEGwpng3b/YxrinNskpfOpMhOD9zjNU58OCoMS8MA17yqoZv59l3u16CrnrD saclient-test@local";
		$sshPrivateKeyFile = dirname(dirname(dirname(__DIR__))) . "/test-sshkey.txt";
		
		// search archives
		echo "searching archives...\n";
		$archives = $api->archive
			->withNameLike('CentOS 6.5 64bit')
			->withSizeGib(20)
			->withSharedScope()
			->limit(1)
			->find();
		$this->assertGreaterThan(0, count($archives));
		$archive = $archives[0];
		
		// create a disk
		echo "creating a disk...\n";
		$disk = $api->disk->create();
		$disk->name = $name;
		$disk->description = $description;
		$disk->tags = [$tag];
		$disk->source = $archive;
		$disk->save();
		
		// create a server
		echo "creating a server...\n";
		$server = $api->server->create();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Server", $server);
		$server->name = $name;
		$server->description = $description;
		$server->tags = [$tag];
		$server->plan = $api->product->server->getBySpec($cpu, $mem);
		$server->save();
		
		// check the server properties
		$this->assertGreaterThan(0, $server->id);
		$this->assertEquals($server->name, $name);
		$this->assertEquals($server->description, $description);
		$this->assertInstanceOf("\\ArrayObject", $server->tags);
		$this->assertEquals(count($server->tags), 1);
		$this->assertEquals($server->tags[0], $tag);
		$this->assertEquals($server->plan->cpu, $cpu);
		$this->assertEquals($server->plan->memoryGib, $mem);
		
		// connect to shared segment
		echo "connecting the server to shared segment...\n";
		$iface = $server->addIface();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Iface", $iface);
		$this->assertGreaterThan(0, $iface->id);
		$iface->connectToSharedSegment();
		
		// wait disk copy
		echo "waiting disk copy...\n";
		if (!$disk->sleepWhileCopying()) $this->fail("アーカイブからディスクへのコピーがタイムアウトしました");
		$disk->source = null;
		$disk->reload();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Archive", $disk->source);
		$this->assertEquals($archive->id, $disk->source->id);
		$this->assertEquals($archive->sizeGib, $disk->sizeGib);
		
		// connect the disk to the server
		echo "connecting the disk to the server...\n";
		$disk->connectTo($server);
		
		if (self::TESTS_CONFIG_DISK) {
			// config the disk
			$diskconf = $disk->createConfig();
			$diskconf->hostName = "saclient-test";
			$diskconf->password = uniqid();
			$diskconf->sshKey = $sshPublicKey;
			$diskconf->write();
		}
		
		// boot
		echo "booting the server...\n";
		$server->boot();
		sleep(3);
		
		// boot conflict
		echo "checking the server power conflicts...\n";
		$ok = false;
		try {
			$server->boot();
		}
		catch (HttpConflictException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('サーバ起動中の起動試行時は HttpConflictException がスローされなければなりません');
		
		if (self::TESTS_CONFIG_DISK) {
			// ssh
			$ipAddress = $server->ifaces[0]->ipAddress;
			$this->assertNotEmpty($ipAddress);
			$cmd = "ssh -oStrictHostKeyChecking=no -oUserKnownHostsFile=/dev/null -i$sshPrivateKeyFile root@$ipAddress hostname 2>/dev/null";
			$sshSuccess = false;
			echo "trying to SSH to the server...\n";
			for ($i=0; $i<10; $i++) {
				sleep(5);
				if ($hostName != trim(`$cmd`)) continue;
				$sshSuccess = true;
				break;
			}
			$this->assertTrue($sshSuccess, '作成したサーバへ正常にSSHできません');
		}
		
		// stop
		sleep(1);
		echo "stopping the server...\n";
		if (!$server->stop()->sleepUntilDown()) $this->fail('サーバが正常に停止しません');
		
		// disconnect the disk from the server
		echo "disconnecting the disk from the server...\n";
		$disk->disconnect();
		
		// delete the server
		echo "deleting the server...\n";
		$server->destroy();
		
		$disk2 = null;
		if (self::TESTS_DUPLICATE_DISK) {
			// duplicate the disk
			echo "duplicating the disk (expanding to 40GiB)...\n";
			$disk2 = $api->disk->create();
			$disk2->name = $name . "-copy";
			$disk2->description = $description;
			$disk2->tags = [$tag];
			$disk2->source = $disk;
			$disk2->sizeGib = 40;
			$disk2->save();
			
			// wait disk duplication
			echo "waiting disk duplication...\n";
			if (!$disk2->sleepWhileCopying()) $this->fail("ディスクの複製がタイムアウトしました");
			$disk2->source = null;
			$disk2->reload();
			$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Disk", $disk2->source);
			$this->assertEquals($disk->id, $disk2->source->id);
			$this->assertEquals(40, $disk2->sizeGib);
		}
		
		// delete the disks
		echo "deleting the disks...\n";
		if ($disk2) $disk2->destroy();
		$disk->destroy();
		
	}
	
}
