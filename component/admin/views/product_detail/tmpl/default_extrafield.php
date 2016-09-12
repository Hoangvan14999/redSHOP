<?php
/**
 * @package     RedSHOP.Backend
 * @subpackage  Template
 *
 * @copyright   Copyright (C) 2008 - 2016 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

$db            = JFactory::getDBO();
$template_id   = $this->detail->product_template;
$product_id    = $this->detail->product_id;
$redTemplate   = Redtemplate::getInstance();
$field         = extra_field::getInstance();
$template_desc = $redTemplate->getTemplate("product", $template_id);

if (count($template_desc) == 0)
{
	return;
}

$template   = $template_desc[0]->template_desc;

$fieldModel = RedshopModel::getInstance('fields', 'RedshopModel');

$section = explode(',', '1,12,17');
$fields  = $fieldModel->getFieldInfoBySection($section);

$html = '';

for ($i = 0, $nf = count($fields); $i < $nf; $i++)
{
	if (strstr($template, "{" . $fields[$i]->field_name . "}"))
	{
		$sectionId = 0;
		$fieldName = '';

		if (12 != $fields[$i]->field_section
			|| (12 == $fields[$i]->field_section && 15 == $fields[$i]->field_type))
		{
			$sectionId = $fields[$i]->field_section;
			$fieldName = $fields[$i]->field_name;
		}

		$html .= $field->list_all_field($sectionId, $product_id, $fieldName);
	}
}

if (empty($html))
{
	echo RedshopLayoutHelper::render(
			'system.message',
			array(
				'msgList' => array(
								'info' => array(JText::_('COM_REDSHOP_PRODUCT_NO_EXTRA_FIELD_HINT'))
							),
				'showHeading' => false,
				'allowClose' => false
			)
		);
}

?>

<div class="row">
	<div class="col-sm-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo JText::_('COM_REDSHOP_FIELDS'); ?></h3>
			</div>
			<div class="box-body">
				<?php echo $html; ?>
			</div>
		</div>
	</div>
</div>
