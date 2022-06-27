<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends MY_Model {

	public $rules_admin = array
					(
						'username_admin' => array
									(
										'field' => 'username_admin',
										'label' => 'Username',
										'rules' => 'trim|required'
									),
						'password_admin' => array
									(
										'field' => 'password_admin',
										'label' => 'Password',
										'rules' => 'trim|required|callback_password_check'
									)
					);

	public function __construct()
	{
		parent::__construct();
	}

	public function getdata($table, $where = NULL, $order = null, $sort = null, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		if ($where != NULL) 
		{
			return $this->get_by($table, $where, $order, $sort, $limit, $offset, $single, $select);
		}
		else
		{
			return $this->get($table);
		}
	}

	public function getdetail($table, $where)
	{
		return $this->get($table, $where, TRUE);
	}

	public function insertdata($table, $data, $affected=FALSE,$batch=FALSE)
	{
		return $this->insert($table, $data, $affected, $batch);
	}

	public function updatedata($table, $data, $where, $batch=false)
	{
		$this->update($table, $data, $where, $batch);
		return TRUE;
	}

	public function deletedata($table, $where)
	{
		return $this->delete_by($table, $where);
	}

	public function countdata($table, $where)
	{
		return $this->count($table, $where);
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
			return TRUE;
		}
	}

	// USER //
	public function get_experience($id_user, $id_user_experience = false)
	{
		$this->db->select('tbl_user_experience.*,
							tbl_country.country_name,
							tbl_industry.industry_name,
							tbl_specialization.specialization_name,
							tbl_role.role_name,
							tbl_position.position_name,
							tbl_currency.currency_code
							');
		$this->db->from('tbl_user_experience');
		$this->db->join('tbl_country', 'tbl_user_experience.country = tbl_country.id_country');
		$this->db->join('tbl_industry', 'tbl_user_experience.industry = tbl_industry.id_industry');
		$this->db->join('tbl_specialization', 'tbl_user_experience.specialization = tbl_specialization.id_specialization');
		$this->db->join('tbl_role', 'tbl_user_experience.role = tbl_role.id_role');
		$this->db->join('tbl_position', 'tbl_user_experience.position = tbl_position.id_position');
		$this->db->join('tbl_currency', 'tbl_user_experience.id_currency = tbl_currency.id_currency');
		$this->db->order_by('tbl_user_experience.start_date', 'DESC');

		$this->db->where('tbl_user_experience.id_user', $id_user);
		$this->db->where('tbl_user_experience.status_experience', 1);

		if ($id_user_experience == true) 
		{
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get();
			return $query->result_array();
		}

		
	}
}