<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends ADMIN_Controller {

	public function index()
	{
		$users = $this->Custom_model->getdata('tbl_admin');

		$data = array
				(
					'users' => $users
				);

		$this->load->view('admin/access/list', $data);
	}

	public function add()
	{
		$this->load->view('admin/access/add');
	}

	public function detail($id_admin)
	{
		$detail = $this->Custom_model->getdetail('tbl_admin', array('id_admin' => $id_admin));

		$data = array
				(
					'detail' => $detail
				);

		$this->load->view('admin/access/detail', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		if ($post['password'] == $post['password_confirm']) 
		{
			$insert = array
					(
						'email_admin' => $post['email'],
						'password_admin' => password_hash($post['password'], PASSWORD_BCRYPT),
						'name_admin' => $post['name'],
						'level_admin' => 'admin',
						'image_admin' => '',
						'status_admin' => 'active',
					);

			$db = $this->Custom_model->insertdatafoto('tbl_admin', 'id_admin', 'image_admin', 'profile_pic', $insert);

			if ($db === TRUE) 
			{
				$this->session->set_flashdata('success', 'New Admin has been added');
	    		redirect(base_url('admin/access'));
			}
			else
			{
				$this->session->set_flashdata('error', $db);
	    		redirect(base_url('admin/access/add'));
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check Your Input');
    		redirect(base_url('admin/access/add'));
		}	
	}

	public function edit_password()
	{
		$post = $this->input->post(NULL, TRUE);
		$detail = $this->Custom_model->getdetail('tbl_admin', array('id_admin' => $post['id_admin']));

		if ($post['new_password'] == $post['confirm_password']) 
		{
			if (password_verify($post['old_password'], $detail['password_admin'])) 
			{
				$update = array('password_admin' => password_hash($post['new_password'], PASSWORD_BCRYPT));
				$this->Custom_model->updatedata('tbl_admin', $update, array('id_admin' => $post['id_admin']));

				$this->session->set_flashdata('success', 'Update Password Success');
    			redirect(base_url('admin/access/detail/').$post['id_admin']);
			}
			else
			{
				$this->session->set_flashdata('error', 'Old Password Does Not Match');
    			redirect(base_url('admin/access/detail/').$post['id_admin']);
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check Your Input');
    		redirect(base_url('admin/access/detail/').$post['id_admin']);
		}
	}

	public function edit_foto()
	{
		$post = $this->input->post(NULL, TRUE);

		$db = $this->Custom_model->editfileonly('tbl_admin', 'id_admin', 'image_admin', 'profile_pic', $post['id_admin'], false, true);

		if ($db === TRUE) 
		{
			$this->session->set_flashdata('success', 'Data has been edited');
    		redirect(base_url('admin/access/detail/').$post['id_admin']);
		}
		else
		{
			$this->session->set_flashdata('error', $db);
    		redirect(base_url('admin/access/detail/').$post['id_admin']);
		}
	}

	public function edit_status($id_user, $detail = null)
    {
        $getstatusnow = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id_user));

        if ($getstatusnow['status_user'] == 'aktif') 
        {
            $newstatus = 'non aktif';
        }

        if ($getstatusnow['status_user'] == 'non aktif') 
        {
            $newstatus = 'aktif';
        }

        $this->Custom_model->updatedata('tbl_user', array('status_user' => $newstatus), array('id_user' => $id_user));

        $this->session->set_flashdata('success', 'User has been updated');

        if ($detail == null) 
        {
            redirect(base_url('admin/access'));
        }
        else
        {
            redirect(base_url('admin/access/detail/').$id_user);
        }   
    }
}
