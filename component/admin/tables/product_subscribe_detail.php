<?php
/**
 * @package     RedSHOP.Backend
 * @subpackage  Table
 *
 * @copyright   Copyright (C) 2005 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class Tableproduct_subscribe_detail extends JTable
{
	var $product_subscribe_id = 0;
	var $order_id = 0;
	var $order_item_id = 0;
	var $product_id = 0;
	var $subscription_id = 0;
	var $user_id = 0;
	var $start_date = 0;
	var $end_date = 0;

	function Tableproduct_subscribe_detail(& $db)
	{
		$this->_table_prefix = '#__redshop_';

		parent::__construct($this->_table_prefix . 'product_subscribe_detail', 'product_subscribe_id', $db);
	}

	function bind($array, $ignore = '')
	{
		if (key_exists('params', $array) && is_array($array['params']))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}

		return parent::bind($array, $ignore);
	}

}
