<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('User_model'));
	}

	public function index()
	{
		$get = $this->input->get(NULL, TRUE);
		if (empty($get['u'])) 
		{
			if (empty($this->sess['logged_in'])) 
			{
				redirect(base_url('login'));
				die();
			}
		}
		$this->load->view('home/user/index');
	}
	public function profile()
	{
		$this->site->logged_front();

		$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));

		$data = array
				(
					'detail' => $detail
				);

		$this->load->view('home/user/profil', $data);
	}
	public function profile_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Nama', 'required');
		$this->form_validation->set_rules('telp', 'Nama', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('user/profile'));
			die();
        }

		$update = array
				(
					'nama_user' => $post['nama'],
					'alamat_user' => $post['alamat'],
					'telp_user' => $post['telp'],
					'about_user' => $post['about']
				);

		if (!empty($_FILES['foto_user']["name"]) && $_FILES['foto_user']['type'] == 'image/jpeg') 
		{
			$updatedb = $this->Custom_model->insertdatafoto('tbl_user', 'id_user', 'foto_user', 'img_user', $update, false, $post['id_user'], true);
			var_dump($updatedb);
			echo 222;
		}
		else
		{
			$updatedb = $this->Custom_model->updatedata('tbl_user', $update, array('id_user' => $post['id_user']));
			var_dump($updatedb);
		}

		if ($updatedb == TRUE) 
		{
			$this->session->set_flashdata('success', 'Success Updating Profile');
			redirect(base_url('user/profile'));
			die();
		}
		else
		{
			$this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('user/profile'));
			die();
		}

		
	}
	public function experience()
	{
		$this->load->view('home/user/experience');
	}
	public function experience_add()
	{
		$country = $this->Custom_model->getdata('tbl_country');
		$currency = $this->Custom_model->getdata('tbl_currency');
		$data = array
				(
					'country' => $country,
					'currency' => $currency
				);
		$this->load->view('home/user/experience_add', $data);
	}
	public function experience_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'job' => $post['job'],
					'id_company' => $post['id_company'],
					'name_company' => $post['name_company'],
					'location' => $post['location'],
					'country' => $post['country'],
					'industry' => $post['industry'],
					'specialization' => $post['specialization'],
					'position' => $post['position'],
					'id_currency' => $post['id_currency'],
					'monthly_salary' => $post['monthly_salary'],
					'start_date' => $post['start_date'],
					'end_date' => $post['end_date']
				);
	}
	public function application_history()
	{
		$this->load->view('home/user/app_history');
	}
	public function education()
	{
		$this->load->view('home/user/education');
	}
	public function social_media()
	{
		$this->load->view('home/user/social_media');
	}
	public function skills()
	{
		$skills = $this->Custom_model->getdata('tbl_user_skill', array('id_user' => $this->sess['id_user'], 'deleted' => 0));
		$data = array
				(
					'skills' => $skills
				);
		$this->load->view('home/user/skill', $data);
	}
	public function skills_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'id_user' => $this->sess['id_user'],
					'skill_name' => $post['skill'],
					'skill_level' => strtoupper($post['level'])
				);
		$this->Custom_model->insertdata('tbl_user_skill', $insert);

		$this->session->set_flashdata('success', 'Success Updating Skills');
		redirect(base_url('user/skills'));
		die();
	}
	public function skills_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'skill_name' => $post['skill'],
					'skill_level' => strtoupper($post['level'])
				);
		$this->Custom_model->updatedata('tbl_user_skill', $update, array('id_user_skill' => $post['id_user_skill']));

		$this->session->set_flashdata('success', 'Success Updating Skills');
		redirect(base_url('user/skills'));
		die();
	}
	public function skills_deactive($id_user_skill)
	{
		$this->Custom_model->updatedata('tbl_user_skill', array('deleted' => 1), array('id_user_skill' => $id_user_skill));

		$this->session->set_flashdata('success', 'Success Updating Skills');
		redirect(base_url('user/skills'));
		die();
	}
	public function resume()
	{
		$resume = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $this->sess['id_user']));

		$id_user_resume = '';
		$nama_file = '-';
		$tgl_upload_file = '-';
		$exist = 0;
		if (!empty($resume)) 
		{
			$exist = 1;
			$id_user_resume = $resume['id_user_resume'];
			$nama_file = $resume['resume_name'];
			$tgl_upload_file = $resume['updated_at'];
		}

		$data = array
				(
					'id_user_resume' => $id_user_resume,
					'nama_file' => $nama_file,
					'tgl_upload_file' => $tgl_upload_file,
					'exist' => $exist
				);
		$this->load->view('home/user/resume', $data);
	}
	public function resume_setting()
	{
		$resume = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $this->sess['id_user']));

		$exist = 1;
		if (empty($resume)) 
		{
			$exist = 0;
		}

		$data = array
				(
					'exist' => $exist
				);
		$this->load->view('home/user/resume_setting', $data);
	}
	public function resume_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
					(
						'id_user' => $this->sess['id_user'],
						'resume_name' => $post['resume_name']
					);

		$findcurrentresume = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $this->sess['id_user']));

		if (!empty($findcurrentresume)) 
		{
			if (!empty($_FILES['resume_file']["name"])) 
			{
				$updatedb = $this->Custom_model->insertdatafoto('tbl_user_resume', 'id_user_resume', 'resume_file', 're', $update, false, $findcurrentresume['id_user_resume'], true, true);
				echo 123;
			}
			else
			{
				$updatedb = $this->Custom_model->updatedata('tbl_user_resume', $update, array('id_user_resume' => $findcurrentresume['id_user_resume']));
			}
			
		}
		else
		{
			$updatedb = $this->Custom_model->insertdatafoto('tbl_user_resume', 'id_user_resume', 'resume_file', 're', $update, false, null, null, true);
		}
		
		$this->session->set_flashdata('success', 'Success Updating Resume');
		redirect(base_url('user/resume'));
		die();
	}
	public function resume_download($id_user_resume)
	{
		$getdetail = $this->Custom_model->getdetail('tbl_user_resume', array('id_user_resume' => $id_user_resume));

		$ext = get_ext($getdetail['resume_file']);

		$filename = $getdetail['resume_name'].'.'.$ext;

		force_download(
		    $filename, 
		    file_get_contents(base_url().$getdetail['resume_file']), 
		    mime_content_type(base_url().$getdetail['resume_file'])
		);
	}
	public function setting()
	{
		$this->load->view('home/user/setting');
	}
	public function setting_password()
	{
		$this->load->view('home/user/setting_password');
	}
	public function setting_email()
	{
		$this->load->view('home/user/setting_email');
	}
}
