<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper', 'form', 'cookie', 'date_helper'));
		$this->load->library(array('Site', 'form_validation', 'session'));
		$this->load->model(array('Custom_model'));
	}
}