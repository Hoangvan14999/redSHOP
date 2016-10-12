<?php
/**
 * RedShops Library file.
 * Including this file into your application will make redSHOP available to use.
 *
 * @package    RedShopb.Library
 * @copyright  Copyright (C) 2012 - 2015 redCOMPONENT.com. All rights reserved.
 * @license    GNU General Public License version 2 or later, see LICENSE.
 */

defined('JPATH_PLATFORM') or die;

// Define redSHOP Library Folder Path
define('JPATH_REDSHOP_LIBRARY', __DIR__);

// Load library language
$lang = JFactory::getLanguage();
$lang->load('lib_redshop', JPATH_SITE);

// Load redSHOP factory file
JLoader::import('redshop.redshop');

// Register library prefix
JLoader::registerPrefix('Redshop', JPATH_REDSHOP_LIBRARY);

// Make available the redSHOP forms
JForm::addFormPath(JPATH_REDSHOP_LIBRARY . '/form/forms');

// Make available the redSHOP fields
JFormHelper::addFieldPath(JPATH_REDSHOP_LIBRARY . '/form/fields');

// Make available the redSHOP form rules
JFormHelper::addRulePath(JPATH_REDSHOP_LIBRARY . '/form/rules');

// Load helpers pathes in JLoader
JLoader::discover('', JPATH_SITE . '/components/com_redshop/helpers', false);
JLoader::discover('', JPATH_ADMINISTRATOR . '/components/com_redshop/helpers', false);
JLoader::discover('RedshopSite', JPATH_SITE . '/components/com_redshop/helpers', false);
JLoader::discover('RedshopAdmin', JPATH_ADMINISTRATOR . '/components/com_redshop/helpers', false);

// HTML helpers
JHtml::addIncludePath(JPATH_REDSHOP_LIBRARY . '/html');

// Include all tables
JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_redshop/tables');

// Setup dynamic variables like show price etc...
Redconfiguration::getInstance()->defineDynamicVars();

// Load backward compatible php defined config.
if (Redshop::getConfig()->get('BACKWARD_COMPATIBLE_PHP') == 1)
{
	$configs = Redshop::getConfig()->toArray();

	foreach ($configs as $key => $value)
	{
		if (!defined($key))
		{
			define($key, $value);
		}
	}
}
