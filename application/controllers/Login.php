<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ADMIN_Controller {

	public function index()
	{
		if(!empty($_COOKIE['opfor']))
		{
			$cekcookie = $this->Custom_model->getdetail('tbl_user_auth', array('token'));

			if (!empty($cekcookie) || $cekcookie['expired'] > date('Y-m-d H:i:s')) 
			{
				$cekuser = $this->Custom_model->getdetail('tbl_user', array('id_user' => $cekcookie['id_user']));

				$logindata = array
				(
					'id_user' => $cekuser['id_user'],
					'id_desa' => $cekuser['id_desa'],
					'nama_user' => $cekuser['nama_user'],
					'foto_user' => base_url($cekuser['foto_user']),
					'logged_in' => TRUE					
				);
				
				$this->session->set_userdata($logindata);
				redirect(base_url('admin'));
			}
			else
			{
				unset($_COOKIE['opfor']); 
				redirect(base_url('login'));
			}
		}
		else
		{
			$post = $this->input->post(NULL, TRUE);

			if (!empty($post['email']) && !empty($post['password'])) 
			{
				$cekuser = $this->Custom_model->getdetail('tbl_user', array('email_user' => $post['email']));
	 	
				if (!empty($cekuser)) 
				{
					$ceklevel = $this->Custom_model->getdetail('tbl_user_level', array('id_user' => $cekuser['id_user']));

					if ($ceklevel['id_level'] != 4) 
					{
						if (password_verify($post['password'], $cekuser['password_user'])) 
						{
							$logindata = array
							(
								'id_user' => $cekuser['id_user'],
								'id_desa' => $cekuser['id_desa'],
								'nama_user' => $cekuser['nama_user'],
								'foto_user' => base_url($cekuser['foto_user']),
								'logged_in' => TRUE					
							);
							
							$this->session->set_userdata($logindata);

							if (!empty($post['remember'])) 
							{
								$token = generate_token();
								$date = plusmonth(date('Y-m-d H:i:s'));
								setcookie('opfor', $token, time() + 2.592000);
								$this->Custom_model->insertdata('tbl_user_auth', array('id_user' => $cekuser['id_user'], 'token' => $token, 'expired' => $date));
							}

		                    redirect(base_url('admin'));
						}
						else
						{
							$this->session->set_flashdata('error', 'Data yang Anda masukkan tidak sesuai  111');
							$this->load->view('admin/login');
						}
					}
					else
					{
						$this->session->set_flashdata('error', 'Tidak berhak login');
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
}
