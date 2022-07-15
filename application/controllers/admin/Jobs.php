<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends ADMIN_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Jobs_model'));
	}

	public function index()
	{
		$jobs = $this->Jobs_model->list();
		$data = array
				(
					'jobs' => $jobs
				);

		$this->load->view('admin/jobs/list', $data);
	}

	public function detail($id_job)
	{
		$job = $this->Jobs_model->data(TRUE, $id_job);
		$specialization = $this->Jobs_model->get_specialization($id_job);
		$question = $this->Custom_model->getdata('tbl_job_question', array('id_job' => $id_job));
		$applicant = $this->Jobs_model->applicant($id_job);
		$data = array
				(
					'job' => $job,
					'specialization' => $specialization,
					'question' => $question,
					'applicant' => $applicant
				);

		$this->load->view('admin/jobs/detail', $data);
	}

	public function change_status($id_job)
	{
		$detail = $this->Custom_model->getdetail('tbl_job', array('id_job' => $id_job));

		$newstat = 1;
		$blockadmin = 0;
		if ($detail['job_active'] == 1) 
		{
			$newstat = 0;
			$blockadmin = 1;
		}

		$this->Custom_model->updatedata('tbl_job', array('job_active' => $newstat, 'blocked_by_admin' => $blockadmin), array('id_job' => $id_job));

		$this->session->set_flashdata('success', 'Jobs has been updated');
		redirect(base_url('admin/jobs/detail/').$id_job);
		die();
	}

	public function specialization()
	{
		$specialization = $this->Custom_model->getdata('tbl_specialization', null, 'specialization_name', 'ASC');
		$data = array
				(
					'specialization' => $specialization
				);

		$this->load->view('admin/jobs/specialization', $data);
	}

	public function specialization_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$specialization_input = array
							(
								'id_admin' => $this->sess['id_admin'],
								'specialization_name' => $post['specialization']
							);
		$role = array();
		foreach ($post['role'] as $key => $value) 
		{
			if (!empty($value)) 
			{
				$role[] = array
						(
							'id_specialization' => '',
							'role_name' => $value
						);
			}
		}

		$insertdb = $this->Jobs_model->specialization_post($specialization_input, $role);

		if ($insertdb == true) 
		{
			$this->session->set_flashdata('success', 'Specialization has beed added');
			redirect(base_url('admin/jobs/specialization'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check Your Input');
			redirect(base_url('admin/jobs/specialization'));
			die();
		}
	}

	public function specialization_detail($id_specialization)
	{
		$specialization = $this->Jobs_model->specialization_detail($id_specialization);
		$role = $this->Custom_model->getdata('tbl_role', array('id_specialization' => $id_specialization));

		$data = array
				(
					'specialization' => $specialization,
					'role' => $role
				);
		$this->load->view('admin/jobs/specialization_detail', $data);
	}

	public function specialization_status($id_specialization)
	{
		$detail = $this->Custom_model->getdetail('tbl_specialization', array('id_specialization' => $id_specialization));

		$newstat = 1;	
		if ($detail['specialization_status'] == 1) 
		{
			$newstat = 0;
		}

		$this->Custom_model->updatedata('tbl_specialization', array('specialization_status' => $newstat), array('id_specialization' => $id_specialization));

		$this->session->set_flashdata('success', 'Jobs has been updated');
		redirect(base_url('admin/jobs/specialization_detail/').$id_specialization);
		die();
	}
}
