<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpBadGatewayException.php";
use \Saklient\Errors\HttpBadGatewayException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpBadRequestException.php";
use \Saklient\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpExpectationFailedException.php";
use \Saklient\Errors\HttpExpectationFailedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpFailedDependencyException.php";
use \Saklient\Errors\HttpFailedDependencyException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpGatewayTimeoutException.php";
use \Saklient\Errors\HttpGatewayTimeoutException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpGoneException.php";
use \Saklient\Errors\HttpGoneException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpHttpVersionNotSupportedException.php";
use \Saklient\Errors\HttpHttpVersionNotSupportedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpInsufficientStorageException.php";
use \Saklient\Errors\HttpInsufficientStorageException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpInternalServerErrorException.php";
use \Saklient\Errors\HttpInternalServerErrorException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpLengthRequiredException.php";
use \Saklient\Errors\HttpLengthRequiredException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpLockedException.php";
use \Saklient\Errors\HttpLockedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpMethodNotAllowedException.php";
use \Saklient\Errors\HttpMethodNotAllowedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpNotAcceptableException.php";
use \Saklient\Errors\HttpNotAcceptableException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpNotExtendedException.php";
use \Saklient\Errors\HttpNotExtendedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpNotFoundException.php";
use \Saklient\Errors\HttpNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpNotImplementedException.php";
use \Saklient\Errors\HttpNotImplementedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpPaymentRequiredException.php";
use \Saklient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpPreconditionFailedException.php";
use \Saklient\Errors\HttpPreconditionFailedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpProxyAuthenticationRequiredException.php";
use \Saklient\Errors\HttpProxyAuthenticationRequiredException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpRequestEntityTooLargeException.php";
use \Saklient\Errors\HttpRequestEntityTooLargeException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpRequestTimeoutException.php";
use \Saklient\Errors\HttpRequestTimeoutException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpRequestUriTooLongException.php";
use \Saklient\Errors\HttpRequestUriTooLongException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpRequestedRangeNotSatisfiableException.php";
use \Saklient\Errors\HttpRequestedRangeNotSatisfiableException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpUnauthorizedException.php";
use \Saklient\Errors\HttpUnauthorizedException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpUnprocessableEntityException.php";
use \Saklient\Errors\HttpUnprocessableEntityException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpUnsupportedMediaTypeException.php";
use \Saklient\Errors\HttpUnsupportedMediaTypeException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpUpgradeRequiredException.php";
use \Saklient\Errors\HttpUpgradeRequiredException;
require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpVariantAlsoNegotiatesException.php";
use \Saklient\Errors\HttpVariantAlsoNegotiatesException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccessApiKeyDisabledException.php";
use \Saklient\Cloud\Errors\AccessApiKeyDisabledException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccessSakuraException.php";
use \Saklient\Cloud\Errors\AccessSakuraException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccessStaffException.php";
use \Saklient\Cloud\Errors\AccessStaffException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccessTokenException.php";
use \Saklient\Cloud\Errors\AccessTokenException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccessXhrOrApiKeyException.php";
use \Saklient\Cloud\Errors\AccessXhrOrApiKeyException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccountNotFoundException.php";
use \Saklient\Cloud\Errors\AccountNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AccountNotSpecifiedException.php";
use \Saklient\Cloud\Errors\AccountNotSpecifiedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AmbiguousIdentifierException.php";
use \Saklient\Cloud\Errors\AmbiguousIdentifierException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/AmbiguousZoneException.php";
use \Saklient\Cloud\Errors\AmbiguousZoneException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ApiProxyTimeoutException.php";
use \Saklient\Cloud\Errors\ApiProxyTimeoutException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ApiProxyTimeoutNonGetException.php";
use \Saklient\Cloud\Errors\ApiProxyTimeoutNonGetException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ArchiveIsIncompleteException.php";
use \Saklient\Cloud\Errors\ArchiveIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/BootFailureByLockException.php";
use \Saklient\Cloud\Errors\BootFailureByLockException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/BootFailureInGroupException.php";
use \Saklient\Cloud\Errors\BootFailureInGroupException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/BusyException.php";
use \Saklient\Cloud\Errors\BusyException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CantResizeSmallerException.php";
use \Saklient\Cloud\Errors\CantResizeSmallerException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CdromDeviceLockedException.php";
use \Saklient\Cloud\Errors\CdromDeviceLockedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CdromDisabledException.php";
use \Saklient\Cloud\Errors\CdromDisabledException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CdromInUseException.php";
use \Saklient\Cloud\Errors\CdromInUseException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CdromIsIncompleteException.php";
use \Saklient\Cloud\Errors\CdromIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ConnectToSameSwitchException.php";
use \Saklient\Cloud\Errors\ConnectToSameSwitchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ContractCreationException.php";
use \Saklient\Cloud\Errors\ContractCreationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/CopyToItselfException.php";
use \Saklient\Cloud\Errors\CopyToItselfException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DeleteDiskB4TemplateException.php";
use \Saklient\Cloud\Errors\DeleteDiskB4TemplateException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DeleteIpV6NetsFirstException.php";
use \Saklient\Cloud\Errors\DeleteIpV6NetsFirstException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DeleteResB4AccountException.php";
use \Saklient\Cloud\Errors\DeleteResB4AccountException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DeleteRouterB4SwitchException.php";
use \Saklient\Cloud\Errors\DeleteRouterB4SwitchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DeleteStaticRouteFirstException.php";
use \Saklient\Cloud\Errors\DeleteStaticRouteFirstException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DisconnectB4DeleteException.php";
use \Saklient\Cloud\Errors\DisconnectB4DeleteException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DisconnectB4UpdateException.php";
use \Saklient\Cloud\Errors\DisconnectB4UpdateException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskConnectionLimitException.php";
use \Saklient\Cloud\Errors\DiskConnectionLimitException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskIsCopyingException.php";
use \Saklient\Cloud\Errors\DiskIsCopyingException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskIsNotAvailableException.php";
use \Saklient\Cloud\Errors\DiskIsNotAvailableException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskLicenseMismatchException.php";
use \Saklient\Cloud\Errors\DiskLicenseMismatchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskOrSsInMigrationException.php";
use \Saklient\Cloud\Errors\DiskOrSsInMigrationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DiskStockRunOutException.php";
use \Saklient\Cloud\Errors\DiskStockRunOutException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DnsARecordNotFoundException.php";
use \Saklient\Cloud\Errors\DnsARecordNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DnsAaaaRecordNotFoundException.php";
use \Saklient\Cloud\Errors\DnsAaaaRecordNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DnsPtrUpdateFailureException.php";
use \Saklient\Cloud\Errors\DnsPtrUpdateFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DuplicateAccountCodeException.php";
use \Saklient\Cloud\Errors\DuplicateAccountCodeException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DuplicateEntryException.php";
use \Saklient\Cloud\Errors\DuplicateEntryException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/DuplicateUserCodeException.php";
use \Saklient\Cloud\Errors\DuplicateUserCodeException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FileNotUploadedException.php";
use \Saklient\Cloud\Errors\FileNotUploadedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FilterArrayComparisonException.php";
use \Saklient\Cloud\Errors\FilterArrayComparisonException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FilterBadOperatorException.php";
use \Saklient\Cloud\Errors\FilterBadOperatorException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FilterNullComparisonException.php";
use \Saklient\Cloud\Errors\FilterNullComparisonException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FilterUnknownOperatorException.php";
use \Saklient\Cloud\Errors\FilterUnknownOperatorException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FtpCannotCloseException.php";
use \Saklient\Cloud\Errors\FtpCannotCloseException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FtpIsAlreadyCloseException.php";
use \Saklient\Cloud\Errors\FtpIsAlreadyCloseException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FtpIsAlreadyOpenException.php";
use \Saklient\Cloud\Errors\FtpIsAlreadyOpenException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/FtpMustBeClosedException.php";
use \Saklient\Cloud\Errors\FtpMustBeClosedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/HostOperationFailureException.php";
use \Saklient\Cloud\Errors\HostOperationFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/IllegalDasUsageException.php";
use \Saklient\Cloud\Errors\IllegalDasUsageException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/InMigrationException.php";
use \Saklient\Cloud\Errors\InMigrationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/InvalidFormatException.php";
use \Saklient\Cloud\Errors\InvalidFormatException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/InvalidParamCombException.php";
use \Saklient\Cloud\Errors\InvalidParamCombException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/InvalidRangeException.php";
use \Saklient\Cloud\Errors\InvalidRangeException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/InvalidUriArgumentException.php";
use \Saklient\Cloud\Errors\InvalidUriArgumentException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/IpV6NetAlreadyAttachedException.php";
use \Saklient\Cloud\Errors\IpV6NetAlreadyAttachedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitCountInAccountException.php";
use \Saklient\Cloud\Errors\LimitCountInAccountException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitCountInMemberException.php";
use \Saklient\Cloud\Errors\LimitCountInMemberException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitCountInNetworkException.php";
use \Saklient\Cloud\Errors\LimitCountInNetworkException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitCountInRouterException.php";
use \Saklient\Cloud\Errors\LimitCountInRouterException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitCountInZoneException.php";
use \Saklient\Cloud\Errors\LimitCountInZoneException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitMemoryInAccountException.php";
use \Saklient\Cloud\Errors\LimitMemoryInAccountException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/LimitSizeInAccountException.php";
use \Saklient\Cloud\Errors\LimitSizeInAccountException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/MissingIsoImageException.php";
use \Saklient\Cloud\Errors\MissingIsoImageException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/MissingParamException.php";
use \Saklient\Cloud\Errors\MissingParamException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/MustBeOfSameZoneException.php";
use \Saklient\Cloud\Errors\MustBeOfSameZoneException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/NoDisplayResponseException.php";
use \Saklient\Cloud\Errors\NoDisplayResponseException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/NotForRouterException.php";
use \Saklient\Cloud\Errors\NotForRouterException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/NotReplicatingException.php";
use \Saklient\Cloud\Errors\NotReplicatingException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/NotWithHybridconnException.php";
use \Saklient\Cloud\Errors\NotWithHybridconnException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/OldStoragePlanException.php";
use \Saklient\Cloud\Errors\OldStoragePlanException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/OperationFailureException.php";
use \Saklient\Cloud\Errors\OperationFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/OperationTimeoutException.php";
use \Saklient\Cloud\Errors\OperationTimeoutException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/OriginalHashMismatchException.php";
use \Saklient\Cloud\Errors\OriginalHashMismatchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PacketFilterApplyingException.php";
use \Saklient\Cloud\Errors\PacketFilterApplyingException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PacketFilterVersionMismatchException.php";
use \Saklient\Cloud\Errors\PacketFilterVersionMismatchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ParamIpNotFoundException.php";
use \Saklient\Cloud\Errors\ParamIpNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ParamResNotFoundException.php";
use \Saklient\Cloud\Errors\ParamResNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PaymentCreditCardException.php";
use \Saklient\Cloud\Errors\PaymentCreditCardException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PaymentPaymentException.php";
use \Saklient\Cloud\Errors\PaymentPaymentException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PaymentRegistrationException.php";
use \Saklient\Cloud\Errors\PaymentRegistrationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PaymentTelCertificationException.php";
use \Saklient\Cloud\Errors\PaymentTelCertificationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PaymentUnpayableException.php";
use \Saklient\Cloud\Errors\PaymentUnpayableException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/PenaltyOperationException.php";
use \Saklient\Cloud\Errors\PenaltyOperationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ReplicaAlreadyExistsException.php";
use \Saklient\Cloud\Errors\ReplicaAlreadyExistsException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ReplicaNotFoundException.php";
use \Saklient\Cloud\Errors\ReplicaNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ResAlreadyConnectedException.php";
use \Saklient\Cloud\Errors\ResAlreadyConnectedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ResAlreadyDisconnectedException.php";
use \Saklient\Cloud\Errors\ResAlreadyDisconnectedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ResAlreadyExistsException.php";
use \Saklient\Cloud\Errors\ResAlreadyExistsException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ResUsedInZoneException.php";
use \Saklient\Cloud\Errors\ResUsedInZoneException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ResourcePathNotFoundException.php";
use \Saklient\Cloud\Errors\ResourcePathNotFoundException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/RunOutOfIpAddressException.php";
use \Saklient\Cloud\Errors\RunOutOfIpAddressException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/SameLicenseRequiredException.php";
use \Saklient\Cloud\Errors\SameLicenseRequiredException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServerCouldNotStopException.php";
use \Saklient\Cloud\Errors\ServerCouldNotStopException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServerIsCleaningException.php";
use \Saklient\Cloud\Errors\ServerIsCleaningException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServerOperationFailureException.php";
use \Saklient\Cloud\Errors\ServerOperationFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServerPowerMustBeDownException.php";
use \Saklient\Cloud\Errors\ServerPowerMustBeDownException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServerPowerMustBeUpException.php";
use \Saklient\Cloud\Errors\ServerPowerMustBeUpException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/ServiceTemporarilyUnavailableException.php";
use \Saklient\Cloud\Errors\ServiceTemporarilyUnavailableException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/SizeMismatchException.php";
use \Saklient\Cloud\Errors\SizeMismatchException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/SnapshotInMigrationException.php";
use \Saklient\Cloud\Errors\SnapshotInMigrationException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/StillCreatingException.php";
use \Saklient\Cloud\Errors\StillCreatingException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/StorageAbnormalException.php";
use \Saklient\Cloud\Errors\StorageAbnormalException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/StorageOperationFailureException.php";
use \Saklient\Cloud\Errors\StorageOperationFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/SwitchHybridConnectedException.php";
use \Saklient\Cloud\Errors\SwitchHybridConnectedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/TemplateFtpIsOpenException.php";
use \Saklient\Cloud\Errors\TemplateFtpIsOpenException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/TemplateIsIncompleteException.php";
use \Saklient\Cloud\Errors\TemplateIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/TooManyRequestException.php";
use \Saklient\Cloud\Errors\TooManyRequestException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/UnknownException.php";
use \Saklient\Cloud\Errors\UnknownException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/UnknownOsTypeException.php";
use \Saklient\Cloud\Errors\UnknownOsTypeException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/UnsupportedResClassException.php";
use \Saklient\Cloud\Errors\UnsupportedResClassException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/UserNotSpecifiedException.php";
use \Saklient\Cloud\Errors\UserNotSpecifiedException;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Errors/VncProxyRequestFailureException.php";
use \Saklient\Cloud\Errors\VncProxyRequestFailureException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;
require_once dirname(__FILE__) . "/../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

class ExceptionFactory {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 * @return \Saklient\Errors\HttpException
	 */
	static public function create($status, $code=null, $message="")
	{
		switch ($code) {
			case "access_apikey_disabled": {
				return new AccessApiKeyDisabledException($status, $code, $message);
			}
			case "access_sakura": {
				return new AccessSakuraException($status, $code, $message);
			}
			case "access_staff": {
				return new AccessStaffException($status, $code, $message);
			}
			case "access_token": {
				return new AccessTokenException($status, $code, $message);
			}
			case "access_xhr_or_apikey": {
				return new AccessXhrOrApiKeyException($status, $code, $message);
			}
			case "account_not_found": {
				return new AccountNotFoundException($status, $code, $message);
			}
			case "account_not_specified": {
				return new AccountNotSpecifiedException($status, $code, $message);
			}
			case "ambiguous_identifier": {
				return new AmbiguousIdentifierException($status, $code, $message);
			}
			case "ambiguous_zone": {
				return new AmbiguousZoneException($status, $code, $message);
			}
			case "apiproxy_timeout": {
				return new ApiProxyTimeoutException($status, $code, $message);
			}
			case "apiproxy_timeout_non_get": {
				return new ApiProxyTimeoutNonGetException($status, $code, $message);
			}
			case "archive_is_incomplete": {
				return new ArchiveIsIncompleteException($status, $code, $message);
			}
			case "bad_gateway": {
				return new HttpBadGatewayException($status, $code, $message);
			}
			case "bad_request": {
				return new HttpBadRequestException($status, $code, $message);
			}
			case "boot_failure_by_lock": {
				return new BootFailureByLockException($status, $code, $message);
			}
			case "boot_failure_in_group": {
				return new BootFailureInGroupException($status, $code, $message);
			}
			case "busy": {
				return new BusyException($status, $code, $message);
			}
			case "cant_resize_smaller": {
				return new CantResizeSmallerException($status, $code, $message);
			}
			case "cdrom_device_locked": {
				return new CdromDeviceLockedException($status, $code, $message);
			}
			case "cdrom_disabled": {
				return new CdromDisabledException($status, $code, $message);
			}
			case "cdrom_in_use": {
				return new CdromInUseException($status, $code, $message);
			}
			case "cdrom_is_incomplete": {
				return new CdromIsIncompleteException($status, $code, $message);
			}
			case "conflict": {
				return new HttpConflictException($status, $code, $message);
			}
			case "connect_to_same_switch": {
				return new ConnectToSameSwitchException($status, $code, $message);
			}
			case "contract_creation": {
				return new ContractCreationException($status, $code, $message);
			}
			case "copy_to_itself": {
				return new CopyToItselfException($status, $code, $message);
			}
			case "delete_disk_b4_template": {
				return new DeleteDiskB4TemplateException($status, $code, $message);
			}
			case "delete_ipv6nets_first": {
				return new DeleteIpV6NetsFirstException($status, $code, $message);
			}
			case "delete_res_b4_account": {
				return new DeleteResB4AccountException($status, $code, $message);
			}
			case "delete_router_b4_switch": {
				return new DeleteRouterB4SwitchException($status, $code, $message);
			}
			case "delete_static_route_first": {
				return new DeleteStaticRouteFirstException($status, $code, $message);
			}
			case "disconnect_b4_delete": {
				return new DisconnectB4DeleteException($status, $code, $message);
			}
			case "disconnect_b4_update": {
				return new DisconnectB4UpdateException($status, $code, $message);
			}
			case "disk_connection_limit": {
				return new DiskConnectionLimitException($status, $code, $message);
			}
			case "disk_is_copying": {
				return new DiskIsCopyingException($status, $code, $message);
			}
			case "disk_is_not_available": {
				return new DiskIsNotAvailableException($status, $code, $message);
			}
			case "disk_license_mismatch": {
				return new DiskLicenseMismatchException($status, $code, $message);
			}
			case "disk_stock_run_out": {
				return new DiskStockRunOutException($status, $code, $message);
			}
			case "diskorss_in_migration": {
				return new DiskOrSsInMigrationException($status, $code, $message);
			}
			case "dns_a_record_not_found": {
				return new DnsARecordNotFoundException($status, $code, $message);
			}
			case "dns_aaaa_record_not_found": {
				return new DnsAaaaRecordNotFoundException($status, $code, $message);
			}
			case "dns_ptr_update_failure": {
				return new DnsPtrUpdateFailureException($status, $code, $message);
			}
			case "duplicate_account_code": {
				return new DuplicateAccountCodeException($status, $code, $message);
			}
			case "duplicate_entry": {
				return new DuplicateEntryException($status, $code, $message);
			}
			case "duplicate_user_code": {
				return new DuplicateUserCodeException($status, $code, $message);
			}
			case "expectation_failed": {
				return new HttpExpectationFailedException($status, $code, $message);
			}
			case "failed_dependency": {
				return new HttpFailedDependencyException($status, $code, $message);
			}
			case "file_not_uploaded": {
				return new FileNotUploadedException($status, $code, $message);
			}
			case "filter_array_comparison": {
				return new FilterArrayComparisonException($status, $code, $message);
			}
			case "filter_bad_operator": {
				return new FilterBadOperatorException($status, $code, $message);
			}
			case "filter_null_comparison": {
				return new FilterNullComparisonException($status, $code, $message);
			}
			case "filter_unknown_operator": {
				return new FilterUnknownOperatorException($status, $code, $message);
			}
			case "forbidden": {
				return new HttpForbiddenException($status, $code, $message);
			}
			case "ftp_cannot_close": {
				return new FtpCannotCloseException($status, $code, $message);
			}
			case "ftp_is_already_close": {
				return new FtpIsAlreadyCloseException($status, $code, $message);
			}
			case "ftp_is_already_open": {
				return new FtpIsAlreadyOpenException($status, $code, $message);
			}
			case "ftp_must_be_closed": {
				return new FtpMustBeClosedException($status, $code, $message);
			}
			case "gateway_timeout": {
				return new HttpGatewayTimeoutException($status, $code, $message);
			}
			case "gone": {
				return new HttpGoneException($status, $code, $message);
			}
			case "host_operation_failure": {
				return new HostOperationFailureException($status, $code, $message);
			}
			case "http_version_not_supported": {
				return new HttpHttpVersionNotSupportedException($status, $code, $message);
			}
			case "illegal_das_usage": {
				return new IllegalDasUsageException($status, $code, $message);
			}
			case "in_migration": {
				return new InMigrationException($status, $code, $message);
			}
			case "insufficient_storage": {
				return new HttpInsufficientStorageException($status, $code, $message);
			}
			case "internal_server_error": {
				return new HttpInternalServerErrorException($status, $code, $message);
			}
			case "invalid_format": {
				return new InvalidFormatException($status, $code, $message);
			}
			case "invalid_param_comb": {
				return new InvalidParamCombException($status, $code, $message);
			}
			case "invalid_range": {
				return new InvalidRangeException($status, $code, $message);
			}
			case "invalid_uri_argument": {
				return new InvalidUriArgumentException($status, $code, $message);
			}
			case "ipv6net_already_attached": {
				return new IpV6NetAlreadyAttachedException($status, $code, $message);
			}
			case "length_required": {
				return new HttpLengthRequiredException($status, $code, $message);
			}
			case "limit_count_in_account": {
				return new LimitCountInAccountException($status, $code, $message);
			}
			case "limit_count_in_member": {
				return new LimitCountInMemberException($status, $code, $message);
			}
			case "limit_count_in_network": {
				return new LimitCountInNetworkException($status, $code, $message);
			}
			case "limit_count_in_router": {
				return new LimitCountInRouterException($status, $code, $message);
			}
			case "limit_count_in_zone": {
				return new LimitCountInZoneException($status, $code, $message);
			}
			case "limit_memory_in_account": {
				return new LimitMemoryInAccountException($status, $code, $message);
			}
			case "limit_size_in_account": {
				return new LimitSizeInAccountException($status, $code, $message);
			}
			case "locked": {
				return new HttpLockedException($status, $code, $message);
			}
			case "method_not_allowed": {
				return new HttpMethodNotAllowedException($status, $code, $message);
			}
			case "missing_iso_image": {
				return new MissingIsoImageException($status, $code, $message);
			}
			case "missing_param": {
				return new MissingParamException($status, $code, $message);
			}
			case "must_be_of_same_zone": {
				return new MustBeOfSameZoneException($status, $code, $message);
			}
			case "no_display_response": {
				return new NoDisplayResponseException($status, $code, $message);
			}
			case "not_acceptable": {
				return new HttpNotAcceptableException($status, $code, $message);
			}
			case "not_extended": {
				return new HttpNotExtendedException($status, $code, $message);
			}
			case "not_for_router": {
				return new NotForRouterException($status, $code, $message);
			}
			case "not_found": {
				return new HttpNotFoundException($status, $code, $message);
			}
			case "not_implemented": {
				return new HttpNotImplementedException($status, $code, $message);
			}
			case "not_replicating": {
				return new NotReplicatingException($status, $code, $message);
			}
			case "not_with_hybridconn": {
				return new NotWithHybridconnException($status, $code, $message);
			}
			case "old_storage_plan": {
				return new OldStoragePlanException($status, $code, $message);
			}
			case "operation_failure": {
				return new OperationFailureException($status, $code, $message);
			}
			case "operation_timeout": {
				return new OperationTimeoutException($status, $code, $message);
			}
			case "original_hash_mismatch": {
				return new OriginalHashMismatchException($status, $code, $message);
			}
			case "packetfilter_applying": {
				return new PacketFilterApplyingException($status, $code, $message);
			}
			case "packetfilter_version_mismatch": {
				return new PacketFilterVersionMismatchException($status, $code, $message);
			}
			case "param_ip_not_found": {
				return new ParamIpNotFoundException($status, $code, $message);
			}
			case "param_res_not_found": {
				return new ParamResNotFoundException($status, $code, $message);
			}
			case "payment_creditcard": {
				return new PaymentCreditCardException($status, $code, $message);
			}
			case "payment_payment": {
				return new PaymentPaymentException($status, $code, $message);
			}
			case "payment_registration": {
				return new PaymentRegistrationException($status, $code, $message);
			}
			case "payment_required": {
				return new HttpPaymentRequiredException($status, $code, $message);
			}
			case "payment_telcertification": {
				return new PaymentTelCertificationException($status, $code, $message);
			}
			case "payment_unpayable": {
				return new PaymentUnpayableException($status, $code, $message);
			}
			case "penalty_operation": {
				return new PenaltyOperationException($status, $code, $message);
			}
			case "precondition_failed": {
				return new HttpPreconditionFailedException($status, $code, $message);
			}
			case "proxy_authentication_required": {
				return new HttpProxyAuthenticationRequiredException($status, $code, $message);
			}
			case "replica_already_exists": {
				return new ReplicaAlreadyExistsException($status, $code, $message);
			}
			case "replica_not_found": {
				return new ReplicaNotFoundException($status, $code, $message);
			}
			case "request_entity_too_large": {
				return new HttpRequestEntityTooLargeException($status, $code, $message);
			}
			case "request_timeout": {
				return new HttpRequestTimeoutException($status, $code, $message);
			}
			case "request_uri_too_long": {
				return new HttpRequestUriTooLongException($status, $code, $message);
			}
			case "requested_range_not_satisfiable": {
				return new HttpRequestedRangeNotSatisfiableException($status, $code, $message);
			}
			case "res_already_connected": {
				return new ResAlreadyConnectedException($status, $code, $message);
			}
			case "res_already_disconnected": {
				return new ResAlreadyDisconnectedException($status, $code, $message);
			}
			case "res_already_exists": {
				return new ResAlreadyExistsException($status, $code, $message);
			}
			case "res_used_in_zone": {
				return new ResUsedInZoneException($status, $code, $message);
			}
			case "resource_path_not_found": {
				return new ResourcePathNotFoundException($status, $code, $message);
			}
			case "run_out_of_ipaddress": {
				return new RunOutOfIpAddressException($status, $code, $message);
			}
			case "same_license_required": {
				return new SameLicenseRequiredException($status, $code, $message);
			}
			case "server_could_not_stop": {
				return new ServerCouldNotStopException($status, $code, $message);
			}
			case "server_is_cleaning": {
				return new ServerIsCleaningException($status, $code, $message);
			}
			case "server_operation_failure": {
				return new ServerOperationFailureException($status, $code, $message);
			}
			case "server_power_must_be_down": {
				return new ServerPowerMustBeDownException($status, $code, $message);
			}
			case "server_power_must_be_up": {
				return new ServerPowerMustBeUpException($status, $code, $message);
			}
			case "service_temporarily_unavailable": {
				return new ServiceTemporarilyUnavailableException($status, $code, $message);
			}
			case "service_unavailable": {
				return new HttpServiceUnavailableException($status, $code, $message);
			}
			case "size_mismatch": {
				return new SizeMismatchException($status, $code, $message);
			}
			case "snapshot_in_migration": {
				return new SnapshotInMigrationException($status, $code, $message);
			}
			case "still_creating": {
				return new StillCreatingException($status, $code, $message);
			}
			case "storage_abnormal": {
				return new StorageAbnormalException($status, $code, $message);
			}
			case "storage_operation_failure": {
				return new StorageOperationFailureException($status, $code, $message);
			}
			case "switch_hybrid_connected": {
				return new SwitchHybridConnectedException($status, $code, $message);
			}
			case "template_ftp_is_open": {
				return new TemplateFtpIsOpenException($status, $code, $message);
			}
			case "template_is_incomplete": {
				return new TemplateIsIncompleteException($status, $code, $message);
			}
			case "too_many_request": {
				return new TooManyRequestException($status, $code, $message);
			}
			case "unauthorized": {
				return new HttpUnauthorizedException($status, $code, $message);
			}
			case "unknown": {
				return new UnknownException($status, $code, $message);
			}
			case "unknown_os_type": {
				return new UnknownOsTypeException($status, $code, $message);
			}
			case "unprocessable_entity": {
				return new HttpUnprocessableEntityException($status, $code, $message);
			}
			case "unsupported_media_type": {
				return new HttpUnsupportedMediaTypeException($status, $code, $message);
			}
			case "unsupported_res_class": {
				return new UnsupportedResClassException($status, $code, $message);
			}
			case "upgrade_required": {
				return new HttpUpgradeRequiredException($status, $code, $message);
			}
			case "user_not_specified": {
				return new UserNotSpecifiedException($status, $code, $message);
			}
			case "variant_also_negotiates": {
				return new HttpVariantAlsoNegotiatesException($status, $code, $message);
			}
			case "vnc_proxy_request_failure": {
				return new VncProxyRequestFailureException($status, $code, $message);
			}
		}
		
		switch ($status) {
			case 400: {
				return new HttpBadRequestException($status, $code, $message);
			}
			case 401: {
				return new HttpUnauthorizedException($status, $code, $message);
			}
			case 402: {
				return new HttpPaymentRequiredException($status, $code, $message);
			}
			case 403: {
				return new HttpForbiddenException($status, $code, $message);
			}
			case 404: {
				return new HttpNotFoundException($status, $code, $message);
			}
			case 405: {
				return new HttpMethodNotAllowedException($status, $code, $message);
			}
			case 406: {
				return new HttpNotAcceptableException($status, $code, $message);
			}
			case 407: {
				return new HttpProxyAuthenticationRequiredException($status, $code, $message);
			}
			case 408: {
				return new HttpRequestTimeoutException($status, $code, $message);
			}
			case 409: {
				return new HttpConflictException($status, $code, $message);
			}
			case 410: {
				return new HttpGoneException($status, $code, $message);
			}
			case 411: {
				return new HttpLengthRequiredException($status, $code, $message);
			}
			case 412: {
				return new HttpPreconditionFailedException($status, $code, $message);
			}
			case 413: {
				return new HttpRequestEntityTooLargeException($status, $code, $message);
			}
			case 415: {
				return new HttpUnsupportedMediaTypeException($status, $code, $message);
			}
			case 416: {
				return new HttpRequestedRangeNotSatisfiableException($status, $code, $message);
			}
			case 417: {
				return new HttpExpectationFailedException($status, $code, $message);
			}
			case 422: {
				return new HttpUnprocessableEntityException($status, $code, $message);
			}
			case 423: {
				return new HttpLockedException($status, $code, $message);
			}
			case 424: {
				return new HttpFailedDependencyException($status, $code, $message);
			}
			case 426: {
				return new HttpUpgradeRequiredException($status, $code, $message);
			}
			case 500: {
				return new HttpRequestUriTooLongException($status, $code, $message);
			}
			case 501: {
				return new HttpNotImplementedException($status, $code, $message);
			}
			case 502: {
				return new HttpBadGatewayException($status, $code, $message);
			}
			case 503: {
				return new HttpServiceUnavailableException($status, $code, $message);
			}
			case 504: {
				return new HttpGatewayTimeoutException($status, $code, $message);
			}
			case 505: {
				return new HttpHttpVersionNotSupportedException($status, $code, $message);
			}
			case 506: {
				return new HttpVariantAlsoNegotiatesException($status, $code, $message);
			}
			case 507: {
				return new HttpInsufficientStorageException($status, $code, $message);
			}
			case 510: {
				return new HttpNotExtendedException($status, $code, $message);
			}
		}
		
		return new HttpException($status, $code, $message);
	}
	
	

}

