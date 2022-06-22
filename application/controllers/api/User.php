<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('Custom_model');
	}

	public function register_post()
	{
		$post = $this->input->post(NULL, TRUE);
		
		if (!empty($post['email'])) 
		{
			$ceknemail = $this->Custom_model->getdetail('tbl_user', array('email_user' => $post['email_user']));
			if (!empty($ceknemail)) 
			{
				$this->response([
							    'status' => 'false',
							    'message' => 'Maaf, Email sudah terpakai'
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				die();
			}
		}
		
		$ceknohp = $this->Custom_model->getdetail('tbl_user', array('no_hp_user' => $post['no_hp_user']));
		if (!empty($ceknohp)) 
		{
			$this->response([
						    'status' => 'false',
						    'message' => 'Maaf, No HP sudah terpakai'
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			die();
		}

		$insertdata = array
					(
						'id_desa' => 1,
						'password_user' => password_hash($post['password_user'], PASSWORD_BCRYPT),
						'nama_user' => $post['nama_user'],
						'alamat_user' => $post['alamat_user'],
						'id_rw' => $post['id_rw'],
						'id_rt' => $post['id_rt'],
						'no_hp_user' => $post['no_hp_user'],
						'email_user' => $post['email_user'],
						'foto_user' => '',
						'nik_user' => '',
						'pekerjaan_user' => $post['pekerjaan_user'],
						'tgl_aktif' => date('Y-m-d H:i:s'),
						'status_user' => 'aktif',
					);

		$id_user = $this->Custom_model->insertdata('tbl_user', $insertdata);

		$insertlevel = array
					(
						'id_user' => $id_user,
						'id_level' => 4
					);
		$this->Custom_model->insertdata('tbl_user_level', $insertlevel);

		if (!empty($_FILES['foto_user'])) 
		{
			$this->load->library('upload');
			$_FILES['file']['name']     = $_FILES['foto_user']['name'];
		    $_FILES['file']['type']     = $_FILES['foto_user']['type'];
		    $_FILES['file']['tmp_name'] = $_FILES['foto_user']['tmp_name'];
		    $_FILES['file']['error']     = $_FILES['foto_user']['error'];
		    $_FILES['file']['size']     = $_FILES['foto_user']['size'];

			//MENGEDIT CONFIG UNTUK UPLOAD FOTO
			$config['file_name'] = uniqid().".".get_ext($_FILES['foto_user']['name']);
			$config['upload_path'] = './files/prof_pic';
			$config['allowed_types'] = 'jpg|jpeg|png';
			
			//MENGUPLOAD FOTO
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) 
			{
				$gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
            	$config['source_image']='./files/prof_pic/'.$gbr['file_name'];
            	$config['new_image']= './files/prof_pic/'.$gbr['file_name'];
            	$link_file = 'files/prof_pic/'.$config['file_name'];

                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['width']= 800;
                $config['height']= 800;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $updatefoto = array
                			(
                				'foto_user' => $link_file
                			);

                $this->Custom_model->updatedata('tbl_user', $updatefoto, array('id_user' => $id_user));
			}
			else
			{
				$error = $this->upload->display_errors();
			}
		}

		$this->response([
					    'status' => 'true',
					    'message' => 'Pendaftaran Berhasil, mohon untuk login'
		        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		die();
	}

	public function login_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['no_hp']) && !empty($post['password'])) 
		{
			$cekuser = $this->Custom_model->getdetail('tbl_user', array('no_hp_user' => $post['no_hp']));

			if (!empty($cekuser)) 
			{
				$cekuserrole = $this->Custom_model->getrolelogin($cekuser['id_user']);

				if (!empty($cekuserrole)) 
				{
					if (password_verify($post['password'], $cekuser['password_user']))
					{
						$getnamalevel = $this->Custom_model->getdetail('tbl_level', array('id_level' => $cekuserrole['id_level']));

						$data = array
								(
									'id_desa' => $cekuser['id_desa'],
									'id_user' => $cekuser['id_user'],
									'nama_user' => $cekuser['nama_user'],
									'foto_user' => $cekuser['foto_user'],
									'level' => $getnamalevel['nama_level']
								);

						$updateusertoken = array
										(
											'id_user' => $cekuser['id_user']
										);
						$this->Custom_model->updatedata('tbl_notif_token', $updateusertoken, array('device_token' => $post['android_token']));

						$this->response([
						    'status' => 'true',
			                'data' => $data
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
					}
					else
					{
						$this->response([
						    'status' => 'false',
			                'data' => 'Password Salah'
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
					}
				}
				else
				{
					$this->response([
					    'status' => 'false',
		                'data' => 'No user found'
		        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
			}
			else
			{
				$this->response([
					    'status' => 'false',
		                'data' => 'No user found'
		        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
				    'status' => 'false',
	                'data' => 'Error, please try again'
	        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}

		$data = $this->Custom_model->gettoko($idtoko, $iddesa);
	}

	public function detail_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_user'])) 
		{
			$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $post['id_user']));

			if (!empty($detail)) 
			{
				$data = array
						(
							'nama_user' => $detail['nama_user'],
							'email_user' => $detail['email_user'],
							'pekerjaan_user' => $detail['pekerjaan_user'],
							'saldo_user' => 'Rp '.rupiah($detail['saldo_user'])
						);

				$this->response([
							    'status' => 'true',
				                'data' => $data
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
							    'status' => 'false',
				                'data' => 'No user found'
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
						    'status' => 'false',
			                'data' => 'No user found'
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function list_user_rt_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_user'])) 
		{
			$getrt = $this->Custom_model->getdetail('tbl_rt', array('id_user' => $post['id_user']));
			$data = $this->Custom_model->getuserrt($getrt['id_rt']);

			if (!empty($data)) 
			{
				$this->response([
							    'status' => 'true',
				                'data' => $data
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
							    'status' => 'true',
				                'data' => array()
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
						    'status' => 'false',
			                'data' => 'No data found'
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function edit_profil_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_user'])) 
		{
			$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $post['id_user']));

			if (!empty($detail)) 
			{
				$update = array
						(
							'nama_user' => $post['nama_user'],
							'alamat_user' => $post['alamat_user'],
							'id_rw' => $post['id_rw'],
							'id_rt' => $post['id_rt'],
							'email_user' => $post['email_user'],
							'nik_user' => $post['nik_user'],
							'pekerjaan_user' => $post['pekerjaan_user']
						);

				$this->Custom_model->updatedata('tbl_user', array('id_user' => $post['id_user']), $update);

				$this->response([
							    'status' => 'true',
				                'data' => $data
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
							    'status' => 'false',
				                'data' => 'No user found'
				        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
						    'status' => 'false',
			                'data' => 'No user found'
			        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function change_pass_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$getdetail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $post['id_user']));

		if (!empty($getdetail)) 
		{
			if ($post['pass_baru'] == $post['pass_conf']) 
			{
				if (password_verify($post['pass_lama'], $getdetail['password_user'])) 
				{
					$updatedata = array
								(
									'password_user' => password_hash($post['pass_baru'], PASSWORD_BCRYPT),
								);
					$this->Custom_model->updatedata('tbl_user', $updatedata, array('id_user' => $post['id_user']));

					$this->response([
		                    'message' => 'Ganti Password Berhasil'
		            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
				else
				{
					$this->response([
	                    'message' => 'Password Lama Salah'
	            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
			}
			else
			{
				$this->response([
                    'message' => 'Password Tidak Benar'
            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
                'message' => 'User Not Found'
        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function edit_foto_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($_FILES['foto_user']["name"])) 
		{
			$updatedata = array
					(
						'foto_user' => 0
					);

			$db = $this->Custom_model->insertdatafoto('tbl_user', 'id_user', 'foto_user', 'prof_pic', $updatedata, false, $post['id_user'], TRUE);

			$this->response([
				    'status' => 'true',
	                'data' => 'Edit Foto Sukses'
	        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
				    'status' => 'false',
	                'data' => 'Mohon Periksa Data Anda'
	        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function notif_regist_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$deviceid = $post['android_token'];

        if (!empty($deviceid)) 
        {
            $fields = array( 
            'app_id' => '6fbc7daf-d11d-42bf-a8fb-94b2a0f4ae19', 
            'identifier' => $deviceid, 
            'language' => "en", 
            'timezone' => "-28800", 
            'game_version' => "1.0", 
            'device_os' => "9.1.3", 
            'device_type' => "1", 
            'device_model' => "Android",
            ); 

            $fields = json_encode($fields); 
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players"); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
            curl_setopt($ch, CURLOPT_HEADER, FALSE); 
            curl_setopt($ch, CURLOPT_POST, TRUE); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

            $response = curl_exec($ch); 
            curl_close($ch); 

            $return = json_decode( $response); 

            $insertdata = array
                        (
                        	'id_user' => 0,
                            'device_token' => $deviceid,
                            'notif_id' => $return->id
                        );

            $db = $this->Custom_model->insertdata('tbl_notif_token', $insertdata);

            $deviceid = $return->id;
        }

        $this->response([
				    'status' => 'true',
	                'data' => $deviceid
	        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
	}
}