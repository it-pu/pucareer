<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('User_model', 'Jobs_model'));
	}

	public function index()
	{
		$get = $this->input->get(NULL, TRUE);
		if (empty($get['u'])) 
		{
			if (empty($this->sess['logged_in']) || $this->sess['company'] == 1) 
			{
				redirect(base_url('login'));
				die();
			}
			$get['u'] = $this->sess['id_user'];
		}

		$user = $this->Custom_model->getdetail('tbl_user', array('id_user' => $get['u']));
		$experience = $this->User_model->get_experience($get['u']);
		$education = $this->User_model->get_education($get['u']);
		$skill = $this->Custom_model->getdata('tbl_user_skill', array('id_user' => $get['u'], 'deleted' => 0));

		$data = array
				(
					'user' => $user,
					'experience' => $experience,
					'education' => $education,
					'skill' => $skill
				);

		$this->load->view('home/user/index', $data);
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
					'user_name' => $post['nama'],
					'user_address' => $post['alamat'],
					'birth_date' => $post['birth_date'],
					'user_phone_number' => $post['telp'],
					'about_user' => $post['about'],
					'updated_user' => 1
				);

		if (!empty($_FILES['user_image']["name"]) && $_FILES['user_image']['type'] == 'image/jpeg') 
		{
			$updatedb = $this->Custom_model->insertdatafoto('tbl_user', 'id_user', 'user_image', 'img_user', $update, false, $post['id_user'], true);
		}
		else
		{
			$updatedb = $this->Custom_model->updatedata('tbl_user', $update, array('id_user' => $post['id_user']));
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
		$exp = $this->User_model->get_experience($this->sess['id_user']);

		$data = array
				(
					'exp' => $exp
				);

		$this->load->view('home/user/experience', $data);
	}
	public function experience_edit($id_user_experience)
	{
		$exp = $this->User_model->get_experience($this->sess['id_user'], $id_user_experience);

		$country = $this->Custom_model->getdata('tbl_country');
		$state = $this->Custom_model->getdata('tbl_state', array('id_country' => $exp['country']));
		$currency = $this->Custom_model->getdata('tbl_currency');
		$specialization = $this->Custom_model->getdata('tbl_specialization');

		$role = $this->Custom_model->getdata('tbl_role', array('id_specialization' => $exp['specialization']));

		$position = $this->Custom_model->getdata('tbl_position');
		$country = $this->Custom_model->getdata('tbl_country');
		$industry = $this->Custom_model->getdata('tbl_industry');

		$data = array
				(
					'exp' => $exp,
					'country' => $country,
					'state' => $state,
					'currency' => $currency,
					'specialization' => $specialization,
					'role' => $role,
					'position' => $position,
					'country' => $country,
					'industry' => $industry
				);

		$this->load->view('home/user/experience_edit', $data);
	}
	public function experience_add()
	{
		$country = $this->Custom_model->getdata('tbl_country');
		$currency = $this->Custom_model->getdata('tbl_currency');
		$specialization = $this->Custom_model->getdata('tbl_specialization');

		$position = $this->Custom_model->getdata('tbl_position');
		$country = $this->Custom_model->getdata('tbl_country');
		$industry = $this->Custom_model->getdata('tbl_industry');

		$data = array
				(
					'country' => $country,
					'currency' => $currency,
					'specialization' => $specialization,
					'position' => $position,
					'country' => $country,
					'industry' => $industry
				);

		$this->load->view('home/user/experience_add', $data);
	}
	public function experience_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$enddate = '0000-00-00';
		if (empty($_POST['present']))
		{
			$enddate = $post['end_date'];
		}

		$insert = array
				(
					'id_user' => $this->sess['id_user'],
					'job' => $post['job'],
					'name_company' => $post['name_company'],
					'address' => $post['address'],
					'country' => $post['country'],
					'state' => $post['state'],
					'industry' => $post['industry'],
					'specialization' => $post['specialization'],
					'role' => $post['role'],
					'position' => $post['position'],
					'id_currency' => $post['id_currency'],
					'monthly_salary' => rupiah_to_sql($post['monthly_salary']),
					'start_date' => $post['start_date'],
					'end_date' => $enddate
				);

		$this->Custom_model->insertdata('tbl_user_experience', $insert);

		$this->session->set_flashdata('success', 'Success Adding Experience');
		redirect(base_url('user/experience'));
		die();
	}
	public function experience_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$enddate = '0000-00-00';
		if (empty($_POST['present']))
		{
			$enddate = $post['end_date'];
		}

		$update = array
				(
					'job' => $post['job'],
					'name_company' => $post['name_company'],
					'address' => $post['address'],
					'country' => $post['country'],
					'state' => $post['state'],
					'industry' => $post['industry'],
					'specialization' => $post['specialization'],
					'role' => $post['role'],
					'position' => $post['position'],
					'id_currency' => $post['id_currency'],
					'monthly_salary' => rupiah_to_sql($post['monthly_salary']),
					'start_date' => $post['start_date'],
					'end_date' => $enddate
				);

		$this->Custom_model->updatedata('tbl_user_experience', $update, array('id_user_experience' => $post['id_user_experience']));

		$this->session->set_flashdata('success', 'Success Updating Experience');
		redirect(base_url('user/experience'));
		die();
	}

	public function experience_delete($id_user_experience)
	{
		$update = array('status_experience' => 0);
		$this->Custom_model->updatedata('tbl_user_experience', $update, array('id_user_experience' => $id_user_experience));

		$this->session->set_flashdata('success', 'Success Deleting Experience');
		redirect(base_url('user/experience'));
		die();
	}
	public function application_history()
	{
		$application_history = $this->Jobs_model->application_history($this->sess['id_user']);

		$data = array
				(
					'app_history' => $application_history
				);

		$this->load->view('home/user/app_history', $data);
	}
	public function education()
	{
		$edu = $this->User_model->get_education($this->sess['id_user']);

		$data = array
				(
					'edu' => $edu
				);

		$this->load->view('home/user/education', $data);
	}
	public function education_add()
	{
		$fos = $this->Custom_model->getdata('tbl_field_of_study');
		$country = $this->Custom_model->getdata('tbl_country');
		$data = array('fos' => $fos, 'country' => $country);
		$this->load->view('home/user/education_add', $data);
	}
	public function education_edit($id_user_education)
	{
		$edu = $this->User_model->get_education($this->sess['id_user'], $id_user_education);
		$fos = $this->Custom_model->getdata('tbl_field_of_study');
		$country = $this->Custom_model->getdata('tbl_country');
		$state = $this->Custom_model->getdata('tbl_state', array('id_country' => $edu['id_country']));

		$data = array
				(
					'edu' => $edu,
					'fos' => $fos,
					'country' => $country,
					'state' => $state
				);

		$this->load->view('home/user/education_edit', $data);
	}
	public function education_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'id_user' => $this->sess['id_user'],
					'university_name' => $post['university_name'],
					'graduation_month' => $post['graduation_month'],
					'graduation_year' => $post['graduation_year'],
					'qualification' => $post['qualification'],
					'id_country' => $post['id_country'],
					'id_state' => $post['id_state'],
					'id_field_of_study' => $post['id_field_of_study'],
					'major' => $post['major'],
					'grade' => $post['grade'],
					'score' => $post['score'],
					'score_out_of' => $post['score_out_of'],
					'additional_info' => $post['additional_info']
				);

		$this->Custom_model->insertdata('tbl_user_education', $insert);

		$this->session->set_flashdata('success', 'Success Adding Education');
		redirect(base_url('user/education'));
		die();
	}
	public function education_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'university_name' => $post['university_name'],
					'graduation_month' => $post['graduation_month'],
					'graduation_year' => $post['graduation_year'],
					'qualification' => $post['qualification'],
					'id_country' => $post['id_country'],
					'id_state' => $post['id_state'],
					'id_field_of_study' => $post['id_field_of_study'],
					'major' => $post['major'],
					'grade' => $post['grade'],
					'score' => $post['score'],
					'score_out_of' => $post['score_out_of'],
					'additional_info' => $post['additional_info']
				);

		$this->Custom_model->updatedata('tbl_user_education', $update, array('id_user_education' => $post['id_user_education']));

		$this->session->set_flashdata('success', 'Success Updating Education');
		redirect(base_url('user/education'));
		die();
	}
	public function education_delete($id_user_education)
	{
		$this->Custom_model->updatedata('tbl_user_education', array('status_education' => 0), array('id_user_education' => $id_user_education));

		$this->session->set_flashdata('success', 'Success Updating Skills');
		redirect(base_url('user/education'));
		die();
	}
	public function social_media()
	{
		$user = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));
		$data = array
				(
					'user' => $user
				);
		$this->load->view('home/user/social_media', $data);
	}
	public function social_media_update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'website_user' => $post['website_user'],
					'linked_in_link' => $post['linked_in_link'],
					'fb_link' => $post['fb_link'],
					'fb_username' => $post['fb_username'],
					'ig_link' => $post['ig_link'],
					'ig_username' => $post['ig_username'],
					'twitter_link' => $post['twitter_link'],
					'twitter_username' => $post['twitter_username']
				);

		$this->Custom_model->updatedata('tbl_user', $update, array('id_user' => $this->sess['id_user']));

		$this->session->set_flashdata('success', 'Success Updating Profile');
		redirect(base_url('user/social_media'));
		die();
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
	public function resume_download($id_user_resume, $id_apply = false)
	{
		if ($id_apply != false) 
		{
			$this->Custom_model->updatedata('tbl_apply', array('apply_review' => 2), array('id_apply' => $id_apply));
		}

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
	public function password_update()
	{
		$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));

		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('user/setting/setting_password'));
			die();
        }

        if (password_verify($post['old_password'], $detail['user_password'])) 
        {
        	if ($post['new_password'] == $post['confirm_password']) 
        	{
        		$update = array
					(
						'user_password' => password_hash($post['new_password'], PASSWORD_BCRYPT)
					);
				$this->Custom_model->updatedata('tbl_user', $update, array('id_user' => $this->sess['id_user']));

				$this->session->set_flashdata('success', 'Success Updating Password');
				redirect(base_url('user/setting/'));
				die();
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'Please Confirm Your Password Correctly');
				redirect(base_url('user/setting/setting_password'));
				die();
        	}
        }
        else
        {
        	$this->session->set_flashdata('error', 'Your Old Password Does Not Match');
			redirect(base_url('user/setting/setting_password'));
			die();
        }

		
	}
	public function setting_email()
	{
		$this->load->view('home/user/setting_email');
	}

	// AJAX //
	public function get_role($id_specialization)
	{
		$data = $this->Custom_model->getdata('tbl_role', array('id_specialization' => $id_specialization));

		echo json_encode($data);
	}
}
