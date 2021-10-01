<?php
namespace CanadaSatellite\Core\Observer\Sales\Order\Invoice\Item\Collection;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order\Invoice\Item as I;
use Magento\Sales\Model\ResourceModel\Order\Invoice\Item\Collection as C;
# 2021-10-01
# 1) "`MageWorx_OrderEditor`: «Call to a member function getParentItem() on null
# in vendor\magento\module-sales\view\adminhtml\templates\order\invoice\view\items.phtml:24»":
# https://github.com/canadasatellite-ca/site/issues/238
# 2) "`MageWorx_OrderEditor`: «Call to a member function getId() on null in vendor\magento\module-tax\Helper\Data.php:733»":
# https://github.com/canadasatellite-ca/site/issues/239
# 3) "`MageWorx_OrderEditor`: «Call to a member function getParentItem() on null
# in vendor/magento/module-bundle/Block/Adminhtml/Sales/Order/Items/Renderer.php:87»":
# https://github.com/canadasatellite-ca/site/issues/236
# 4) "`MageWorx_OrderEditor`: «Argument 1 passed to Magento\Sales\Model\Order\Invoice\Item::setOrderItem()
# must be an instance of Magento\Sales\Model\Order\Item, null given,
# called in vendor/magento/module-sales/Model/ResourceModel/Order/Invoice/Relation.php on line 54»":
# https://github.com/canadasatellite-ca/site/issues/235
final class LoadAfter implements ObserverInterface {
	/**
	 * 2021-10-01
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @see \Magento\Sales\Model\ResourceModel\Order\Invoice\Item\Collection
	 * @see \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection::_afterLoad():
	 *		$this->_eventManager->dispatch($this->_eventPrefix . '_load_after', [$this->_eventObject => $this]);
	 * @param O $o
	 */
	function execute(O $o) {
		/** 2021-10-01 @see \Magento\Sales\Model\ResourceModel\Order\Invoice\Item\Collection::$_eventObject */
		$c = $o['order_invoice_item_collection']; /** @var C $c */
		$ii = array_filter($c->getItems(), function(I $i) {return $i->getOrderItem();}); /** @var I[] $ii */
		$c->removeAllItems()->setItems($ii);
	}
}