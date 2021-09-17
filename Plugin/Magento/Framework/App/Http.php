<?php
namespace CanadaSatellite\Core\Plugin\Magento\Framework\App;
use Magento\Framework\App\Http as Sb;
use Magento\Framework\App\ResponseInterface as IResponse;
# 2021-04-18 "Ban malicious bots": https://github.com/canadasatellite-ca/site/issues/72
final class Http {
	/**
	 * 2021-04-19
	 * @param Sb $sb
	 * @param \Closure $f
	 * @return IResponse
	 */
	function aroundLaunch(Sb $sb, \Closure $f) {return
		!df_referer()
		&& df_request_o()->isPost()
		&& 3 === count($a = df_request())
		&& !array_diff(array_keys($a), ['form_key', 'product', 'uenc'])
		? df_ban() : $f()
	;}
}