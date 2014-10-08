<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Enums\EServerInstanceStatus;
use Saklient\Errors\SaklientException;
use Saklient\Errors\HttpConflictException;
use Saklient\Cloud\Resources\LoadBalancer;

class LoadBalancerTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}

	/**
	 * @depends testAuthorize
	 */
	public function testCrud(API $api)
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . substr(uniqid(),0,6);
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		$cpu = 1;
		$mem = 2;
		$hostName = "saklient-test";
		$sshPublicKey = "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQC3sSg8Vfxrs3eFTx3G//wMRlgqmFGxh5Ia8DZSSf2YrkZGqKbL1t2AsiUtIMwxGiEVVBc0K89lORzra7qoHQj5v5Xlcdqodgcs9nwuSeS38XWO6tXNF4a8LvKnfGS55+uzmBmVUwAztr3TIJR5TTWxZXpcxSsSEHx7nIcr31zcvosjgdxqvSokAsIgJyPQyxCxsPK8SFIsUV+aATqBCWNyp+R1jECPkd74ipEBoccnA0pYZnRhIsKNWR9phBRXIVd5jx/gK5jHqouhFWvCucUs0gwilEGwpng3b/YxrinNskpfOpMhOD9zjNU58OCoMS8MA17yqoZv59l3u16CrnrD saklient-test@local";
		$sshPrivateKeyFile = dirname(dirname(__DIR__)) . "/test-sshkey.txt";
		
		// search a switch
		fprintf(\STDERR, "searching a swytch...\n");
		$swytches = $api->swytch->withTag("lb-attached")->limit(1)->find();
		$this->assertGreaterThan(0, count($swytches));
		$swytch = $swytches[0];
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
		$this->assertGreaterThan(0, count($swytch->ipv4Nets));
		$net = $swytch->ipv4Nets[0];
		fprintf(\STDERR, "%s/%d -> %s\n", $net->address, $net->maskLen, $net->defaultRoute);
		
		// create a loadbalancer
		fprintf(\STDERR, "creating a LB...\n");
		$vrid = 123;
		$lb = $api->appliance->createLoadBalancer($swytch, $vrid, ["133.242.255.244", "133.242.255.245"], true);
		
		$ok = false;
		try {
			$lb->save();
		}
		catch (SaklientException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('Requiredフィールドが未set時は SaklientException がスローされなければなりません');
		$lb->name = $name;
		$lb->description = "";
		$lb->tags = [$tag];
		$lb->save();
		
		$lb->reload();
		$this->assertEquals($net->defaultRoute, $lb->defaultRoute);
		$this->assertEquals($net->maskLen, $lb->maskLen);
		$this->assertEquals($vrid, $lb->vrid);
		$this->assertEquals($swytch->id, $lb->swytchId);
		
		// wait the LB becomes up
		fprintf(\STDERR, "waiting the LB becomes up...\n");
		if (!$lb->sleepUntilUp()) $this->fail("ロードバランサが正常に起動しません");
		
		// stop the LB
		sleep(1);
		fprintf(\STDERR, "stopping the LB...\n");
		if (!$lb->stop()->sleepUntilDown()) $this->fail('ロードバランサが正常に停止しません');
		
		// delete the LB
		fprintf(\STDERR, "deleting the LB...\n");
		$lb->destroy();
		
//		// disconnect the disk from the server
//		fprintf(\STDERR, "disconnecting the disk from the server...\n");
//		$disk->disconnect();
//		
//		// delete the server
//		fprintf(\STDERR, "deleting the server...\n");
//		$server->destroy();
//		
//		$disk2 = null;
//		if (self::TESTS_DUPLICATE_DISK) {
//			// duplicate the disk
//			fprintf(\STDERR, "duplicating the disk (expanding to 40GiB)...\n");
//			$disk2 = $api->disk->create();
//			$disk2->name = $name . "-copy";
//			$disk2->description = $description;
//			$disk2->tags = [$tag];
//			$disk2->plan = $api->product->disk->hdd;
//			$disk2->source = $disk;
//			$disk2->sizeGib = 40;
//			$disk2->save();
//			
//			// wait disk duplication
//			fprintf(\STDERR, "waiting disk duplication...\n");
//			if (!$disk2->sleepWhileCopying()) $this->fail("ディスクの複製がタイムアウトしました");
//			$disk2->source = null;
//			$disk2->reload();
//			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Disk", $disk2->source);
//			$this->assertEquals($disk->id, $disk2->source->id);
//			$this->assertEquals(40, $disk2->sizeGib);
//		}
		
	}
	
}
