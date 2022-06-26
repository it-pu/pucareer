<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper', 'form', 'cookie', 'date_helper', 'download'));
		$this->load->library(array('Site', 'form_validation', 'session'));
		$this->load->model(array('Custom_model'));
		
		$this->sess = $this->session->userdata();

		if (!empty($this->sess['logged_in'])) 
		{
			$findata = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));
			$this->sess['nama_user'] = $findata['nama_user'];
			$this->sess['foto_user'] = base_url().$findata['foto_user'];
		}
	}
}