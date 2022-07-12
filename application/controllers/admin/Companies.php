<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends ADMIN_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Company_model', 'Jobs_model'));
	}

	public function index()
	{
		$companies = $this->Company_model->detail();
		$data = array
				(
					'companies' => $companies
				);
		$this->load->view('admin/companies/list', $data);
	}
	public function detail($id_company)
	{
		$company = $this->Company_model->detail($id_company);
		$jobs = $this->Jobs_model->data(false, null, $id_company);
		$data = array
				(
					'company' => $company,
					'jobs' => $jobs
				);
		$this->load->view('admin/companies/detail', $data);
	}
}
