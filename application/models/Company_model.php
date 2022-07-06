<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function detail($id_company)
	{
		$this->db->select('tbl_company.*,
							tbl_country.country_name,
							tbl_industry.industry_name,
							tbl_state.state_name
							');
		$this->db->from('tbl_company');
		$this->db->join('tbl_country', 'tbl_company.id_country = tbl_country.id_country');
		$this->db->join('tbl_industry', 'tbl_company.id_industry = tbl_industry.id_industry');
		$this->db->join('tbl_state', 'tbl_country.id_country = tbl_state.id_country');

		$this->db->where('tbl_company.id_company', $id_company);

		$query = $this->db->get();
		return $query->row_array();
	}
}