<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home/user/index');
	}
	public function profile()
	{
		$this->load->view('home/user/profil');
	}
	public function experience()
	{
		$this->load->view('home/user/experience');
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
		$this->load->view('home/user/skill');
	}
	public function resume()
	{
		$this->load->view('home/user/resume');
	}
	public function resume_setting()
	{
		$this->load->view('home/user/resume_setting');
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
