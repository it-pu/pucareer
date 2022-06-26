<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getdetail($table, $where)
	{
		return $this->get($table, $where, TRUE);
	}

	public function insertdata($table, $data, $affected=FALSE,$batch=FALSE)
	{
		return $this->insert($table, $data, $affected, $batch);
	}

	public function updatedata($table, $data, $where, $batch=false)
	{
		$this->update($table, $data, $where, $batch);
		return TRUE;
	}

	public function deletedata($table, $where)
	{
		return $this->delete_by($table, $where);
	}

	public function countdata($table, $where)
	{
		return $this->count($table, $where);
	}

	public function edit_resume($id_user, $file_upload)
	{
		$this->db->trans_begin();
			global $SConfig;
			$error = 0;
			$this->load->library('upload');

			$getdatafoto = $this->Custom_model->getdetail('tbl_user_resume', array('id_user' => $id_user));

			$ext = get_ext($_FILES[$file_upload]["name"]);

			if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF') 
			{
				if (!empty($getdatafoto)) 
				{
					unlink('.'.$getdatafoto[$file_upload]);
				}
			}
			else
			{
				$error = 1;
			}

			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/re/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				$link_file = '/files/re/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
				if (!empty($getdatafoto)) 
				{
					$this->updatedata('tbl_user_resume', array('resume_file' => $link_file), array('id_user' => $id_user));
				}
				else
				{
					$this->insertdata('tbl_user_resume', array('resume_file' => $link_file));
				}
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}
}