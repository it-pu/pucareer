<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper', 'form', 'cookie', 'date_helper', 'download'));
		$this->load->library(array('Site', 'form_validation', 'session', 'MultiLangLib'));
		$this->load->model(array('Custom_model'));
		
		$this->site->is_logged_in();

		$this->sess = $this->session->userdata();

		if (!empty($this->sess['logged_in_admin'])) 
		{
			$findadmin = $this->Custom_model->getdetail('tbl_admin', array('id_admin' => $this->sess['id_admin']));

			$this->sess['name_admin'] = $findadmin['name_admin'];
			$this->sess['image_admin'] = $findadmin['image_admin'];
			$this->sess['level_admin'] = $findadmin['level_admin'];
		}
	}
}