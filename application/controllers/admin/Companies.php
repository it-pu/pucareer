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

	public function industries()
	{
		$industries = $this->Custom_model->getdata('tbl_industry', null, 'industry_name', 'ASC');
		$total_companies = array();
		foreach ($industries as $key => $value) 
		{
			$total_companies[] = $this->Custom_model->count('tbl_company', array('id_industry' => $value['id_industry']));
		}

		$data = array
				(
					'industries' => $industries,
					'total_companies' => $total_companies
				);
		$this->load->view('admin/companies/industries', $data);
	}

	public function industries_store()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'industry_name' => $post['industry_name']
				);
		$this->Custom_model->insertdata('tbl_industry', $insert);

		$this->session->set_flashdata('success', 'New Industry has been Added');
    	redirect(base_url('admin/companies/industries/'));
	}

	public function industries_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'industry_name' => $post['industry_name']
				);
		$this->Custom_model->updatedata('tbl_industry', $update, array('id_industry' => $post['id_industry']));

		$this->session->set_flashdata('success', 'Industry has been Updated');
    	redirect(base_url('admin/companies/industries/'));
	}

	public function industries_status($id_industry)
	{
		$detail = $this->Custom_model->getdetail('tbl_industry', array('id_industry' => $id_industry));

		$newstat = 1;
		if ($detail['industry_status'] == 1) 
		{
			$newstat = 0;
		}

		$this->Custom_model->updatedata('tbl_industry', array('industry_status' => $newstat), array('id_industry' => $id_industry));

		$this->session->set_flashdata('success', 'Industry has been Updated');
    	redirect(base_url('admin/companies/industries/'));
	}
}
