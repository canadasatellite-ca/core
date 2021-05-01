<?php
namespace CanadaSatellite\Core\Plugin\Magento\Catalog\Model;
use Magento\Catalog\Model\Product as Sb;
use Magento\Framework\DataObject as _DO;
# 2021-05-01 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
# «Illegal offset type in vendor/magento/module-bundle/Block/Catalog/Product/View/Type/Bundle.php on line 194»:
# https://github.com/canadasatellite-ca/site/issues/83
final class Product {
	/**
	 * 2021-05-01
	 * @see \Magento\Catalog\Model\Product::getPreconfiguredValues()
	 * @used-by \Magento\Bundle\Block\Catalog\Product\View\Type\Bundle::getJsonConfig()
	 * @param Sb $sb
	 * @param _DO $r
	 * @return _DO
	 */
	function afterGetPreconfiguredValues(Sb $sb, _DO $r) {
		$k = 'bundle_option';
		if ($oo = df_eta($r[$k])) { /** @var array(int => mixed)|null $oo */
			$r[$k] = df_map($oo, function($v) {return !is_array($v) ? $v : df_first($v);});
		}
		return $r;
	}
}