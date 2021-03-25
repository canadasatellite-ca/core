<?php
namespace CanadaSatellite\Core\Plugin\Mageplaza\Blog\Helper;
use Mageplaza\Blog\Helper\Data as Sb;
# 2021-03-25
# "Disable RSS for `Mageplaza_Blog` if the `rss/config/active` option is disabled":
# https://github.com/canadasatellite-ca/site/issues/43
final class Data {
	/**
	 * 2021-03-25
	 * @see \Mageplaza\Blog\Helper\Data::getBlogUrl()
	 * @param Sb $sb
	 * @param string $r
	 * @return string
	 */
	function afterGetBlogUrl(Sb $sb, $r = null) {return !df_cfg('rss/config/active') && df_contains($r, 'rss') ? '' : $r;}
}