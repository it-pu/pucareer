<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends ADMIN_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Company_model', 'Jobs_model'));
	}

	public function index()
	{
		$this->load->view('admin/setting/index');
	}
}
