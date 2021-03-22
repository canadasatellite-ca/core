<?php
namespace CanadaSatellite\Core\Plugin\Magento\Sales\Api\Data;
use Magento\Sales\Api\Data\OrderInterface as Sb;
use Magento\Sales\Api\Data\OrderPaymentInterface as IP;
use Magento\Sales\Model\Order\Payment as P;
# 2021-03-22
# "«Call to a member function getAdditionalInformation() on null in vendor/magento/module-sales/Model/OrderRepository.php:183»":
# https://github.com/canadasatellite-ca/site/issues/29
final class OrderInterface {
	/**
	 * 2021-03-22
	 * @see \Magento\Sales\Api\Data\OrderInterface::getPayment()
	 * @see \Magento\Sales\Model\Order::getPayment()
	 * @param Sb $sb
	 * @param IP|P|null $r [optional]
	 * @return IP
	 */
	function afterGetPayment(Sb $sb, IP $r = null) {
    	# 2021-03-22 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
		# It seems that the website was incorrectly migrated to Magento 2 from another shopping cart,
		# and order with ID < 32655 does not have associated records in the sales_order_payment table:
		# https://github.com/canadasatellite-ca/site/issues/29#issuecomment-803590042
		if (!$r && ($id = $sb->getEntityId()) && 32655 > $id) {
			$r = df_new_omd(P::class, ['method' => 'checkmo']);
			$r->setOrder($sb);
		}
		return $r;
	}
}