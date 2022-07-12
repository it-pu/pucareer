<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function data($id_user = null)
	{
		$this->db->select('tbl_user.*,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_user');
		$this->db->join('tbl_country', 'tbl_user.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_user.id_state = tbl_state.id_state');

		if ($id_user != null) 
		{
			$this->db->where('tbl_user.id_user', $id_user);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get();
			return $query->result_array();
		}	
	}

	public function detail($id_user)
	{
		$this->db->select('tbl_user.*,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_user');
		$this->db->join('tbl_country', 'tbl_user.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_user.id_state = tbl_state.id_state');

		$this->db->where('tbl_user.id_user', $id_user);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_experience($id_user, $id_user_experience = false)
	{
		$this->db->select('tbl_user_experience.*,
							tbl_country.country_name,
							tbl_state.state_name,
							tbl_industry.industry_name,
							tbl_specialization.specialization_name,
							tbl_role.role_name,
							tbl_position.position_name,
							tbl_currency.currency_code
							');
		$this->db->from('tbl_user_experience');
		$this->db->join('tbl_country', 'tbl_user_experience.country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_user_experience.state = tbl_state.id_state');
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

	public function get_education($id_user, $id_user_education = false)
	{
		$this->db->select('tbl_user_education.*,
							tbl_country.country_name,
							tbl_field_of_study.field_of_study_name
							');
		$this->db->from('tbl_user_education');
		$this->db->join('tbl_country', 'tbl_user_education.id_country = tbl_country.id_country');
		$this->db->join('tbl_field_of_study', 'tbl_user_education.id_field_of_study = tbl_field_of_study.id_field_of_study');
		$this->db->order_by('tbl_user_education.graduation_year', 'DESC');

		$this->db->where('tbl_user_education.id_user', $id_user);
		$this->db->where('tbl_user_education.status_education', 1);

		if ($id_user_education == true) 
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

	public function edit_resume($id_user, $file_upload)
	{
		$this->db->trans_begin();
			global $SConfig;
			$error = 0;
			$this->load->library('upload');

			$getdatafoto = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $id_user));

			$ext = get_ext($_FILES[$file_upload]["name"]);

			if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF') 
			{
				if (!empty($getdatafoto)) 
				{
					unlink('.'.$getdatafoto[$file_upload]);
				}
			}
			else
			{
				$error = 1;
			}

			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/re/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				$link_file = '/files/re/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
				if (!empty($getdatafoto)) 
				{
					$this->updatedata('tbl_user_resume', array('resume_file' => $link_file), array('id_user' => $id_user));
				}
				else
				{
					$this->insertdata('tbl_user_resume', array('resume_file' => $link_file));
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