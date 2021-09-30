<?php
namespace CanadaSatellite\Core\Plugin\MageWorx\OrderEditor\Block\Adminhtml\Sales\Order\Edit;
use MageWorx\OrderEditor\Block\Adminhtml\Sales\Order\Edit\Wrapper as Sb;
# 2021-09-30
# "`MageWorx_OrderEditor` should not allow to edit already invoiced orders":
# https://github.com/canadasatellite-ca/site/issues/237
final class Wrapper {
	/**
	 * 2021-09-21
	 * @see \Magento\Framework\View\Element\Template::getTemplate()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @return string|null
	 */
	function aroundGetTemplate(Sb $sb, \Closure $f) {return df_order()->hasInvoices() ? null : $f();}
}