<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home/user/profil');
	}
	public function application_history()
	{
		$this->load->view('home/user/app_history');
	}
	public function education()
	{
		$this->load->view('home/user/education');
	}
	public function skills()
	{
		$this->load->view('home/user/skill');
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
