<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_state($id_country)
	{
		$states = $this->Custom_model->getdata('tbl_state', array('id_country' => $id_country));
		echo json_encode($states);
	}
}
