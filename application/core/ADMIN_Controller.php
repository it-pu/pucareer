<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN_Controller extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->site->is_logged_in();

		$this->sess = $this->session->userdata();

		$this->sess['level'] = array();

		if (!empty($this->sess['logged_in'])) 
		{
			$getlevelid = $this->Custom_model->getdata('tbl_user_level', array('id_user' => $this->sess['id_user']));
			foreach ($getlevelid as $key => $value) 
			{
				$getlevel = $this->Custom_model->getdetail('tbl_level', array('id_level' => $value['id_level']));

				$this->sess['level'][] = $getlevel['nama_level'];
			}
		}
		
	}
}