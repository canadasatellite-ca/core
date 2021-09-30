<?php
namespace CanadaSatellite\Core\Plugin\Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Invoice as Sb;
use Magento\Sales\Model\Order\Invoice\Item as I;
# 2021-10-01
# "`MageWorx_OrderEditor`: «Call to a member function getParentItem() on null
# in vendor\magento\module-sales\view\adminhtml\templates\order\invoice\view\items.phtml:24»":
# https://github.com/canadasatellite-ca/site/issues/238
final class Invoice {
	/**
	 * 2021-10-01
	 * @see \Magento\Sales\Model\Order\Invoice::getAllItems()
	 * @param Sb $sb
	 * @param I[] $r
	 * @return I[]
	 */
	function afterGetAllItems(Sb $sb, array $r) {return array_filter($r, function(I $i) {return $i->getOrderItem();});}
}