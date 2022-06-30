<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function change_lang()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->session->set_userdata('lang', $post['lang_code']);
		// var_dump($this->sess['lang']);

		redirect($post['url_hidden']);
	}
}
