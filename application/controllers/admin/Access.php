<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends ADMIN_Controller {

	public function index()
	{
		$users = $this->Custom_model->getdata('tbl_admin');

		$data = array
				(
					'users' => $users
				);

		$this->load->view('admin/access/list', $data);
	}

	public function add()
	{
		$level = $this->Custom_model->getlevel($this->sess['level']);

		$desa = '';
		if (in_array_exist($this->sess['level'], 'admin')) 
		{
			$desa = $this->Custom_model->getdata('tbl_desa');
		}

		$rw = $this->Custom_model->getrw($this->sess['id_desa']);

		$data = array
				(
					'level' => $level,
					'desa' => $desa,
					'rw' => $rw
				);

		$this->load->view('admin/access/add', $data);
	}

	public function detail($id_admin)
	{
		$detail = $this->Custom_model->getdetail('tbl_admin', array('id_admin' => $id_admin));

		$data = array
				(
					'detail' => $detail
				);

		$this->load->view('admin/access/detail', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		$desa = 0;
		if (!empty($post['desa'])) 
		{
			$desa = $post['desa'];
		}

		$rw = $post['id_rw'] == 0 ? '0' : $post['id_rw'];
		$rt = $post['id_rt'] == 0 ? '0' : $post['id_rt'];

		if (in_array_exist($this->sess['level'], 'super_admin') || in_array_exist($this->sess['level'], 'admin'))
		{
			$insert = array
					(
						'id_desa' => $this->sess['id_desa'],
						'password_user' => password_hash($post['no_hp'], PASSWORD_BCRYPT),
						'nama_user' => $post['nama'],
						'no_hp_user' => $post['no_hp'],
						'alamat_user' => $post['alamat_user'],
						'id_rw' => $rw,
						'id_rt' => $rt,
						'email_user' => $post['email'],
						'tgl_aktif' => date('Y-m-d'),
						'status_user' => 'aktif'
					);
		}

		if (in_array_exist($this->sess['level'], 'operator')) 
		{
			$insert = array
					(
						'id_desa' => $this->sess['id_desa'],
						'password_user' => password_hash($post['nik'], PASSWORD_BCRYPT),
						'nama_user' => $post['nama'],
						'no_hp_user' => $post['no_hp'],
						'alamat_user' => $post['alamat_user'],
						'id_rw' => $rw,
						'id_rt' => $rt,
						'email_user' => $post['email'],
						'nik_user' => $post['nik'],
						'pekerjaan_user' => $post['pekerjaan'],
						'tgl_aktif' => date('Y-m-d'),
						'status_user' => 'aktif'
					);
		}

		$db = $this->Custom_model->insertdatafoto('tbl_user', 'id_user', 'foto_user', 'prof_pic', $insert, $post['level']);

		if ($db === TRUE) 
		{
			$this->session->set_flashdata('success', 'New Data has been added');
    		redirect(base_url('admin/access'));
		}
		else
		{
			$this->session->set_flashdata('error', $db);
    		redirect(base_url('admin/access/add'));
		}
	}

	public function edit_foto()
	{
		$post = $this->input->post(NULL, TRUE);

		$db = $this->Custom_model->editfileonly('tbl_admin', 'id_admin', 'image_admin', 'profile_pic', $post['id_admin'], false, true);

		if ($db === TRUE) 
		{
			$this->session->set_flashdata('success', 'Data has been edited');
    		redirect(base_url('admin/access/detail/').$post['id_admin']);
		}
		else
		{
			$this->session->set_flashdata('error', $db);
    		redirect(base_url('admin/access/detail/').$post['id_admin']);
		}
	}

	public function edit_status($id_user, $detail = null)
    {
        $getstatusnow = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id_user));

        if ($getstatusnow['status_user'] == 'aktif') 
        {
            $newstatus = 'non aktif';
        }

        if ($getstatusnow['status_user'] == 'non aktif') 
        {
            $newstatus = 'aktif';
        }

        $this->Custom_model->updatedata('tbl_user', array('status_user' => $newstatus), array('id_user' => $id_user));

        $this->session->set_flashdata('success', 'User has been updated');

        if ($detail == null) 
        {
            redirect(base_url('admin/access'));
        }
        else
        {
            redirect(base_url('admin/access/detail/').$id_user);
        }   
    }
}
