<?php
namespace CanadaSatellite\Core\Plugin\Magento\Customer\Api;
use Magento\Customer\Api\AccountManagementInterface as Sb;
# 2021-09-21
# "Temporary ban IP addresses of guest payers with `<…>@example.com` email addresses":
# https://github.com/canadasatellite-ca/core/issues/1
final class AccountManagementInterface {
	/**
	 * 2021-09-21
	 * @see \Magento\Customer\Api\AccountManagementInterface::isEmailAvailable()
	 * @see \Magento\Customer\Model\AccountManagement::isEmailAvailable()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param string $email
	 * @param int|null $websiteId [optional]
	 * @return bool
	 */
	function aroundIsEmailAvailable(Sb $sb, \Closure $f, $email, $websiteId = null) {return
		df_ends_with($email, '@example.com') ? df_ban() && false : $f($email, $websiteId)
	;}
}
