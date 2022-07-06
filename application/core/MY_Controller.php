<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public $ml;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper', 'form', 'cookie', 'date_helper', 'download'));
		$this->load->library(array('Site', 'form_validation', 'session', 'MultiLangLib'));
		$this->load->model(array('Custom_model'));
	
		$this->sess = $this->session->userdata();
		if (empty($this->sess['lang'])) 
		{
			$this->sess['lang'] = 'EN';
		}

		if (!empty($this->sess['logged_in'])) 
		{
			$findata = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));

			$this->sess['user_name'] = $findata['user_name'];
			$this->sess['user_image'] = $findata['user_image'];
			$this->sess['company'] = $findata['company_account'];
			$this->sess['id_company'] = $findata['id_company'];
			if ($findata['company_account'] == 1 && $findata['id_company'] != 0) 
			{
				$getcompany = $this->Custom_model->getdetail('tbl_company', array('id_company' => $findata['id_company']));
				$this->sess['company_name'] = $getcompany['company_name'];
				$this->sess['company_logo'] = $getcompany['company_logo'];
			}
			
			$validate_page = $this->uri->segment(1);
			$link_post_create_company = $this->uri->segment(2);

			if ($findata['company_account'] == 1 && $findata['id_company'] == 0 && ($validate_page != 'validate_company' && $validate_page != 'logout' && $link_post_create_company != 'validate_company_post')) 
			{
				redirect(base_url('validate_company'));
				die();
			}
		}

		$findlang = $this->Custom_model->getdata('tbl_lang', array('lang_active' => 1));
		$this->sess['lang_av'] = $findlang;

		$this->ml = new MultiLang();
		$this->ml->setLanguage($this->sess['lang']);
	}
}