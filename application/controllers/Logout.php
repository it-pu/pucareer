<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index()
	{
		if(!empty($_COOKIE['opfor']))
		{
			$this->Custom_model->deletedata('tbl_user_auth', array('token' => $_COOKIE['opfor']));
			unset($_COOKIE['opfor']);
		}

		$this->session->sess_destroy();
		
		redirect(base_url('login'));
	}
}