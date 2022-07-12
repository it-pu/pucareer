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

	public function change_status($id_company)
	{
		$detail = $this->Custom_model->getdetail('tbl_company', array('id_company' => $id_company));

		$newstat = 'active';
		if ($detail['company_status'] == 'active') 
		{
			$newstat = 'deactive';
		}

		$this->Custom_model->updatedata('tbl_company', array('company_status' => $newstat), array('id_company' => $id_company));
		$this->Custom_model->updatedata('tbl_user', array('user_status' => $newstat), array('id_company' => $id_company));

		$this->session->set_flashdata('success', 'Company has been updated');
    	redirect(base_url('admin/companies/detail/').$id_company);
	}
}
