<?php

namespace SakuraInternet\Saclient\Errors;

require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpException.php";
use \SakuraInternet\Saclient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpBadGatewayException.php";
use \SakuraInternet\Saclient\Errors\HttpBadGatewayException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpBadRequestException.php";
use \SakuraInternet\Saclient\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpExpectationFailedException.php";
use \SakuraInternet\Saclient\Errors\HttpExpectationFailedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpFailedDependencyException.php";
use \SakuraInternet\Saclient\Errors\HttpFailedDependencyException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saclient\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpGatewayTimeoutException.php";
use \SakuraInternet\Saclient\Errors\HttpGatewayTimeoutException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpGoneException.php";
use \SakuraInternet\Saclient\Errors\HttpGoneException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpHttpVersionNotSupportedException.php";
use \SakuraInternet\Saclient\Errors\HttpHttpVersionNotSupportedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpInsufficientStorageException.php";
use \SakuraInternet\Saclient\Errors\HttpInsufficientStorageException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpInternalServerErrorException.php";
use \SakuraInternet\Saclient\Errors\HttpInternalServerErrorException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpLengthRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpLengthRequiredException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpLockedException.php";
use \SakuraInternet\Saclient\Errors\HttpLockedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpMethodNotAllowedException.php";
use \SakuraInternet\Saclient\Errors\HttpMethodNotAllowedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpNotAcceptableException.php";
use \SakuraInternet\Saclient\Errors\HttpNotAcceptableException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpNotExtendedException.php";
use \SakuraInternet\Saclient\Errors\HttpNotExtendedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpNotFoundException.php";
use \SakuraInternet\Saclient\Errors\HttpNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpNotImplementedException.php";
use \SakuraInternet\Saclient\Errors\HttpNotImplementedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpPreconditionFailedException.php";
use \SakuraInternet\Saclient\Errors\HttpPreconditionFailedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpProxyAuthenticationRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpProxyAuthenticationRequiredException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpRequestEntityTooLargeException.php";
use \SakuraInternet\Saclient\Errors\HttpRequestEntityTooLargeException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpRequestTimeoutException.php";
use \SakuraInternet\Saclient\Errors\HttpRequestTimeoutException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpRequestUriTooLongException.php";
use \SakuraInternet\Saclient\Errors\HttpRequestUriTooLongException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpRequestedRangeNotSatisfiableException.php";
use \SakuraInternet\Saclient\Errors\HttpRequestedRangeNotSatisfiableException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpUnauthorizedException.php";
use \SakuraInternet\Saclient\Errors\HttpUnauthorizedException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpUnprocessableEntityException.php";
use \SakuraInternet\Saclient\Errors\HttpUnprocessableEntityException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpUnsupportedMediaTypeException.php";
use \SakuraInternet\Saclient\Errors\HttpUnsupportedMediaTypeException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpUpgradeRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpUpgradeRequiredException;
require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpVariantAlsoNegotiatesException.php";
use \SakuraInternet\Saclient\Errors\HttpVariantAlsoNegotiatesException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccessApiKeyDisabledException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccessApiKeyDisabledException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccessSakuraException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccessSakuraException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccessStaffException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccessStaffException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccessTokenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccessTokenException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccessXhrOrApiKeyException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccessXhrOrApiKeyException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccountNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccountNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AccountNotSpecifiedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AccountNotSpecifiedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AmbiguousIdentifierException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AmbiguousIdentifierException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/AmbiguousZoneException.php";
use \SakuraInternet\Saclient\Cloud\Errors\AmbiguousZoneException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ApiProxyTimeoutException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ApiProxyTimeoutException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ApiProxyTimeoutNonGetException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ApiProxyTimeoutNonGetException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ArchiveIsIncompleteException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ArchiveIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/BootFailureByLockException.php";
use \SakuraInternet\Saclient\Cloud\Errors\BootFailureByLockException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/BootFailureInGroupException.php";
use \SakuraInternet\Saclient\Cloud\Errors\BootFailureInGroupException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/BusyException.php";
use \SakuraInternet\Saclient\Cloud\Errors\BusyException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CantResizeSmallerException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CantResizeSmallerException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CdromDeviceLockedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CdromDeviceLockedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CdromDisabledException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CdromDisabledException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CdromInUseException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CdromInUseException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CdromIsIncompleteException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CdromIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ConnectToSameSwitchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ConnectToSameSwitchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ContractCreationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ContractCreationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/CopyToItselfException.php";
use \SakuraInternet\Saclient\Cloud\Errors\CopyToItselfException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DeleteDiskB4TemplateException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DeleteDiskB4TemplateException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DeleteIpV6NetsFirstException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DeleteIpV6NetsFirstException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DeleteResB4AccountException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DeleteResB4AccountException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DeleteRouterB4SwitchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DeleteRouterB4SwitchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DeleteStaticRouteFirstException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DeleteStaticRouteFirstException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DisconnectB4DeleteException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DisconnectB4DeleteException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DisconnectB4UpdateException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DisconnectB4UpdateException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskConnectionLimitException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskConnectionLimitException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskIsCopyingException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskIsCopyingException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskIsNotAvailableException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskIsNotAvailableException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskLicenseMismatchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskLicenseMismatchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskOrSsInMigrationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskOrSsInMigrationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DiskStockRunOutException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DiskStockRunOutException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DnsARecordNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DnsARecordNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DnsAaaaRecordNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DnsAaaaRecordNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DnsPtrUpdateFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DnsPtrUpdateFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DuplicateAccountCodeException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DuplicateAccountCodeException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DuplicateEntryException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DuplicateEntryException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/DuplicateUserCodeException.php";
use \SakuraInternet\Saclient\Cloud\Errors\DuplicateUserCodeException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FileNotUploadedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FileNotUploadedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FilterArrayComparisonException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FilterArrayComparisonException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FilterBadOperatorException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FilterBadOperatorException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FilterNullComparisonException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FilterNullComparisonException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FilterUnknownOperatorException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FilterUnknownOperatorException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FtpCannotCloseException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FtpCannotCloseException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FtpIsAlreadyCloseException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FtpIsAlreadyCloseException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FtpIsAlreadyOpenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FtpIsAlreadyOpenException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/FtpMustBeClosedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\FtpMustBeClosedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/HostOperationFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HostOperationFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/IllegalDasUsageException.php";
use \SakuraInternet\Saclient\Cloud\Errors\IllegalDasUsageException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/InMigrationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\InMigrationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/InvalidFormatException.php";
use \SakuraInternet\Saclient\Cloud\Errors\InvalidFormatException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/InvalidParamCombException.php";
use \SakuraInternet\Saclient\Cloud\Errors\InvalidParamCombException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/InvalidRangeException.php";
use \SakuraInternet\Saclient\Cloud\Errors\InvalidRangeException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/InvalidUriArgumentException.php";
use \SakuraInternet\Saclient\Cloud\Errors\InvalidUriArgumentException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/IpV6NetAlreadyAttachedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\IpV6NetAlreadyAttachedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitCountInAccountException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitCountInAccountException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitCountInMemberException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitCountInMemberException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitCountInNetworkException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitCountInNetworkException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitCountInRouterException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitCountInRouterException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitCountInZoneException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitCountInZoneException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitMemoryInAccountException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitMemoryInAccountException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/LimitSizeInAccountException.php";
use \SakuraInternet\Saclient\Cloud\Errors\LimitSizeInAccountException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/MissingIsoImageException.php";
use \SakuraInternet\Saclient\Cloud\Errors\MissingIsoImageException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/MissingParamException.php";
use \SakuraInternet\Saclient\Cloud\Errors\MissingParamException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/MustBeOfSameZoneException.php";
use \SakuraInternet\Saclient\Cloud\Errors\MustBeOfSameZoneException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/NoDisplayResponseException.php";
use \SakuraInternet\Saclient\Cloud\Errors\NoDisplayResponseException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/NotForRouterException.php";
use \SakuraInternet\Saclient\Cloud\Errors\NotForRouterException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/NotReplicatingException.php";
use \SakuraInternet\Saclient\Cloud\Errors\NotReplicatingException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/NotWithHybridconnException.php";
use \SakuraInternet\Saclient\Cloud\Errors\NotWithHybridconnException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/OldStoragePlanException.php";
use \SakuraInternet\Saclient\Cloud\Errors\OldStoragePlanException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/OperationFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\OperationFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/OperationTimeoutException.php";
use \SakuraInternet\Saclient\Cloud\Errors\OperationTimeoutException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/OriginalHashMismatchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\OriginalHashMismatchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PacketFilterApplyingException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PacketFilterApplyingException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PacketFilterVersionMismatchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PacketFilterVersionMismatchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ParamIpNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ParamIpNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ParamResNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ParamResNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PaymentCreditCardException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PaymentCreditCardException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PaymentPaymentException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PaymentPaymentException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PaymentRegistrationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PaymentRegistrationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PaymentTelCertificationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PaymentTelCertificationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PaymentUnpayableException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PaymentUnpayableException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/PenaltyOperationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\PenaltyOperationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ReplicaAlreadyExistsException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ReplicaAlreadyExistsException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ReplicaNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ReplicaNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ResAlreadyConnectedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ResAlreadyConnectedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ResAlreadyDisconnectedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ResAlreadyDisconnectedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ResAlreadyExistsException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ResAlreadyExistsException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ResUsedInZoneException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ResUsedInZoneException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ResourcePathNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ResourcePathNotFoundException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/RunOutOfIpAddressException.php";
use \SakuraInternet\Saclient\Cloud\Errors\RunOutOfIpAddressException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/SameLicenseRequiredException.php";
use \SakuraInternet\Saclient\Cloud\Errors\SameLicenseRequiredException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServerCouldNotStopException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServerCouldNotStopException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServerIsCleaningException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServerIsCleaningException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServerOperationFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServerOperationFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServerPowerMustBeDownException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServerPowerMustBeDownException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServerPowerMustBeUpException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServerPowerMustBeUpException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/ServiceTemporarilyUnavailableException.php";
use \SakuraInternet\Saclient\Cloud\Errors\ServiceTemporarilyUnavailableException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/SizeMismatchException.php";
use \SakuraInternet\Saclient\Cloud\Errors\SizeMismatchException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/SnapshotInMigrationException.php";
use \SakuraInternet\Saclient\Cloud\Errors\SnapshotInMigrationException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/StillCreatingException.php";
use \SakuraInternet\Saclient\Cloud\Errors\StillCreatingException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/StorageAbnormalException.php";
use \SakuraInternet\Saclient\Cloud\Errors\StorageAbnormalException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/StorageOperationFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\StorageOperationFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/SwitchHybridConnectedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\SwitchHybridConnectedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/TemplateFtpIsOpenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\TemplateFtpIsOpenException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/TemplateIsIncompleteException.php";
use \SakuraInternet\Saclient\Cloud\Errors\TemplateIsIncompleteException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/TooManyRequestException.php";
use \SakuraInternet\Saclient\Cloud\Errors\TooManyRequestException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/UnknownException.php";
use \SakuraInternet\Saclient\Cloud\Errors\UnknownException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/UnknownOsTypeException.php";
use \SakuraInternet\Saclient\Cloud\Errors\UnknownOsTypeException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/UnsupportedResClassException.php";
use \SakuraInternet\Saclient\Cloud\Errors\UnsupportedResClassException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/UserNotSpecifiedException.php";
use \SakuraInternet\Saclient\Cloud\Errors\UserNotSpecifiedException;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Errors/VncProxyRequestFailureException.php";
use \SakuraInternet\Saclient\Cloud\Errors\VncProxyRequestFailureException;
require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

class ExceptionFactory {
	
	/**
	 * @access public
	 * @param string $message = ""
	 * @param int $status
	 * @param string $code = null
	 * @return \SakuraInternet\Saclient\Errors\HttpException
	 */
	static public function create($status, $code=null, $message="")
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($status, "int");
		Util::validateType($code, "string");
		Util::validateType($message, "string");
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

