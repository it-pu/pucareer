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

	public function change_status($id_user)
	{
		$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id_user));

		$newstat = 'active';
		if ($detail['user_status'] == 'active') 
		{
			$newstat = 'deactive';
		}

		$this->Custom_model->updatedata('tbl_user', array('user_status' => $newstat), array('id_user' => $id_user));

		$this->session->set_flashdata('success', 'User has been updated');
    	redirect(base_url('admin/users/detail/').$id_user);
	}
}
