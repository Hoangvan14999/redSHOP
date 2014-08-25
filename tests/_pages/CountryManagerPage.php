<?php
/**
 * @package     RedShop
 * @subpackage  Page Class
 * @copyright   Copyright (C) 2012 - 2014 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Class CountryManagerPage
 *
 * @link   http://codeception.com/docs/07-AdvancedUsage#PageObjects
 *
 * @since  1.4
 */
class CountryManagerPage
{
	public static $URL = '/administrator/index.php?option=com_redshop&view=country';

	public static $countryName = "#country_name";

	public static $countryTwoCode = "#country_2_code";

	public static $countryThreeCode = "#country_3_code";

	public static $country = "#country_jtext";

	public static $countryCheck = '#cb0';

	public static $countryTitle = "//h2[contains(text(),'Country Management')]";

	public static $countrySuccessMessage = "//li[contains(text(),'Country detail saved')]";

	public static $countryResultRow = "//form[@id='adminForm']/table/tbody/tr[1]";

	public static $countryDeleteSuccessMessage = "//li[contains(text(),'Country detail deleted successfully')]";
}
