<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends MY_Model {

	public $rules_admin = array
					(
						'username_admin' => array
									(
										'field' => 'username_admin',
										'label' => 'Username',
										'rules' => 'trim|required'
									),
						'password_admin' => array
									(
										'field' => 'password_admin',
										'label' => 'Password',
										'rules' => 'trim|required|callback_password_check'
									)
					);

	public function __construct()
	{
		parent::__construct();
	}

	public function getdata($table, $where = NULL, $order = null, $sort = null, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		if ($where != NULL) 
		{
			return $this->get_by($table, $where, $order, $sort, $limit, $offset, $single, $select);
		}
		else
		{
			return $this->get($table);
		}
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
		return $this->update($table, $data, $where, $batch);
	}

	public function deletedata($table, $where)
	{
		return $this->delete_by($table, $where);
	}

	public function countdata($table, $where)
	{
		return $this->count($table, $where);
	}

	public function getpendaftar($id_desa, $id_pendaftar = null)
	{
		$this->db->select('tbl_user_regist.id_user_regist,
							tbl_user_regist.id_desa,
							tbl_user_regist.nama_user,
							tbl_user_regist.alamat_user,
							tbl_user_regist.id_rw,
							tbl_user_regist.id_rt,
							tbl_user_regist.no_hp_user,
							tbl_user_regist.email_user,
							tbl_user_regist.tgl_regist,
							tbl_user_regist.status_regist,
							tbl_rw.nomor_rw,
							tbl_rt.nomor_rt');
		$this->db->from('tbl_user_regist');
		$this->db->join('tbl_rw', 'tbl_user_regist.id_rw = tbl_rw.id_rw');
		$this->db->join('tbl_rt', 'tbl_user_regist.id_rt = tbl_rt.id_rt');
		$this->db->order_by('tbl_user_regist.tgl_regist', 'DESC');
		$this->db->where('tbl_user_regist.id_desa', $id_desa);

		if ($id_pendaftar != null) 
		{
			$this->db->where('tbl_user_regist.id_user_regist', $id_pendaftar);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get();
			return $query->result_array();
		}

		
	}

	public function getnewsdata($tipe, $limit, $offset)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->limit($limit, $offset);
		$this->db->where('status_berita', 'aktif');
		if ($tipe == 'agenda') 
		{
			$this->db->where('tipe_berita', 'agenda');
			$this->db->order_by('tgl_agenda', 'DESC');
		}
		if ($tipe == 'berita') 
		{
			$this->db->where('tipe_berita', 'berita');
			$this->db->order_by('created_at_berita', 'DESC');
		}

     	
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getrolelogin($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user_level');
		$this->db->where('id_user', $id_user);
		$this->db->where_in('id_level', array(4, 6));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getsurat($id_desa = null, $id_surat = null)
	{
		$this->db->select('tbl_surat.id_surat,
							tbl_surat.id_user_penanggung_jawab,
							tbl_surat.id_user_bersangkutan,
							tbl_surat.id_surat_kategori,
							tbl_surat.nama_surat,
							tbl_surat.note_surat,
							tbl_surat.nomor_surat,
							tbl_surat.tgl_request,
							tbl_surat.tgl_terima,
							tbl_surat.status_surat,
							tbl_surat_kategori.nama_kategori_surat,
							tbl_user.nama_user');
		$this->db->from('tbl_surat');
		$this->db->join('tbl_user', 'tbl_surat.id_user_bersangkutan = tbl_user.id_user');
		$this->db->join('tbl_surat_kategori', 'tbl_surat.id_surat_kategori = tbl_surat_kategori.id_surat_kategori');
		$this->db->order_by('tbl_surat.tgl_request', 'DESC');

		if ($id_desa != null) 
		{
			$this->db->where('tbl_surat.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}

		if ($id_surat != null) 
		{
			$this->db->where('tbl_surat.id_surat', $id_surat);
			$query = $this->db->get();
			return $query->row_array();
		}
		
	}

	public function getsuratsub($id_kat = NULL, $id_desa = null)
	{
		$this->db->select('tbl_surat_kategori_sub.id_surat_kategori_sub,
							tbl_surat_kategori_sub.id_surat_kategori,
							tbl_surat_kategori_sub.nama_surat_kategori_sub,
							tbl_surat_kategori_sub.deskripsi_surat_kategori_sub,
							tbl_surat_kategori.nama_kategori_surat');
		$this->db->from('tbl_surat_kategori_sub');
		$this->db->join('tbl_surat_kategori', 'tbl_surat_kategori_sub.id_surat_kategori = tbl_surat_kategori.id_surat_kategori');
		$this->db->order_by('tbl_surat_kategori_sub.nama_surat_kategori_sub', 'ASC');

		if ($id_kat != null) 
		{
			$this->db->where('tbl_surat_kategori_sub.id_surat_kategori', $id_kat);
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			$this->db->where('tbl_surat_kategori_sub.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function getsuratsubandro($id_kat = NULL, $id_desa = null)
	{
		$this->db->select('tbl_surat_kategori_sub.id_surat_kategori_sub,
							tbl_surat_kategori_sub.id_surat_kategori,
							tbl_surat_kategori_sub.nama_surat_kategori_sub,
							tbl_surat_kategori_sub.syarat_sub_kategori');
		$this->db->from('tbl_surat_kategori_sub');
		$this->db->order_by('tbl_surat_kategori_sub.nama_surat_kategori_sub', 'ASC');

		if ($id_kat != null) 
		{
			$this->db->where('tbl_surat_kategori_sub.id_surat_kategori', $id_kat);
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			$this->db->where('tbl_surat_kategori_sub.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function getsuratuser($id_user, $status = null)
	{
		$this->db->select('tbl_surat.id_surat,
							tbl_surat.nama_surat,
							tbl_surat.tgl_request,
							tbl_surat.status_surat,
							tbl_surat_kategori.nama_kategori_surat');
		$this->db->from('tbl_surat');
		$this->db->join('tbl_surat_kategori', 'tbl_surat.id_surat_kategori = tbl_surat_kategori.id_surat_kategori');
		$this->db->order_by('tbl_surat.tgl_request', 'DESC');
		$this->db->where('tbl_surat.id_user_bersangkutan', $id_user);

		if ($status != null) 
		{
			$this->db->where('tbl_surat.status_surat', $status);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getsuratuserwarga($id_rt)
	{
		$this->db->select('tbl_surat.id_surat,
							tbl_surat.nama_surat,
							tbl_surat.tgl_request,
							tbl_surat.id_user_bersangkutan,
							tbl_surat.status_surat,
							tbl_surat_kategori.nama_kategori_surat,
							tbl_user.id_rt');
		$this->db->from('tbl_surat');
		$this->db->join('tbl_surat_kategori', 'tbl_surat.id_surat_kategori = tbl_surat_kategori.id_surat_kategori');
		$this->db->join('tbl_user', 'tbl_surat.id_user_bersangkutan = tbl_user.id_user');
		$this->db->order_by('tbl_surat.tgl_request', 'DESC');
		$this->db->where('tbl_user.id_rt', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function gettransaksi($id_transaksi = null, $id_operator = null, $id_desa = null)
	{
		$this->db->select('tbl_transaksi_bs.id_transaksi_bs,
							tbl_transaksi_bs.id_desa,
							tbl_transaksi_bs.id_user_nasabah,
							tbl_transaksi_bs.id_user_operator,
							tbl_transaksi_bs.tgl_transaksi_bs,
							tbl_transaksi_bs.total_saldo_didapat,
							tbl_user.nama_user');
		$this->db->from('tbl_transaksi_bs');
		$this->db->join('tbl_user', 'tbl_transaksi_bs.id_user_nasabah = tbl_user.id_user');
		$this->db->order_by('tbl_transaksi_bs.tgl_transaksi_bs', 'DESC');


		if ($id_operator != null) 
		{
			$this->db->where('tbl_transaksi_bs.id_user_operator', $id_operator);
		}

		if ($id_transaksi != null) 
		{
			$this->db->where('tbl_transaksi_bs.id_transaksi_bs', $id_transaksi);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$this->db->where('tbl_transaksi_bs.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function gettransaksilist($id_transaksi = null)
	{
		$this->db->select('tbl_transaksi_isi_bs.id_transaksi_isi_bs,
							tbl_transaksi_isi_bs.id_transaksi_bs,
							tbl_transaksi_isi_bs.id_jenis_sampah,
							tbl_transaksi_isi_bs.quantity,
							tbl_transaksi_isi_bs.total_harga_sampah,
							tbl_jenis_sampah.nama_jenis_sampah');
		$this->db->from('tbl_transaksi_isi_bs');
		$this->db->join('tbl_jenis_sampah', 'tbl_transaksi_isi_bs.id_jenis_sampah = tbl_jenis_sampah.id_jenis_sampah');

		$this->db->where('tbl_transaksi_isi_bs.id_transaksi_bs', $id_transaksi);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function gettransaksiandro($id_user = null)
	{
		$this->db->select('tbl_transaksi_bs.id_transaksi_bs,
							tbl_transaksi_bs.id_desa,
							tbl_transaksi_bs.id_user_nasabah,
							tbl_transaksi_bs.id_user_operator,
							tbl_transaksi_bs.id_lokasi_bs,
							tbl_transaksi_bs.tgl_transaksi_bs,
							tbl_lokasi_bs.nama_lokasi_bs');
		$this->db->from('tbl_transaksi_bs');
		$this->db->join('tbl_lokasi_bs', 'tbl_transaksi_bs.id_lokasi_bs = tbl_lokasi_bs.id_lokasi_bs');
		$this->db->order_by('tbl_transaksi_bs.tgl_transaksi_bs', 'DESC');

		$this->db->where('tbl_transaksi_bs.id_user_nasabah', $id_user);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getrewardandro($id_desa)
	{
		$this->db->select('id_reward_bs,
							nama_reward,
							nilai_dibutuhkan,
							qty_reward');
		$this->db->from('tbl_reward_bs');
		$this->db->order_by('nama_reward', 'ASC');
		$this->db->where('id_desa', $id_desa);
		$this->db->where_not_in('qty_reward', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getrewardtrans($id_desa)
	{
		$this->db->select('tbl_transaksi_reward_bs.id_transaksi_reward_bs,
							tbl_transaksi_reward_bs.id_desa,
							tbl_transaksi_reward_bs.id_user,
							tbl_transaksi_reward_bs.id_reward_bs,
							tbl_transaksi_reward_bs.qty_get_reward,
							tbl_transaksi_reward_bs.total_nilai,
							tbl_transaksi_reward_bs.status_transaksi_reward,
							tbl_transaksi_reward_bs.tgl_klaim_reward,
							tbl_transaksi_reward_bs.tgl_ambil_reward,
							tbl_reward_bs.nama_reward,
							tbl_user.nama_user');

		$this->db->from('tbl_transaksi_reward_bs');
		$this->db->join('tbl_reward_bs', 'tbl_transaksi_reward_bs.id_reward_bs = tbl_reward_bs.id_reward_bs');
		$this->db->join('tbl_user', 'tbl_transaksi_reward_bs.id_user = tbl_user.id_user');
		$this->db->order_by('tbl_transaksi_reward_bs.tgl_klaim_reward', 'DESC');
		$this->db->where('tbl_transaksi_reward_bs.id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getrewardtransandro($id_user)
	{
		$this->db->select('tbl_transaksi_reward_bs.id_transaksi_reward_bs,
							tbl_transaksi_reward_bs.qty_get_reward,
							tbl_transaksi_reward_bs.total_nilai,
							tbl_transaksi_reward_bs.status_transaksi_reward,
							tbl_transaksi_reward_bs.tgl_klaim_reward,
							tbl_transaksi_reward_bs.tgl_ambil_reward,
							tbl_reward_bs.nama_reward');

		$this->db->from('tbl_transaksi_reward_bs');
		$this->db->join('tbl_reward_bs', 'tbl_transaksi_reward_bs.id_reward_bs = tbl_reward_bs.id_reward_bs');
		$this->db->order_by('tbl_transaksi_reward_bs.tgl_klaim_reward', 'DESC');
		$this->db->where('tbl_transaksi_reward_bs.id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getlaporan($id_laporan = null, $id_desa = null)
	{
		$this->db->select('tbl_laporan.id_laporan,
							tbl_laporan.id_desa,
							tbl_laporan.id_user,
							tbl_laporan.id_laporan_kategori,
							tbl_laporan.nama_laporan,
							tbl_laporan.deskripsi_laporan,
							tbl_laporan.tgl_upload_laporan,
							tbl_laporan.tgl_ditunda_laporan,
							tbl_laporan.tgl_penyelesaian_laporan,
							tbl_laporan.tgl_selesai_laporan,
							tbl_laporan.status_laporan,
							tbl_user.nama_user,
							tbl_laporan_kategori.nama_laporan_kategori');
		$this->db->from('tbl_laporan');
		$this->db->join('tbl_user', 'tbl_laporan.id_user = tbl_user.id_user');
		$this->db->join('tbl_laporan_kategori', 'tbl_laporan.id_laporan_kategori = tbl_laporan_kategori.id_laporan_kategori');
		$this->db->order_by('tbl_laporan.tgl_upload_laporan', 'DESC');

		if ($id_laporan != null) 
		{
			$this->db->where('tbl_laporan.id_laporan', $id_laporan);
			$query = $this->db->get();
			return $query->row_array();
		}
		else
		{
			$this->db->where('tbl_laporan.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function getanggaran($id_desa)
	{
		$this->db->select('tbl_anggaran.id_anggaran,
							tbl_anggaran.id_user,
							tbl_anggaran.nama_anggaran,
							tbl_anggaran.tgl_upload_anggaran,
							tbl_anggaran.link_file_anggaran,
							tbl_user.nama_user');
		$this->db->from('tbl_anggaran');
		$this->db->join('tbl_user', 'tbl_anggaran.id_user = tbl_user.id_user');
		$this->db->order_by('tbl_anggaran.tgl_upload_anggaran', 'DESC');
		$this->db->where('tbl_anggaran.id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function gettoko($id_toko = null, $id_desa = null, $id_user = null)
	{
		$this->db->select('tbl_toko.id_toko,
						tbl_toko.id_user,
						tbl_toko.nama_toko,
						tbl_toko.deskripsi_toko,
						tbl_toko.id_foto_cover,
						tbl_toko.tgl_toko_request,
						tbl_toko.tgl_toko_disetujui,
						tbl_toko.status_toko,
						tbl_user.nama_user,
						tbl_toko_foto.link_file_toko_foto');
		$this->db->from('tbl_toko');
		$this->db->join('tbl_user', 'tbl_toko.id_user = tbl_user.id_user');
		$this->db->join('tbl_toko_foto', 'tbl_toko.id_foto_cover = tbl_toko_foto.id_toko_foto');
		$this->db->order_by('tbl_toko.tgl_toko_disetujui', 'DESC');

		
		if ($id_user != null) 
		{
			$this->db->where('tbl_toko.id_user', $id_user);
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			if ($id_toko == null && $id_desa == null) 
			{
				$query = $this->db->get();
				return $query->result_array();
			}
			else
			{
				if ($id_desa != null && $id_toko == null) 
				{
					$this->db->where('tbl_toko.id_desa', $id_desa);
					$query = $this->db->get();
					return $query->result_array();
				}

				if ($id_toko != null && $id_desa == null) 
				{
					$this->db->where('tbl_toko.id_toko', $id_toko);
					$query = $this->db->get();
					return $query->row_array();
				}
			}
		}	
	}

	public function getpariwisataapi($id_desa = null, $id_pariwisata = null)
	{
		if ($id_desa != null) 
		{
			$this->db->select('tbl_pariwisata.id_pariwisata,
							tbl_pariwisata.id_desa,
							tbl_pariwisata.nama_pariwisata,
							tbl_pariwisata.deskripsi_pariwisata,
							tbl_pariwisata.alamat_pariwisata,
							tbl_pariwisata.deskripsi_harga,
							tbl_pariwisata.cover_pariwisata,
							tbl_pariwisata.status_pariwisata');
		}
		if ($id_pariwisata != null) 
		{
			$this->db->select('tbl_pariwisata.id_pariwisata,
							tbl_pariwisata.id_desa,
							tbl_pariwisata.nama_pariwisata,
							tbl_pariwisata.deskripsi_pariwisata,
							tbl_pariwisata.alamat_pariwisata,
							tbl_pariwisata.deskripsi_harga,
							tbl_pariwisata.no_telp_pengurus,
							tbl_pariwisata.cover_pariwisata,
							tbl_pariwisata.status_pariwisata');
		}
		
		$this->db->from('tbl_pariwisata');
		$this->db->order_by('tbl_pariwisata.nama_pariwisata', 'ASC');

		if ($id_desa != null) 
		{
			$this->db->where('tbl_pariwisata.id_desa', $id_desa);
			$query = $this->db->get();
			return $query->result_array();
		}
		if ($id_pariwisata != null) 
		{
			$this->db->where('tbl_pariwisata.id_pariwisata', $id_pariwisata);
			$query = $this->db->get();
			return $query->row_array();
		}
		
	}

	public function getrw($id_desa)
	{
		$this->db->select('tbl_rw.id_rw,
							tbl_rw.id_desa,
							tbl_rw.nomor_rw,
							tbl_rw.id_user,
							tbl_rw.tgl_input_rw,
							tbl_user.nama_user');
		$this->db->from('tbl_rw');
		$this->db->join('tbl_user', 'tbl_rw.id_user = tbl_user.id_user');
		$this->db->order_by('tbl_rw.nomor_rw', 'ASC');
		$this->db->where('tbl_rw.id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getrt($id_desa)
	{
		$this->db->select('tbl_rt.id_rt,
							tbl_rt.id_rw,
							tbl_rt.id_desa,
							tbl_rt.id_rw,
							tbl_rt.nomor_rt,
							tbl_rt.id_user,
							tbl_rt.tgl_input_rt,
							tbl_rw.nomor_rw,
							tbl_user.nama_user');
		$this->db->from('tbl_rt');
		$this->db->join('tbl_rw', 'tbl_rt.id_rw = tbl_rw.id_rw');
		$this->db->join('tbl_user', 'tbl_rt.id_user = tbl_user.id_user');
		$this->db->order_by('tbl_rt.nomor_rt', 'ASC');
		$this->db->where('tbl_rt.id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getproduk($id_toko)
	{
		$this->db->select('tbl_toko_produk.id_toko_produk,
							tbl_toko_produk.id_toko,
							tbl_toko_produk.nama_produk,
							tbl_toko_produk.deskripsi_produk,
							tbl_toko_produk.harga_produk,
							tbl_toko_produk.id_cover_produk_foto,
							tbl_toko_produk.tgl_upload_produk,
							tbl_toko_produk.status_produk,
							tbl_toko_produk_foto.link_file_produk_foto');
		$this->db->from('tbl_toko_produk_foto');
		$this->db->join('tbl_toko_produk', 'tbl_toko_produk.id_cover_produk_foto = tbl_toko_produk_foto.id_toko_produk_foto');
		$this->db->order_by('tbl_toko_produk.tgl_upload_produk', 'DESC');
		$this->db->where('tbl_toko_produk.id_toko', $id_toko);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getuser($id_desa)
	{
		$this->db->select('tbl_user.id_user,
							tbl_user.nama_user,
							tbl_user.email_user,
							tbl_user.alamat_user,
							tbl_user.pekerjaan_user');
		$this->db->from('tbl_user');
		$this->db->order_by('tbl_user.nama_user', 'ASC');
		$this->db->where('tbl_user.id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getuserrt($id_rt)
	{
		$this->db->select('id_user,
							nama_user,
							id_rt
							email_user,
							alamat_user,
							pekerjaan_user');
		$this->db->from('tbl_user');
		$this->db->order_by('tbl_user.nama_user', 'ASC');
		$this->db->where('tbl_user.id_rt', $id_rt);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getusersupmember($id_desa)
	{
		$this->db->select('tbl_user.id_user,
							tbl_user.nama_user,
							tbl_user.email_user,
							tbl_user.alamat_user,
							tbl_user.pekerjaan_user,
							tbl_user_level.id_level');
		$this->db->from('tbl_user');
		$this->db->join('tbl_user_level', 'tbl_user.id_user = tbl_user_level.id_user');
		$this->db->order_by('tbl_user.nama_user', 'ASC');
		$this->db->where('tbl_user.id_desa', $id_desa);
		$this->db->where('tbl_user_level.id_level', 4);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getlevel($level)
	{
		$this->db->select('*');
		$this->db->from('tbl_level');

		if (in_array_exist($level, 'super_admin')) 
		{
			$this->db->where_not_in('nama_level', array('member', 'operator'));
		}

		if (in_array_exist($level, 'operator')) 
		{
			$this->db->where_not_in('nama_level', array('admin', 'super_admin', 'operator'));
		}

		if (in_array_exist($level, 'admin')) 
		{
			$this->db->where_not_in('nama_level', array('admin', 'super_admin', 'member'));
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertdatafoto($tbl, $idname, $file_upload, $loc, $input, $userlevel = false, $id = null, $edit = null, $onlyfile = false, $width = 800, $height = 800)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			if ($edit == true) 
			{
				$getdatafoto = $this->Custom_model->getdetail($tbl, array($idname => $id));
				$ext = get_ext($_FILES[$file_upload]["name"]);
				if ($onlyfile == true) 
				{
					if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF')
					{
						unlink('./'.$getdatafoto[$file_upload]);
						$this->updatedata($tbl, $input, array($idname => $id));
					}
					else
					{
						$error = 1;
					}
				}
				else
				{
					if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG')
					{
						unlink('./'.$getdatafoto[$file_upload]);
						$this->updatedata($tbl, $input, array($idname => $id));
					}
					else
					{
						$error = 1;
					}
				}
			}
			else
			{
				$id = $this->insertdata($tbl, $input);

				if ($userlevel == TRUE) 
				{
					foreach ($userlevel as $key => $value) 
					{
						$insert = array
								(
									'id_user' => $id,
									'id_level' => $value
								);
						$this->insertdata('tbl_user_level', $insert);
					}
				}
			}

			$error = 0;
			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/'.$loc;
			if ($onlyfile == true) 
			{
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			}
			else
			{
				$config['allowed_types'] = 'jpg|jpeg|png';
			}
			

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				if ($onlyfile == true) 
				{
					$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
				}
				else
				{
					$gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	            	$config['source_image']='./files/'.$loc.'/'.$gbr['file_name'];
	            	$config['new_image']= './files/'.$loc.'/'.$gbr['file_name'];
	            	$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
	                
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= TRUE;
	                $config['width']= $width;
	                $config['height']= $height;
	                
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
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

	public function kirim_surat($id)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/surat';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';

			$this->upload->initialize($config);
			if ($this->upload->do_upload('link_file_surat')) 
			{
            	$link_file = '/files/surat/'.$config['file_name'].'.'.get_ext($_FILES['link_file_surat']["name"]);
				$this->updatedata('tbl_surat', array('link_file_surat' => $link_file, 'tgl_terima' => date('Y-m-d H:i:s'), 'status_surat' => 'terkirim'), array('id_surat' => $id));
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function editfileonly($tbl, $idname, $file_upload, $loc, $id, $file = false, $comp = false)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			$error = 0;
			$getdatafoto = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id));
			$ext = get_ext($_FILES[$file_upload]["name"]);

			if ($files == false) 
			{
				if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG') 
				{
					if (!empty($getdatafoto[$file_upload])) 
					{
						unlink('.'.$getdatafoto[$file_upload]);
					}
				}
				else
				{
					$error = 1;
				}
			}
			elseif ($files == 1) 
			{
				if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'pdf' || $ext == 'PDF') 
				{
					if (!empty($getdatafoto[$file_upload])) 
					{
						unlink('.'.$getdatafoto[$file_upload]);
					}
				}
				else
				{
					$error = 1;
				}
			}

			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/'.$loc;

			if ($files == false) 
			{
				$config['allowed_types'] = 'jpg|jpeg|png';
			}
			else
			{
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			}
			

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				if ($comp == true) 
				{
					$gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	            	$config['source_image']='./files/'.$loc.'/'.$gbr['file_name'];
	            	$config['new_image']= './files/'.$loc.'/'.$gbr['file_name'];
	            	$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
	                
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= TRUE;
	                $config['width']= 800;
	                $config['height']= 800;
	                
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
				}
				else
				{
					$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
					$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
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

	public function post_surat($input_surat, $file_syarat)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			$idsurat = $this->insertdata('tbl_surat', $input_surat);

			$error = 0;

			$insertsuratisi = array();
			foreach ($file_syarat['name'] as $kkey => $value) 
			{
				// echo $_FILES['file_syarat']['name'][$kkey];
				//UPLOAD PRODUK FOTO
				if (!empty($value)) 
				{ 
					$_FILES['file']['name']     = $_FILES['file_syarat']['name'][$kkey];
				    $_FILES['file']['type']     = $_FILES['file_syarat']['type'][$kkey];
				    $_FILES['file']['tmp_name'] = $_FILES['file_syarat']['tmp_name'][$kkey];
				    $_FILES['file']['error']     = $_FILES['file_syarat']['error'][$kkey];
				    $_FILES['file']['size']     = $_FILES['file_syarat']['size'][$kkey];
				    
				    $ext = get_ext($_FILES['file']['name']);

					//MENGEDIT CONFIG UNTUK UPLOAD FOTO
					$config['file_name'] = 'syarat-'.uniqid().".".get_ext($_FILES['file']['name']);
					$config['upload_path'] = './files/surat/syarat';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf';
					
					//MENGUPLOAD FOTO
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) 
					{
						if ($ext == 'pdf') 
						{
							$link_file = '/files/surat/syarat/'.$config['file_name'];
							$insertsuratisi[$kkey] = array
											(
												'id_surat' => $idsurat,
												'file_syarat' => $link_file
											);
						}
						else
						{
							$gbr = $this->upload->data();
							
			                $config['image_library']= 'gd2';
			            	$config['source_image']= '/files/surat/syarat/'.$config['file_name'];
			            	$config['new_image']= '/files/surat/syarat/'.$config['file_name'];
			            	$link_file = '/files/surat/syarat/'.$config['file_name'];
							$insertsuratisi[] = array
											(
												'id_surat' => $idsurat,
												'file_syarat' => $link_file
											);
			                
			                $config['create_thumb']= FALSE;
			                $config['maintain_ratio']= TRUE;
			                $config['width']= 1000;
			                $config['height']= 1000;
			                
			                $this->load->library('image_lib', $config);
			                $this->image_lib->resize();

			                $insertsuratisi[$kkey] = array
											(
												'id_surat' => $idsurat,
												'file_syarat' => $link_file
											);
						}
					}
					else
					{
						$upl = $this->upload->display_errors();
					}
				}
			}
			// var_dump($insertsuratisi);
			$this->insertdata('tbl_surat_syarat_file', $insertsuratisi, FALSE, TRUE);

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return $idsurat;
		}
	}
}