<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Jobs_model', 'User_model', 'Company_model'));

		$this->recent = $this->Jobs_model->list(null, true);
	}

	public function index()
	{
		$get = $this->input->get(NULL, TRUE);
		$applied_id = array();

		if (!empty($this->sess['logged_in'])) 
		{
			$applied = $this->Custom_model->getdata('tbl_apply', array('id_user' => $this->sess['id_user']));
			
			foreach ($applied as $key => $value) 
			{
				$applied_id[] = $value['id_job'];
			}
		}	

		$sort = null;
		$status = null;
		$keyword = null;
		$spec = null;
		$country = null;
		$state = null;
		if (!empty($get['sort'])) 
		{
			$sort = $get['sort'];
		}
		if (!empty($get['status'])) 
		{
			if ($get['status'] != 'all') 
			{
				$status = $get['status'];
			}
		}
		if (!empty($get['keyword'])) 
		{
			$keyword = $get['keyword'];
		}
		if (!empty($get['spec'])) 
		{
			$spec = $get['spec'];
		}
		if (!empty($get['country'])) 
		{
			$country = $get['country'];
		}
		if (!empty($get['state'])) 
		{
			$state = $get['state'];
		}

		$state_get = array();
		if ($country != null) 
		{
			$state_get = $this->Custom_model->getdata('tbl_state', array('id_country' => $country));
		}

		$datasearch = array();
		$datasearch['sort'] = $sort;
		$datasearch['status'] = $status;
		$datasearch['keyword'] = $keyword;
		$datasearch['spec'] = $spec;
		$datasearch['country'] = $country;
		$datasearch['state'] = $state;

		$jobs = $this->Jobs_model->list_home($sort, $status, $applied_id, $keyword, $spec, $country, $state);

		$data = array
				(
					'jobs' => $jobs,
					'applied_id' => $applied_id,
					'state_get' => $state_get,
					'datasearch' => $datasearch
				);

		$this->load->view('home/jobs/list', $data);
	}

	public function detail($id_job)
	{	
		$job = $this->Jobs_model->data(TRUE, $id_job);
		$company = $this->Company_model->detail($job['id_company']);
		$specialization = $this->Jobs_model->get_specialization($id_job);

		$applied_stat = 0;
		$applied = $this->Custom_model->getdata('tbl_apply', array('id_user' => $this->sess['id_user'], 'id_job' => $id_job));
		if (!empty($applied)) 
		{
			$applied_stat = 1;
		}

		$data = array
				(
					'job' => $job,
					'specialization' => $specialization,
					'company' => $company,
					'applied_stat' => $applied_stat
				);

		$this->load->view('home/jobs/detail', $data);
	}

	public function create_job()
	{
		if (empty($this->sess['logged_in']) || $this->sess['company'] == 0 || $this->sess['id_company'] == 0) 
		{
			redirect(base_url());
			die();
		}

		$country = $this->Custom_model->getdata('tbl_country');
		$industry = $this->Custom_model->getdata('tbl_industry', array('industry_status' => 1));
		$specialization = $this->Custom_model->getdata('tbl_specialization', array('specialization_status' => 1));
		$data = array
				(
					'country' => $country,
					'industry' => $industry,
					'specialization' => $specialization
				);
		$this->load->view('home/jobs/create_job', $data);
	}

	public function post_job()
	{
		$post = $this->input->post(NULL, TRUE);
		$insert = array
				(
					'id_user' => $this->sess['id_user'],
					'id_company' => $this->sess['id_company'],
					'id_country' => $post['id_country'],
					'id_state' => $post['id_state'],
					'job_name' => $post['job_name'],
					'job_requirement' => $post['job_requirement'],
					'job_description' => $post['job_description'],
					'job_career_level' => $post['job_career_level'],
					'job_years_experience' => $post['job_years_experience'],
					'job_qualification' => $post['job_qualification'],
					'job_type' => $post['job_type'],
					'expired_at' => $post['expired_at']
				);
		$highlight = array();
		$specialization = array();
		$question = array();
		foreach ($post['highlight'] as $key => $value) 
		{
			if (!empty($value)) 
			{
				$highlight[] = array
						(
							'id_job' => '',
							'highlight_value' => $value
						);
			}
		}
		foreach ($post['id_specialization'] as $key => $value) 
		{
			if (!empty($value)) 
			{
				$specialization[] = array
						(
							'id_job' => '',
							'id_specialization' => $value
						);
			}
		}
		foreach ($post['question'] as $key => $value) 
		{
			if (!empty($value)) 
			{
				$question[] = array
						(
							'id_job' => '',
							'question_value' => $value
						);
			}
		}

		$input = $this->Jobs_model->post_job($insert, $highlight, $specialization, $question);

		if ($input == true) 
		{
			$this->session->set_flashdata('success', 'Your jobs offer has been posted');
			redirect(base_url('companies/jobs_offer'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('jobs/create_job'));
			die();
		}
	}

	public function apply_job($id_job)
	{
		$cekuserupdate = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));
		if ($cekuserupdate['updated_user'] == 0) 
		{
			$this->session->set_flashdata('error', 'Please Update your profile first');
			redirect(base_url('user/profile'));
			die();
		}
		$cekresume = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $this->sess['id_user']));
		if (empty($cekresume)) 
		{
			$this->session->set_flashdata('error', 'Please Update your resume first');
			redirect(base_url('user/resume'));
			die();
		}

		$job = $this->Jobs_model->data(TRUE, $id_job);
		$applicant = $this->User_model->detail($this->sess['id_user']);
		$resume = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $this->sess['id_user']));

		$question = $this->Custom_model->getdata('tbl_job_question', array('id_job' => $id_job));

		$data = array
				(
					'job' => $job,
					'applicant' => $applicant,
					'resume' => $resume,
					'question' => $question
				);
		$this->load->view('home/jobs/apply_job', $data);
	}

	public function apply_job_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$apply = array
				(
					'id_user' => $this->sess['id_user'],
					'id_job' => $post['id_job'],
					'applicant_introduction' => $post['applicant_form'],
				);

		$answer = array();
		if (!empty($post['question_answer'])) 
		{
			foreach ($post['question_answer'] as $key => $value) 
			{
				$answer[] = array
						(
							'id_apply' => '',
							'id_job' => $post['id_job'],
							'id_user' => $this->sess['id_user'],
							'id_job_question' => $post['id_job_question'][$key],
							'answer_value' => $value
						);
			}
		}

		$db = $this->Jobs_model->apply_job($apply, $answer);

		if ($db == true) 
		{
			$this->session->set_flashdata('success', 'Your jobs offer has been posted');
			redirect(base_url('jobs/submit_success/'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please check your input');
			redirect(base_url('jobs/apply_job/').$post['id_job']);
			die();
		}
	}

	public function submit_success()
	{
		// $job = $this->Jobs_model->data(TRUE, $id_job);

		// $data = array
		// 		(
		// 			'job' => $
		// 		);

		$this->load->view('home/jobs/apply_job_done');
	}
}
