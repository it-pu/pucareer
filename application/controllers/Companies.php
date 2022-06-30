<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home/company');
	}

	public function validate_company()
	{
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

		$this->form_validation->set_rules('id_country', 'Nama', 'required|numeric');
		$this->form_validation->set_rules('id_industry', 'Nama', 'required|numeric');
		$this->form_validation->set_rules('company_name', 'Nama', 'required');
		$this->form_validation->set_rules('company_address', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('validate_company'));
			die();
        }
		
		$insert = array
					(
						'id_country' => $post['id_country'],
						'id_industry' => $post['id_industry'],
						'company_name' => $post['company_name'],
						'company_address' => $post['company_address'],
						'company_description' => $post['company_description'],
						'company_logo' => '',
						'company_banner' => ''
					);

		$insertdb = $this->Custom_model->insertdatafoto('tbl_company', 'id_company', 'company_logo', 'loco_c', $insert);

		if ($insertdb == true) 
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('validate_company'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('validate_company'));
			die();
		}
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
			$get['c'] = $this->sess['id_user'];
		}
		$user = $this->Custom_model->getdetail('tbl_user', array('id_user' => $get['u']));
	}

	public function get_companies($id_country)
	{
		$company = $this->Custom_model->getdata('tbl_company', array('id_country' => $id_country));
		echo json_encode($company);
	}
}
