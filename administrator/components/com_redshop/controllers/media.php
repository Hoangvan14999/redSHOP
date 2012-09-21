<?php
/**
 * @copyright  Copyright (C) 2010-2012 redCOMPONENT.com. All rights reserved.
 * @license    GNU/GPL, see license.txt or http://www.gnu.org/copyleft/gpl.html
 *
 * Developed by email@recomponent.com - redCOMPONENT.com
 *
 * redSHOP can be downloaded from www.redcomponent.com
 * redSHOP is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * You should have received a copy of the GNU General Public License
 * along with redSHOP; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class mediaController extends JController
{
	function cancel()
	{
		$this->setRedirect( 'index.php' );
	}

	function saveAdditionalFiles()
	{
		$post = JRequest::get('POST');
		$file = JRequest::getVar('downloadfile', 'array' , 'files', 'array');
		$totalFile = count($file['name']);
		$model = $this->getModel();
//		if file selected from download folder...
		$product_download_root = PRODUCT_DOWNLOAD_ROOT;
		if (substr(PRODUCT_DOWNLOAD_ROOT,-1) != DS)
			$product_download_root = PRODUCT_DOWNLOAD_ROOT.DS;

		if($post['hdn_download_file'] != "")
		{
			$download_path = $product_download_root.$post['hdn_download_file_path'];
			$post['name'] = $post['hdn_download_file'];
			$filenewtype = strtolower(JFile::getExt($post['hdn_download_file']));
			if($post['hdn_download_file_path'] != $download_path)
			{
				$filename = time().'_'. $post['hdn_download_file']; //Make the filename unique
				$post['name'] =  $product_download_root.str_replace(" ","_",$filename);
				$down_src = $download_path;
				$down_dest = $post['name'];
				copy($down_src,$down_dest);
			}

			if($model->store($post))
			{
				$msg = JText::_('COM_REDSHOP_UPLOAD_COMPLETE' );
			}
			else
			{
				$msg = JText::_('COM_REDSHOP_UPLOAD_FAIL' );
			}
		}
		for($i=0;$i<$totalFile;$i++)
		{
			$errors =  $file['error'][$i];
			if(!$errors)
			{
				$filename =  time()."_".$file['name'][$i];
				$fileExt = strtolower(JFile::getExt($filename));
				if ($fileExt)
				{
					$src 	  =  $file['tmp_name'][$i];
					$dest = $product_download_root.str_replace(" ","_",$filename);
					$file_upload = JFile::upload($src, $dest);
					if($file_upload != 1)
					{
						$msg = JText::_('COM_REDSHOP_PLEASE_CHECK_DIRECTORY_PERMISSION' );
						JError::raiseWarning(403, $msg );
					}
					else
					{
						$post['name'] = $dest;
						if($model->store($post))
						{
							$msg = JText::_('COM_REDSHOP_UPLOAD_COMPLETE' );
						}
						else
						{
							$msg = JText::_('COM_REDSHOP_UPLOAD_FAIL' );
						}
					}
				}
			}
		}
		$this->setRedirect ( 'index.php?tmpl=component&option=com_redshop&view=media&layout=additionalfile&media_id='.$post['media_id'].'&showbuttons=1', $msg );
	}

	function deleteAddtionalFiles()
	{
		$media_id = JRequest::getInt('media_id');
		$fileId = JRequest::getInt('fileId');
		$model = $this->getModel();
		if ($model->deleteAddtionalFiles($fileId))
		{
			$msg = JText::_('COM_REDSHOP_FILE_DELETED' );
		}
		else
		{
			$msg = JText::_('COM_REDSHOP_ERROR_FILE_DELETING' );
		}
		$this->setRedirect ( 'index.php?tmpl=component&option=com_redshop&view=media&layout=additionalfile&media_id='.$media_id.'&showbuttons=1', $msg );
	}

	//ordering
	function saveorder()
	{
		$option = JRequest::getVar ('option');
		$section_id = JRequest::getVar ('section_id');
		$section_name = JRequest::getVar ('section_name');
		$media_section = JRequest::getVar ('media_section');
		$cid 	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order 	= JRequest::getVar( 'order', array(), 'post', 'array' );

		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($order);
		if (! is_array ( $cid ) || count ( $cid ) < 1)
		{
			JError::raiseError ( 500, JText::_('COM_REDSHOP_SELECT_ORDERING' ) );
		}
		$model = $this->getModel('media');
		if (! $model->saveorder($cid, $order))
		{
			echo "<script> alert('" . $model->getError ( true ) . "'); window.history.go(-1); </script>\n";
		}

		$msg = JText::_('COM_REDSHOP_NEW_ORDERING_SAVED' );
		if(isset($section_id))
		{
			$this->setRedirect ( 'index.php?tmpl=component&option='.$option.'&view=media&section_id='.$section_id.'&showbuttons=1&section_name='.$section_name.'&media_section='.$media_section,$msg );
		}
		else if(isset($post['set']) && $post['media_section'] == 'manufacturer')
		{
			$link 	= 'index.php?option=' . $option . '&view=manufacturer';	?>
			<script language="javascript" type="text/javascript">
				window.parent.document.location='<?php echo $link; ?>';
			</script><?php
		}
		else
		{
			$this->setRedirect ( 'index.php?option='.$option.'&view=media',$msg );
		}
	}
}
