<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{
	protected $_table_name;
	protected $_order_by;
	protected $_order_by_type;
	protected $_primary_filter;
	protected $_primary_key;
	protected $_type ; 
	public $rules;


	function __construct(){
		parent::__construct();
	}

	public function insert($table, $data,$affected=FALSE,$batch=FALSE){
		if($batch == TRUE){
			$this->db->insert_batch($table, $data);
			// $this->db->insert_batch('tbl_users',$data);
		}
		else{
			$this->db->set($data);
			$this->db->insert($table);

			if ($affected==TRUE) 
			{
				$query = $this->db->query('SELECT LAST_INSERT_ID()');
				$row = $query->row_array();
				return $row['LAST_INSERT_ID()'];
			}
			else
			{
				$id = $this->db->insert_id();
				return $id;
			}
		}
	}

	public function update($table, $data,$where=array(), $batch=false){
		if ($batch == false) 
		{
			$this->db->set($data);
			$this->db->where($where);
			$this->db->update($table);
		}
		if ($batch == true) 
		{
			$this->db->update_batch($table, $data, $where);
		}
	}	

	public function get($table,$where=null,$id=NULL,$single=FALSE){
		if($id != NULL){
			$this->db->where($where);
			$method = 'row_array';
		}

		else if($single == TRUE){
			$method = 'row_array';
		}

		else{
			$method = 'result_array';
		}

		if($this->_order_by_type){
			$this->db->order_by($this->_order_by,$this->_order_by_type);
			// $this->db->order_by('ID','DESC');
		}
		else{
			$this->db->order_by($this->_order_by);
		}

		return $this->db->get($table)->$method();
	}

	public function get_by($table, $where = NULL, $order = NULL, $sort = null ,$limit = NULL, $offset = NULL, $single, $select = NULL){
		if($select != NULL){
			$this->db->select($select);
		}

		$this->db->from($table);

		if($where){
			$this->db->where($where);
		}

		if(($limit) && ($offset)){
			$this->db->limit($limit,$offset);
		}
		else if($limit){
			$this->db->limit($limit);
		}

		if ($order) 
		{
			$this->db->order_by($order, $sort);
		}

		return $this->get(NULL,$single);
	}

	public function delete($id){

		if(!$id){
			return FALSE;
		}

		$this->db->where($this->_primary_key,$id);
		$this->db->limit(1);
		$this->db->delete($table);
	}

	public function delete_by($table, $where = NULL)
	{
		if($where){
			$this->db->where($where);
		}

		$this->db->delete($table);
	}

	public function count($table, $where = NULL){
		if($where){
			$this->db->where($where);
		}

		$this->db->from($table);
		return $this->db->count_all_results();
	}
}