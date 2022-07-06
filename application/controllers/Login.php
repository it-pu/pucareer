<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ADMIN_Controller {

	public function index()
	{
		$this->load->view('home/login');
	}

	public function validate()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['email']) && !empty($post['password'])) 
		{
			$cekuser = $this->Custom_model->getdetail('tbl_user', array('user_email' => $post['email']));
 	
			if (!empty($cekuser)) 
			{
				if (password_verify($post['password'], $cekuser['user_password'])) 
				{
					$logindata = array
					(
						'id_user' => $cekuser['id_user'],
						'nama_user' => $cekuser['user_name'],
						'company' => $cekuser['company_account'],
						'logged_in' => TRUE					
					);
					
					$this->session->set_userdata($logindata);

                    redirect(base_url('jobs'));
				}
				else
				{
					$this->session->set_flashdata('error', 'Password does not match');
					redirect(base_url('login'));
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'User not found');
				redirect(base_url('login'));
			}
		}
		else
		{
			redirect(base_url('login'));
		}
	}
}
