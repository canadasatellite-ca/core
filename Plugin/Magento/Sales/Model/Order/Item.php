<?php
namespace CanadaSatellite\Core\Plugin\Magento\Sales\Model\Order;
use Exception as E;
use Magento\Sales\Model\Order\Item as Sb;
# 2021-03-30
# "«Unable to unserialize value. Error: Syntax error» on `sales/order/history`»":
# https://github.com/canadasatellite-ca/site/issues/62
final class Item {
	/**
	 * 2021-03-30
	 * @see \Magento\Sales\Model\Order\Item::getProductOptions()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @return mixed[]
	 */
	function aroundGetProductOptions(Sb $sb, \Closure $f) {return df_try($f, function(E $e) use($sb) {return
		false === ($r = !is_string($o = $sb['product_options']) ? false : @unserialize($o)) ? df_error($e) : $r
	;});}
}