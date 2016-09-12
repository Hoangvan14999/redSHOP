<?php
/**
 * @package     RedSHOP.Backend
 * @subpackage  Template
 *
 * @copyright   Copyright (C) 2008 - 2016 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

?>

<div class="col50">
	<fieldset class="adminform">
		<legend><?php
			echo JText::_('COM_REDSHOP_AVAILABLE_SEO_TAGS');
			?></legend>
		<?php
		echo JHtml::_('bootstrap.startTabSet', 'seo-pane', array('active' => 'tags'));
		echo JHtml::_('bootstrap.addTab', 'seo-pane', 'tags', JText::_('COM_REDSHOP_TITLE_AVAILABLE_SEO_TAGS', true));
		?>
		<table class="adminlist table table-striped">
			<tr>
				<td><?php
					echo '<span style="margin-left:10px;">{productname} -- ' . JText::_('COM_REDSHOP_PRODUCT_SEO_DESC') . '</span>
<span style="margin-left:10px;">{manufacturer} -- ' . JText::_('COM_REDSHOP_MANUFACTURER_SEO_DESC') . '</span>
<span style="margin-left:10px;">{parentcategoryloop} -- ' . JText::_('COM_REDSHOP_PARENT_CATEGORY_LOOP_SEO_DEC') . '</span>
<span style="margin-left:10px;">{categoryname} -- ' . JText::_('COM_REDSHOP_CATEGORY_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saleprice} -- ' . JText::_('COM_REDSHOP_SALEPRICE_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saving} -- ' . JText::_('COM_REDSHOP_SAVING_SEO_DESC') . '</span>
<span style="margin-left:10px;">{shopname} -- ' . JText::_('COM_REDSHOP_SHOPNAME_SEO_DESC') . '</span>
<span style="margin-left:10px;">{productsku} -- ' . JText::_('COM_REDSHOP_PRODUCTSKU_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryshortdesc} -- ' . JText::_('COM_REDSHOP_CATEGORY_SHORT_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{productshortdesc} -- ' . JText::_('COM_REDSHOP_PRODUCT_SHORT_DESCRIPTION') . '</span>';


					?></td>
			</tr>
		</table>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'seo-pane', 'headingtags', JText::_('COM_REDSHOP_HEADING_AVAILABLE_SEO_TAGS', true));?>
		<table class="adminlist table table-striped">
			<tr>
				<td><?php
					echo '<span style="margin-left:10px;">{productname} -- ' . JText::_('COM_REDSHOP_PRODUCT_SEO_DESC') . '</span>
<span style="margin-left:10px;">{manufacturer} -- ' . JText::_('COM_REDSHOP_MANUFACTURER_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryname} -- ' . JText::_('COM_REDSHOP_CATEGORY_SEO_DESC') . '</span>
<span style="margin-left:10px;">{productsku} -- ' . JText::_('COM_REDSHOP_PRODUCTSKU_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryshortdesc} -- ' . JText::_('COM_REDSHOP_CATEGORY_SHORT_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{productshortdesc} -- ' . JText::_('COM_REDSHOP_PRODUCT_SHORT_DESCRIPTION') . '</span>';
					?></td>
			</tr>
		</table>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'seo-pane', 'desctags', JText::_('COM_REDSHOP_DESC_AVAILABLE_SEO_TAGS', true));?>
		<table class="adminlist table table-striped">
			<tr>
				<td><?php
					echo '<span style="margin-left:10px;">{productname} -- ' . JText::_('COM_REDSHOP_PRODUCT_SEO_DESC') . '</span>
<span style="margin-left:10px;">{manufacturer} -- ' . JText::_('COM_REDSHOP_MANUFACTURER_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryname} -- ' . JText::_('COM_REDSHOP_CATEGORY_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saleprice} -- ' . JText::_('COM_REDSHOP_SALEPRICE_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saving} -- ' . JText::_('COM_REDSHOP_SAVING_SEO_DESC') . '</span>
<span style="margin-left:10px;">{shopname} -- ' . JText::_('COM_REDSHOP_SHOPNAME_SEO_DESC') . '</span>
<span style="margin-left:10px;">{productsku} -- ' . JText::_('COM_REDSHOP_PRODUCTSKU_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryshortdesc} -- ' . JText::_('COM_REDSHOP_CATEGORY_SHORT_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{productshortdesc} -- ' . JText::_('COM_REDSHOP_PRODUCT_SHORT_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{categorydesc} -- ' . JText::_('COM_REDSHOP_CATEGORY_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{productdesc} -- ' . JText::_('COM_REDSHOP_PRODUCT_DESCRIPTION') . '</span>';
					?></td>
			</tr>
		</table>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'seo-pane', 'keywordtags', JText::_('COM_REDSHOP_KEYWORD_AVAILABLE_SEO_TAGS', true));?>
		<table class="adminlist table table-striped">
			<tr>
				<td><?php
					echo '<span style="margin-left:10px;">{productname} -- ' . JText::_('COM_REDSHOP_PRODUCT_SEO_DESC') . '</span>
<span style="margin-left:10px;">{manufacturer} -- ' . JText::_('COM_REDSHOP_MANUFACTURER_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryname} -- ' . JText::_('COM_REDSHOP_CATEGORY_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saleprice} -- ' . JText::_('COM_REDSHOP_SALEPRICE_SEO_DESC') . '</span>
<span style="margin-left:10px;">{saving} -- ' . JText::_('COM_REDSHOP_SAVING_SEO_DESC') . '</span>
<span style="margin-left:10px;">{shopname} -- ' . JText::_('COM_REDSHOP_SHOPNAME_SEO_DESC') . '</span>
<span style="margin-left:10px;">{productsku} -- ' . JText::_('COM_REDSHOP_PRODUCTSKU_SEO_DESC') . '</span>
<span style="margin-left:10px;">{categoryshortdesc} -- ' . JText::_('COM_REDSHOP_CATEGORY_SHORT_DESCRIPTION') . '</span>
<span style="margin-left:10px;">{productshortdesc} -- ' . JText::_('COM_REDSHOP_PRODUCT_SHORT_DESCRIPTION') . '</span>';

					?></td>
			</tr>
		</table>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</fieldset>
</div>

<fieldset class="adminform">
	<div class="row">
		<div class="col-md-6 col-lg-3">
			<fieldset class="adminform">
				<?php echo $this->loadTemplate('seo_general');?>
			</fieldset>
		</div>
		<div class="col-md-6 col-lg-3">
			<fieldset class="adminform">
				<?php echo $this->loadTemplate('seo_category');?>
			</fieldset>
		</div>
		<div class="col-md-6 col-lg-3">
			<fieldset class="adminform">
				<?php echo $this->loadTemplate('seo_product');?>
			</fieldset>
		</div>

		<div class="col-md-6 col-lg-3">
			<fieldset class="adminform">
				<?php echo $this->loadTemplate('seo_manufacturer');?>
			</fieldset>
		</div>
	</div>
</fieldset>
