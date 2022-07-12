<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Company_model', 'Jobs_model', 'User_model'));
	}

	public function index()
	{
		$this->load->view('home/company');
	}

	public function profile()
	{
		$get = $this->input->get(NULL, TRUE);
		if (empty($get['c'])) 
		{
			if (empty($this->sess['logged_in']) && $this->sess['company'] == 0) 
			{
				redirect(base_url());
				die();
			}
			$get['c'] = $this->sess['id_company'];
		}
		$company = $this->Company_model->detail($get['c']);
		$gallery = $this->Custom_model->getdata('tbl_company_gallery', array('id_company' => $get['c']));
		$job = $this->Jobs_model->data(false, null, $get['c']);

		$data = array
				(
					'company' => $company,
					'gallery' => $gallery,
					'job' => $job
				);

		$this->load->view('home/company/profile', $data);
	}

	public function gallery_setting()
	{
		$gallery = $this->Custom_model->getdata('tbl_company_gallery', array('id_company' => $this->sess['id_company']));

		$data = array
				(
					'gallery' => $gallery
				);

		$this->load->view('home/company/gallery_setting', $data);
	}

	public function gallery_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'id_company' => $post['id_company'],
					'gallery_name' => ''
				);

		$insertdb = $this->Custom_model->insertdatafoto('tbl_company_gallery', 'id_company_gallery', 'gallery_file', 'gallery_c', $insert);

		if ($insertdb == true) 
		{
			$this->session->set_flashdata('success', 'Adding Photo Success');
			redirect(base_url('companies/gallery_setting'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('companies/gallery_setting'));
			die();
		}
	}

	public function setting()
	{
		$company = $this->Custom_model->getdetail('tbl_company', array('id_company' => $this->sess['id_company']));

		$data = array
				(
					'company' => $company
				);

		$this->load->view('home/company/setting', $data);
	}

	public function profile_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('company_name', 'Nama', 'required');
		$this->form_validation->set_rules('company_address', 'Address', 'required');
		$this->form_validation->set_rules('company_phone_number', 'Phone Number', 'required|numeric');
		$this->form_validation->set_rules('company_description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('companies/setting'));
			die();
        }

		$input = array
				(
					'company_name' => $post['company_name'],
					'company_address' => $post['company_address'],
					'company_phone_number' => $post['company_phone_number'],
					'company_email' => $post['company_email'],
					'company_description' => $post['company_description'],
					'company_website' => $post['company_website']
				);

		if (!empty($_FILES['company_logo']["name"]) && $_FILES['company_logo']['type'] == 'image/jpeg') 
		{
			$updatedb = $this->Custom_model->insertdatafoto('tbl_company', 'id_company', 'company_logo', 'logo_c', $input, false, $post['id_company'], true);
		}
		if (!empty($_FILES['company_banner']["name"]) && $_FILES['company_banner']['type'] == 'image/jpeg') 
		{
			$updatedb = $this->Custom_model->insertdatafoto('tbl_company', 'id_company', 'company_banner', 'banner_c', $input, false, $post['id_company'], true);
		}
		else
		{
			$updatedb = $this->Custom_model->updatedata('tbl_company', $input, array('id_company' => $post['id_company']));
		}

		if ($updatedb === TRUE) 
		{
			$this->session->set_flashdata('success', 'Success Updating Profile');
			redirect(base_url('companies/setting'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('companies/setting'));
			die();
		}
	}

	public function jobs_offer()
	{
		$jobs = $this->Jobs_model->data(false, null, $this->sess['id_company']);

		$applicant = array();
		foreach ($jobs as $key => $value) 
		{
			$applicant[] = $this->Custom_model->count('tbl_apply', array('id_job' => $value['id_job']));
		}

		$data = array
				(
					'jobs' => $jobs,
					'applicant' => $applicant
				);

		$this->load->view('home/company/jobs_offer', $data);
	}

	public function jobs_offer_detail($id_job)
	{
		$job = $this->Jobs_model->data(true, $id_job);
		$applicant = $this->Jobs_model->applicant($id_job);
		$specialization = $this->Jobs_model->get_specialization($id_job);

		$job_question = $this->Custom_model->getdata('tbl_job_question', array('id_job' => $id_job));

		$data = array
				(
					'job' => $job,
					'applicant' => $applicant,
					'specialization' => $specialization,
					'job_question' => $job_question
				);
		$this->load->view('home/company/jobs_offer_detail', $data);
	}

	public function deactive_job($id_job)
	{
		$update = array('expired_at' => date('Y-m-d'), 'job_active' => 0);
		$this->Custom_model->updatedata('tbl_job', $update, array('id_job' => $id_job));

		$this->session->set_flashdata('success', 'Success Updating Offer');
		redirect(base_url('companies/jobs_offer/detail/').$id_job);
		die();
	}

	public function activate_job()
	{
		$post = $this->input->post(NULL, TRUE);
		$update = array('expired_at' => $post['expired_at'], 'job_active' => 1);
		$this->Custom_model->updatedata('tbl_job', $update, array('id_job' => $post['id_job']));

		$this->session->set_flashdata('success', 'Success Updating Offer');
		redirect(base_url('companies/jobs_offer/detail/').$post['id_job']);
		die();
	}

	public function validate_company()
	{
		if (empty($this->sess['logged_in']) || $this->sess['company'] == 0 || $this->sess['id_company'] != 0) 
		{
			redirect(base_url());
			die();
		}

		$country = $this->Custom_model->getdata('tbl_country');
		$industry = $this->Custom_model->getdata('tbl_industry');
		$data = array
				(
					'country' => $country,
					'industry' => $industry
				);
		$this->load->view('home/company/validate_company', $data);
	}

	public function validate_company_post()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('id_country', 'Country', 'required|numeric');
		$this->form_validation->set_rules('id_state', 'State', 'required|numeric');
		$this->form_validation->set_rules('id_industry', 'Industry', 'required|numeric');
		$this->form_validation->set_rules('company_name', 'Nama', 'required');
		$this->form_validation->set_rules('company_address', 'Address', 'required');
		$this->form_validation->set_rules('company_phone_number', 'Phone', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('validate_company'));
			die();
        }
		
		$insert = array
					(
						'id_country' => $post['id_country'],
						'id_state' => $post['id_state'],
						'id_industry' => $post['id_industry'],
						'company_name' => $post['company_name'],
						'company_address' => $post['company_address'],
						'company_phone_number' => $post['company_phone_number'],
						'company_email' => $post['company_email'],
						'company_description' => $post['company_description'],
						'company_logo' => '',
						'company_banner' => ''
					);

		$insertdb = $this->Custom_model->insertdatafoto('tbl_company', 'id_company', 'company_logo', 'logo_c', $insert);
		$this->Custom_model->updatedata('tbl_user', array('id_company' => $insertdb), array('id_user' => $this->sess['id_user']));

		if ($insertdb == true) 
		{
			$this->session->set_flashdata('success', 'Thank you for your registration, we recommend you to update your Company Profile by <a href="'.base_url('companies/setting').'">click here</a>');
			redirect(base_url('companies/profile'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('validate_company'));
			die();
		}
	}

	public function get_companies($id_country)
	{
		$company = $this->Custom_model->getdata('tbl_company', array('id_country' => $id_country));
		echo json_encode($company);
	}

	public function applicant_form($id_apply)
	{
		$update = array('apply_review' => 1);
		$this->Custom_model->updatedata('tbl_apply', $update, array('id_apply' => $id_apply));

		$applicant = $this->Jobs_model->applicant(null, $id_apply);
		$apply_answer = $this->Custom_model->getdata('tbl_apply_answer', array('id_apply' => $id_apply));
		$job_question = $this->Custom_model->getdata('tbl_job_question', array('id_job' => $applicant['id_job']));

		$experience = $this->User_model->get_experience($applicant['id_user']);
		$skill = $this->Custom_model->getdata('tbl_user_skill', array('id_user' => $applicant['id_user'], 'deleted' => 0));

		$education = $this->User_model->get_education($applicant['id_user']);

		$resumequery = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $applicant['id_user']));
		$resume = base_url('user/resume_download/').$resumequery['id_user_resume'].'/'.$id_apply;

		echo json_encode(array($applicant, $job_question, $apply_answer, $experience, $skill, $education, $resume));
	}
}
