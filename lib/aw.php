<?php
/**
 * 2021-04-26 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
 * "`Aheadworks_AdvancedReviews`: reviews should be shown on the frontend regardless the store":
 * https://github.com/canadasatellite-ca/site/issues/81
 * @used-by \Aheadworks\AdvancedReviews\Block\Product\View\Review\Container::__construct()
 * @used-by \Aheadworks\AdvancedReviews\Model\Product\Layout\Processor\Review\ConfigDataProvider::getGeneralConfigData()
 * @used-by \CanadaSatellite\Theme\Model\Product\Layout\Processor\ReviewConfigDataProvider::getGeneralConfigData()
 * @param int|null $pid [optional]
 * @return int
 */
function cs_aw_reviews_count($pid = null) {return !$pid ? 0 : df_fetch_one_int(
	'aw_ar_statistics', 'SUM(reviews_count)', ['product_id' => $pid]
);}