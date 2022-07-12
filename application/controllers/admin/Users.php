<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends ADMIN_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Company_model', 'Jobs_model', 'User_model'));
	}

	public function index()
	{
		$users = $this->User_model->data();

		$data = array
				(
					'users' => $users
				);
		$this->load->view('admin/users/list', $data);
	}

	public function detail($id_user)
	{
		$user = $this->User_model->data($id_user);

		$data = array
				(
					'user' => $user
				);
		$this->load->view('admin/users/detail', $data);
	}
}
