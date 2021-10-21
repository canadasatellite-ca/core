<?php
namespace CanadaSatellite\Core\Plugin\Magento\Sales\Model;
use Magento\Sales\Model\Order as Sb;
use Magento\Sales\Model\Order\Invoice as I;
# 2021-10-20
# 1) "All invoices between 2021-10-01 and 2021-10-09 do not have items":
# https://github.com/canadasatellite-ca/site/issues/256
# 2) "«Card CVD is invalid» on `/index.php/api/auctane?action=shipnotify`":
# https://github.com/canadasatellite-ca/bambora/issues/12
final class Order {
	/**
	 * 2021-10-20
	 * @see \Magento\Sales\Model\Order::canInvoice()
	 * @param Sb $sb
	 * @param bool $r
	 * @return bool
	 */
	function afterCanInvoice(Sb $sb, $r) {return $r && !dff_eq($sb->getGrandTotal(), array_sum(df_map(
		$sb->getInvoiceCollection(), function(I $i) {
			return I::STATE_PAID !== (int)$i->getState() ? 0 : $i->getGrandTotal();
		}
	)));}
}