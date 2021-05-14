<?php
use Magento\Catalog\Model\Product as P;
/**
 * 2021-05-14
 * @used-by app/design/frontend/MageSuper/magestylish/Cart2Quote_Quotation/templates/email/quote/items/quote/bundle.phtml (canadasatellite.ca, https://github.com/canadasatellite-ca/site/issues/63)
 * @used-by app/design/frontend/MageSuper/magestylish/Cart2Quote_Quotation/templates/email/quote/items/quote/default.phtml (canadasatellite.ca, https://github.com/canadasatellite-ca/site/issues/106)
 * @used-by app/design/frontend/MageSuper/magestylish/Cart2Quote_Quotation/templates/email/proposal/items/quote/default.phtml (canadasatellite.ca, https://github.com/canadasatellite-ca/site/issues/107)
 * @param P $p
 * @return string
 */
function cs_quote_description(P $p) {return
	!($v = $p->getResource()->getAttributeRawValue($p->getEntityId(), 'quote_description', 0))
		? '' : df_tag('p', 'product-description', df_e($v))
;}