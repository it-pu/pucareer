<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Jobs_model', 'User_model', 'Company_model'));
	}

	public function index()
	{
		if (!empty($this->sess['logged_in']) && $this->sess['company'] == 0) 
		{
			$applied = $this->Custom_model->getdata('tbl_apply', array('id_user' => $this->sess['id_user']));
			$applied_id = array();
			foreach ($applied as $key => $value) 
			{
				$applied_id[] = $value['id_job'];
			}

			$jobs = $this->Jobs_model->list($applied_id);
		}
		else
		{
			$jobs = $this->Jobs_model->list();
		}
			

		$data = array
				(
					'jobs' => $jobs
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
		$industry = $this->Custom_model->getdata('tbl_industry');
		$specialization = $this->Custom_model->getdata('tbl_specialization');
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
