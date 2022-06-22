<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site{
	public $template;
	public $template_setting;
	public $website_setting;
	public $_isHome = FALSE;
	public $_isCategory = FALSE;
	public $_isSearch = FALSE;
	public $_isDetail = FALSE;

	function is_logged_in(){
		$_this =& get_instance();

		$user_session = $_this->session->userdata;

			if($_this->uri->segment(1) == 'login'){
				if(isset($user_session['logged_in']) && $user_session['logged_in'] == TRUE)
				{
					redirect(base_url('admin'));
				}
			}
			else{
				if(!isset($user_session['logged_in'])){
					redirect(base_url('login'));
				}
			}
	}

	function create_user_access_only($level)
	{
		$_this =& get_instance();
		$user_session = $_this->session->userdata;

		if (!in_array_exist($level, 'super_user') || !in_array_exist($level, 'operator')) 
		{
			redirect(base_url('admin/dashboard'));
		}
	}

	function admin_trans_only($id)
	{
		$_this =& get_instance();
		$user_session = $_this->session->userdata;

		$getdata = $_this->Transaksi_model->get($id, TRUE);
		if ($user_session['id_admin'] != $getdata->id_admin) 
		{
			redirect(set_url('dashboard'));
		}
	}
}