<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ADMIN_Controller {

	public function index()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['email']) && !empty($post['password'])) 
		{
			$cekuser = $this->Custom_model->getdetail('tbl_admin', array('email_admin' => $post['email']));
 	
			if (!empty($cekuser)) 
			{
				if (password_verify($post['password'], $cekuser['password_admin'])) 
				{
					$logindata = array
					(
						'id_admin' => $cekuser['id_admin'],
						'logged_in_admin' => TRUE					
					);
					
					$this->session->set_userdata($logindata);

                    redirect(base_url('admin'));
				}
				else
				{
					$this->session->set_flashdata('error', 'Data yang Anda masukkan tidak sesuai');
					$this->load->view('admin/login');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Data yang Anda masukkan tidak sesuai');
				$this->load->view('admin/login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
}
