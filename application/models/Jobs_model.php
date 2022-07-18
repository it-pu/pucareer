<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function list($id_applied = null)
	{
		$this->db->select('tbl_job.*,
							tbl_company.company_name,
							tbl_company.company_logo,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_job');
		$this->db->join('tbl_company', 'tbl_job.id_company = tbl_company.id_company');
		$this->db->join('tbl_country', 'tbl_job.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_job.id_state = tbl_state.id_state');

		if (!empty($id_applied)) 
		{
			$this->db->where_not_in('tbl_job.id_job', $id_applied);
		}
		
		$this->db->where('tbl_job.job_active', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function list_home($sort = false, $status = false, $id_applied = null, $keyword = null, $spec = null, $country = null, $state = null)
	{
		$this->db->select('tbl_job.*,
							tbl_company.company_name,
							tbl_company.company_logo,
							tbl_country.country_name,
							tbl_state.state_name,
							tbl_job_specialization.id_specialization
							');
		$this->db->from('tbl_job');
		$this->db->join('tbl_company', 'tbl_job.id_company = tbl_company.id_company');
		$this->db->join('tbl_job_specialization', 'tbl_job.id_job = tbl_job_specialization.id_job');
		$this->db->join('tbl_country', 'tbl_job.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_job.id_state = tbl_state.id_state');

		if ($sort == false) 
		{
			$this->db->order_by('tbl_job.created_at', 'DESC');
		}

		if ($sort != false) 
		{
			$this->db->order_by('tbl_job.created_at', $sort);
		}

		if ($status != 'all') 
		{
			if ($status == 'applied') 
			{
				$this->db->where_in('tbl_job.id_job', $id_applied);
			}
			if ($status == 'not_applied') 
			{
				$this->db->where_not_in('tbl_job.id_job', $id_applied);
			}
		}

		if ($keyword != null) 
		{
			$this->db->like('tbl_job.job_name', $keyword);
		}
		if ($spec != null) 
		{
			$this->db->where('tbl_job_specialization.id_specialization', $spec);
		}

		if ($country != null) 
		{
			$this->db->where('tbl_job.id_country', $country);
		}
		if ($state != null) 
		{
			$this->db->where('tbl_job.id_state', $state);
		}
		$this->db->group_by("tbl_job.job_name");
		
		$this->db->where('tbl_job.job_active', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data($single = FALSE, $id_job = NULL, $id_company = false)
	{
		$this->db->select('tbl_job.*,
							tbl_company.company_name,
							tbl_company.company_logo,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_job');
		$this->db->join('tbl_company', 'tbl_job.id_company = tbl_company.id_company');
		$this->db->join('tbl_country', 'tbl_job.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_job.id_state = tbl_state.id_state');

		if ($single == TRUE) 
		{
			$this->db->where('tbl_job.id_job', $id_job);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			if ($id_company != false) 
			{
				$this->db->where('tbl_job.id_company', $id_company);
				$query = $this->db->get();
				return $query->result_array();
			}
			else
			{
				$this->db->where('tbl_job.job_active', 1);
				$query = $this->db->get();
				return $query->result_array();
			}	
		}
	}

	public function get_specialization($id_job)
	{
		$this->db->select('tbl_job_specialization.*,
							tbl_specialization.specialization_name
							');
		$this->db->from('tbl_job_specialization');
		$this->db->join('tbl_specialization', 'tbl_job_specialization.id_specialization = tbl_specialization.id_specialization');

		$this->db->where('tbl_job_specialization.id_job', $id_job);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function applicant($id_job = null, $id_apply = null)
	{
		$this->db->select('tbl_apply.*,
							tbl_user.id_country,
							tbl_user.id_state,
							tbl_user.user_name,
							tbl_user.user_address,
							tbl_user.user_email,
							tbl_user.user_phone_number,
							tbl_user.about_user,
							tbl_user.birth_date,
							tbl_user_resume.id_user_resume,
							tbl_user_resume.resume_name,
							tbl_user_resume.resume_file,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_apply');
		$this->db->join('tbl_user', 'tbl_apply.id_user = tbl_user.id_user');
		$this->db->join('tbl_user_resume', 'tbl_user.id_user = tbl_user_resume.id_user');
		$this->db->join('tbl_country', 'tbl_user.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_user.id_state = tbl_state.id_state');

		if ($id_apply != null) 
		{
			$this->db->where('tbl_apply.id_apply', $id_apply);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$this->db->where('tbl_apply.id_job', $id_job);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function application_history($id_user)
	{
		$this->db->select('tbl_apply.*,
							tbl_job.job_name,
							tbl_job.job_type,
							tbl_job.job_active,
							tbl_company.id_company,
							tbl_company.company_name,
							tbl_company.company_logo,
							tbl_country.country_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_apply');
		$this->db->join('tbl_job', 'tbl_apply.id_job = tbl_job.id_job');
		$this->db->join('tbl_company', 'tbl_job.id_company = tbl_company.id_company');
		$this->db->join('tbl_country', 'tbl_job.id_country = tbl_country.id_country');
		$this->db->join('tbl_state', 'tbl_job.id_state = tbl_state.id_state');

		$this->db->where('tbl_apply.id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function post_job($jobs, $highlight, $specialization, $question)
	{
		$this->db->trans_begin();

		$id_job = $this->insertdata('tbl_job', $jobs);

		if (!empty($highlight)) 
		{
			foreach ($highlight as $key => $value) 
			{
				$highlight[$key]['id_job'] = $id_job;
			}
			$this->insertdata('tbl_job_highlight', $highlight, FALSE, TRUE);
		}
		if (!empty($specialization)) 
		{
			foreach ($specialization as $key => $value) 
			{
				$specialization[$key]['id_job'] = $id_job;
			}
			$this->insertdata('tbl_job_specialization', $specialization, FALSE, TRUE);
		}
		if (!empty($question)) 
		{
			foreach ($question as $key => $value) 
			{
				$question[$key]['id_job'] = $id_job;
			}
			$this->insertdata('tbl_job_question', $question, FALSE, TRUE);
		}
		

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function apply_job($applicant_form, $applicant_answer)
	{
		$this->db->trans_begin();

		$id_apply = $this->insertdata('tbl_apply', $applicant_form);

		foreach ($applicant_answer as $key => $value) 
		{
			$applicant_answer[$key]['id_apply'] = $id_apply;
		}

		$this->insertdata('tbl_apply_answer', $applicant_answer, FALSE, TRUE);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function specialization_post($specialization, $role)
	{
		$this->db->trans_begin();

		$id_job = $this->insertdata('tbl_specialization', $specialization);

		if (!empty($role)) 
		{
			foreach ($role as $key => $value) 
			{
				$role[$key]['id_specialization'] = $id_job;
			}
			$this->insertdata('tbl_role', $role, FALSE, TRUE);
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function specialization_detail($id_specialization)
	{
		$this->db->select('tbl_specialization.*,
							tbl_admin.name_admin
							');
		$this->db->from('tbl_specialization');
		$this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_specialization.id_admin');

		$this->db->where('tbl_specialization.id_specialization', $id_specialization);
		$query = $this->db->get();
		return $query->row_array();
	}
}