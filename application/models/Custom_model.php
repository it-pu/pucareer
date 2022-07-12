<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertdatafoto($tbl, $idname, $file_upload, $loc, $input, $userlevel = false, $id = null, $edit = null, $onlyfile = false, $width = 800, $height = 800)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			if ($edit == true) 
			{
				$getdatafoto = $this->Custom_model->getdetail($tbl, array($idname => $id));
				$ext = get_ext($_FILES[$file_upload]["name"]);
				if ($onlyfile == true) 
				{
					if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF')
					{
						unlink('./'.$getdatafoto[$file_upload]);
						$this->updatedata($tbl, $input, array($idname => $id));
					}
					else
					{
						$error = 1;
					}
				}
				else
				{
					if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG')
					{
						unlink('./'.$getdatafoto[$file_upload]);
						$this->updatedata($tbl, $input, array($idname => $id));
					}
					else
					{
						$error = 1;
					}
				}
			}
			else
			{
				$id = $this->insertdata($tbl, $input);

				if ($userlevel == TRUE) 
				{
					foreach ($userlevel as $key => $value) 
					{
						$insert = array
								(
									'id_user' => $id,
									'id_level' => $value
								);
						$this->insertdata('tbl_user_level', $insert);
					}
				}
			}

			$error = 0;
			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/'.$loc;
			if ($onlyfile == true) 
			{
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			}
			else
			{
				$config['allowed_types'] = 'jpg|jpeg|png';
			}
			

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				if ($onlyfile == true) 
				{
					$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
				}
				else
				{
					$gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	            	$config['source_image']='./files/'.$loc.'/'.$gbr['file_name'];
	            	$config['new_image']= './files/'.$loc.'/'.$gbr['file_name'];
	            	$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
	                
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= TRUE;
	                $config['width']= $width;
	                $config['height']= $height;
	                
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
				}
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function editfileonly($tbl, $idname, $file_upload, $loc, $id, $file = false, $comp = false)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			$error = 0;
			$getdatafoto = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id));
			$ext = get_ext($_FILES[$file_upload]["name"]);

			if ($files == false) 
			{
				if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG') 
				{
					if (!empty($getdatafoto[$file_upload])) 
					{
						unlink('.'.$getdatafoto[$file_upload]);
					}
				}
				else
				{
					$error = 1;
				}
			}
			elseif ($files == 1) 
			{
				if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF') 
				{
					if (!empty($getdatafoto[$file_upload])) 
					{
						unlink('.'.$getdatafoto[$file_upload]);
					}
				}
				else
				{
					$error = 1;
				}
			}

			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/'.$loc;

			if ($files == false) 
			{
				$config['allowed_types'] = 'jpg|jpeg|png';
			}
			else
			{
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			}
			

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				if ($comp == true) 
				{
					$gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	            	$config['source_image']='./files/'.$loc.'/'.$gbr['file_name'];
	            	$config['new_image']= './files/'.$loc.'/'.$gbr['file_name'];
	            	$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
	                
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= TRUE;
	                $config['width']= 800;
	                $config['height']= 800;
	                
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
				}
				else
				{
					$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
				}
            	
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}
}