<?php
namespace CanadaSatellite\Core\Plugin\Cart2Quote\DeskEmail\Observer\Frontend;
use Cart2Quote\DeskEmail\Observer\Frontend\SaveMessageAfterObserver as Sb;
use Cart2Quote\Desk\Model\Data\Ticket as T;
use Magento\Contact\Model\ConfigInterface as C;
use Magento\Framework\Event\Observer as O;
# 2021-03-28 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
# "`Cart2Quote_DeskEmail`: «Argument 1 passed to Magento\Framework\Mail\AddressConverter::convertMany()
# must be of the type array, null given, called in vendor/magento/framework/Mail/Template/TransportBuilder.php on line 431»":
# https://github.com/canadasatellite-ca/site/issues/54
final class SaveMessageAfterObserver {
	/**
	 * 2021-03-28
	 * @see \Cart2Quote\DeskEmail\Observer\Frontend\SaveMessageAfterObserver::execute()
	 * @param Sb $sb
	 * @param O $o
	 */
	function beforeExecute(Sb $sb, O $o) {
		$t = $o['ticket']; /** @var T $t */
		if (!$t->getAssigneeEmail()) {
			$t->setAssigneeEmail(df_cfg(C::XML_PATH_EMAIL_RECIPIENT));
		}
	}
}