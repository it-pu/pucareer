<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpWord\TemplateProcessor;

class Print_data extends ADMIN_Controller {

	public function build($id_surat)
	{
		$surat = $this->Custom_model->getdetail('tbl_surat', array('id_surat' => $id_surat));

		if ($surat['id_surat_kategori'] == 6) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_kelahiran', array('id_surat' => $id_surat)); 

			$hari = getDayIndonesia($ex['tgl_lahir_bayi']);

			$tp = new TemplateProcessor('./files/wt/surat_kelahiran.docx');
			header("Content-Disposition: attachment; filename=surat_kelahiran.docx");

			$tp->setValues([
			    'no_surat' => $surat['nomor_surat'],
			    'nama_bayi' => $ex['nama_bayi'],
			    'jk_bayi' => $ex['jk_bayi'],
			    'anak_ke' => $ex['anak_ke'],
			    'tgl_lahir_bayi' => $ex['tgl_lahir_bayi'],
			    'pukul' => $ex['pukul'],
			    'hari' => $hari,
			    'nama_ayah' => $ex['nama_ayah'],
			    'tempat_tgl_lahir_ayah' => $ex['tempat_tgl_lahir_ayah'],
			    'pekerjaan_ayah' => $ex['pekerjaan_ayah'],
			    'agama_ayah' => $ex['agama_ayah'],
			    'no_ktp_ayah' => $ex['no_ktp_ayah'],
			    'alamat_ayah' => $ex['alamat_ayah'],
			    'nama_ibu' => $ex['nama_ibu'],
			    'tempat_tgl_lahir_ibu' => $ex['tempat_tgl_lahir_ibu'],
			    'pekerjaan_ibu' => $ex['pekerjaan_ibu'],
			    'agama_ibu' => $ex['agama_ibu'],
			    'no_ktp_ibu' => $ex['no_ktp_ibu'],
			    'alamat_ibu' => $ex['alamat_ibu']
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 7) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_kematian', array('id_surat' => $id_surat)); 

			$hari = getDayIndonesia($ex['meninggal_tgl']);

			$tp = new TemplateProcessor('./files/wt/surat_kematian.docx');
			header("Content-Disposition: attachment; filename=surat_kematian.docx");

			$tp->setValues([
			    'no_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'tgl_lahir' => $ex['tgl_lahir'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'agama' => $ex['agama'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'alamat' => $ex['alamat'],
			    'meninggal_tgl' => $ex['meninggal_tgl'],
			    'jam' => $ex['jam'],
			    'di' => $ex['di'],
			    'disebabkan_karena' => $ex['disebabkan_karena'],
			    'hari_meninggal' => $hari,
			    'tgl' => date('Y-m-d'),
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 9) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_nikah_n1', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_nikah_n1.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n1.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'nik' => $ex['nik'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'warga_negara' => $ex['warga_negara'],
			    'agama' => $ex['agama'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'alamat' => $ex['alamat'],
			    'status_perkawinan' => $ex['status_perkawinan'],
			    'nama_pasangan_terdahulu' => $ex['nama_pasangan_terdahulu'],
			    'nama_pria' => $ex['nama_pria'],
			    'nik_pria' => $ex['nik_pria'],
			    'tempat_tgl_lahir_pria' => $ex['tempat_tgl_lahir_pria'],
			    'kewarnegaraan_pria' => $ex['kewarnegaraan_pria'],
			    'agama_pria' => $ex['agama_pria'],
			    'pekerjaan_pria' => $ex['pekerjaan_pria'],
			    'alamat_pria' => $ex['alamat_pria'],
			    'nama_wanita' => $ex['nama_wanita'],
			    'nik_wanita' => $ex['nik_wanita'],
			    'tempat_tgl_lahir_wanita' => $ex['tempat_tgl_lahir_wanita'],
			    'kewarnegaraan_wanita' => $ex['kewarnegaraan_wanita'],
			    'agama_wanita' => $ex['agama_wanita'],
			    'pekerjaan_wanita' => $ex['pekerjaan_wanita'],
			    'alamat_wanita' => $ex['alamat_wanita'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 20) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sktm_sekolah', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/sktm_sekolah.docx');
			header("Content-Disposition: attachment; filename=sktm_sekolah.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'nik' => $ex['nik'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'agama' => $ex['agama'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'alamat' => $ex['alamat'],
			    'nama_ortu' => $ex['nama_ortu'],
			    'nik_ortu' => $ex['nik_ortu'],
			    'tempat_tgl_lahir_ortu' => $ex['tempat_tgl_lahir_ortu'],
			    'agama_ortu' => $ex['agama_ortu'],
			    'pekerjaan_ortu' => $ex['pekerjaan_ortu'],
			    'alamat_ortu' => $ex['alamat_ortu'],
			    'nama_sekolah' => $ex['nama_sekolah'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 21) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_beda_nama_bst', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/sk_beda_nama_bst_kemensos.docx');
			header("Content-Disposition: attachment; filename=sk_beda_nama_bst_kemensos.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'agama' => $ex['agama'],
			    'status_pernikahan' => $ex['status_pernikahan'],
			    'warga_negara' => $ex['warga_negara'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'no_ktp' => $ex['no_ktp'],
			    'alamat' => $ex['alamat'],
			    'nama_bst_baru' => $ex['nama_bst_baru'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 22) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_beda_nama_pns', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/sk_beda_nama_bst_pns.docx');
			header("Content-Disposition: attachment; filename=sk_beda_nama_bst_pns.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'agama' => $ex['agama'],
			    'status_pernikahan' => $ex['status_pernikahan'],
			    'warga_negara' => $ex['warga_negara'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'no_ktp' => $ex['no_ktp'],
			    'alamat' => $ex['alamat'],
			    'nama_bst_baru' => $ex['nama_pns_baru'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 25) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_nikah_n2', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_nikah_n2.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n2.docx");

			$tp->setValues([
			    'calon_suami' => $ex['calon_suami'],
			    'calon_istri' => $ex['calon_istri'],
			    'hari_tanggal_jam' => $ex['hari_tanggal_jam'],
			    'tempat_akad_nikah' => $ex['tempat_akad_nikah'],
			    'diterima_tgl' => $ex['diterima_tgl'],
			    'nama_pemohon' => $ex['nama_pemohon'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 26) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_nikah_n4', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_nikah_n4.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n4.docx");

			$tp->setValues([
			    'nama_istri' => $ex['nama_istri'],
			    'binti_istri' => $ex['binti_istri'],
			    'nik_istri' => $ex['nik_istri'],
			    'tempat_tgl_lahir_istri' => $ex['tempat_tgl_lahir_istri'],
			    'kewarnegaraan_istri' => $ex['kewarnegaraan_istri'],
			    'agama_istri' => $ex['agama_istri'],
			    'pekerjaan_istri' => $ex['pekerjaan_istri'],
			    'alamat_istri' => $ex['alamat_istri'],
			    'nama_suami' => $ex['nama_suami'],
			    'bin_suami' => $ex['bin_suami'],
			    'nik_suami' => $ex['nik_suami'],
			    'tempat_tgl_lahir_suami' => $ex['tempat_tgl_lahir_suami'],
			    'kewarnegaraan_suami' => $ex['kewarnegaraan_suami'],
			    'agama_suami' => $ex['agama_suami'],
			    'pekerjaan_suami' => $ex['pekerjaan_suami'],
			    'alamat_suami' => $ex['alamat_suami'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 27) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_belum_menikah_keperluan_menikah', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/belum_menikah_keperluan_menikah.docx');
			header("Content-Disposition: attachment; filename=belum_menikah_keperluan_menikah.docx");

			$tp->setValues([
			    'nomor_surat' => $ex['nomor_surat'],
			    'nama' => $ex['nama'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'no_ktp' => $ex['no_ktp'],
			    'agama' => $ex['agama'],
			    'alamat' => $ex['alamat'],
			    'wali_bertanggung_jawab' => $ex['wali_bertanggung_jawab'],
			    'saksi_rt' => $ex['saksi_rt'],
			    'saksi_rw' => $ex['saksi_rw'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 28) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_belum_menikah_keperluan_bukan_menikah', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/belum_menikah_keperluan_bukan_menikah.docx');
			header("Content-Disposition: attachment; filename=belum_menikah_keperluan_bukan_menikah.docx");

			$tp->setValues([
			    'nomor_surat' => $ex['nomor_surat'],
			    'nama' => $ex['nama'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'no_ktp' => $ex['no_ktp'],
			    'agama' => $ex['agama'],
			    'alamat' => $ex['alamat'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 34) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_penghasilan', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_penghasilan.docx');
			header("Content-Disposition: attachment; filename=suket_penghasilan.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nik_bersangkutan' => $ex['nik_bersangkutan'],
			    'nama_bersangkutan' => $ex['nama_bersangkutan'],
			    'tempat_tgl_lahir_bersangkutan' => $ex['tempat_tgl_lahir_bersangkutan'],
			    'agama_bersangkutan' => $ex['agama_bersangkutan'],
			    'jenis_kelamin_bersangkutan' => $ex['jenis_kelamin_bersangkutan'],
			    'hubungan_keluarga_bersangkutan' => $ex['hubungan_keluarga_bersangkutan'],
			    'status_perkawinan' => $ex['status_perkawinan'],
			    'pekerjaan_bersangkutan' => $ex['pekerjaan_bersangkutan'],
			    'alamat_bersangkutan' => $ex['alamat_bersangkutan'],
			    'nomor_pokok_mahasiswa_bersangkutan' => $ex['nomor_pokok_mahasiswa_bersangkutan'],
			    'nik' => $ex['nik'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'agama' => $ex['agama'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'hubungan_keluarga' => $ex['hubungan_keluarga'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'alamat' => $ex['alamat'],
			    'penghasilan_sebesar' => $ex['penghasilan_sebesar'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 35) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_tidak_bekerja', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_tidak_bekerja.docx');
			header("Content-Disposition: attachment; filename=suket_tidak_bekerja.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'jk' => $ex['jenis_kelamin'],
			    'no_ktp' => $ex['no_ktp'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'alamat' => $ex['alamat'],
			    'sejak' => $ex['tidak_bekerja_sejak'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 36) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_usaha', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_usaha.docx');
			header("Content-Disposition: attachment; filename=suket_usaha.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'jk' => $ex['jenis_kelamin'],
			    'nik' => $ex['nik'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'jenis_usaha' => $ex['jenis_usaha'],
			    'alamat' => $ex['alamat'],
			    'alamat_usaha' => $ex['alamat_usaha'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 37) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_wali_nikah', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_wali_nikah.docx');
			header("Content-Disposition: attachment; filename=suket_wali_nikah.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'agama' => $ex['agama'],
			    'bin_binti' => $ex['bin_binti'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'alamat' => $ex['alamat'],
			    'kewarnegaraan' => $ex['kewarnegaraan'],
			    'nama_bersangkutan' => $ex['nama_bersangkutan'],
			    'bin_binti_bersangkutan' => $ex['bin_binti_bersangkutan'],
			    'tempat_tgl_lahir_bersangkutan' => $ex['tempat_tgl_lahir_bersangkutan'],
			    'warga_negara_bersangkutan' => $ex['warga_negara_bersangkutan'],
			    'agama_bersangkutan' => $ex['agama_bersangkutan'],
			    'pekerjaan_bersangkutan' => $ex['pekerjaan_bersangkutan'],
			    'alamat_bersangkutan' => $ex['alamat_bersangkutan'],
			    'hubungan' => $ex['hubungan'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 38) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_yatim_piatu', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_yatim.docx');
			header("Content-Disposition: attachment; filename=suket_yatim.docx");

			$tp->setValues([
			    'nomor' => $surat['nomor_surat'],
			    'nama' => $ex['nama_bayi'],
			    'no_ktp' => $ex['no_ktp'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'alamat' => $ex['alamat'],
			    'anak_kandung_dari' => $ex['anak_kandung_dari'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 39) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sk_numpang_nikah', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/suket_numpang_nikah.docx');
			header("Content-Disposition: attachment; filename=suket_numpang_nikah.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'no_ktp' => $ex['no_ktp'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'alamat' => $ex['alamat'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'kewarnegaraan' => $ex['kewarnegaraan'],
			    'status_perkawinan' => $ex['status_perkawinan'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'kampung_dusun' => $ex['kampung_dusun'],
			    'desa_kelurahan' => $ex['desa_kelurahan'],
			    'kecamatan' => $ex['kecamatan'],
			    'kabupaten' => $ex['kabupaten'],
			    'provinsi' => $ex['provinsi'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 45) 
		{
			$ex = $this->Custom_model->getdetail('tbl_z_sktm_rs', array('id_surat' => $id_surat)); 

			$tp = new TemplateProcessor('./files/wt/sktm_rs.docx');
			header("Content-Disposition: attachment; filename=sktm_rs.docx");

			$tp->setValues([
			    'nomor_surat' => $surat['nomor_surat'],
			    'nama' => $ex['nama'],
			    'jenis_kelamin' => $ex['jenis_kelamin'],
			    'tempat_tgl_lahir' => $ex['tempat_tgl_lahir'],
			    'pekerjaan' => $ex['pekerjaan'],
			    'agama' => $ex['agama'],
			    'nik' => $ex['nik'],
			    'alamat' => $ex['alamat'],
			    'tgl' => date('Y-m-d')
			]);

			$tp->saveAs('php://output');
		}
	}

	public function raw($id_surat)
	{
		if ($surat['id_surat_kategori'] == 6) 
		{
			$tp = new TemplateProcessor('./files/wt/surat_kelahiran-raw.docx');
			header("Content-Disposition: attachment; filename=surat_kelahiran.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 7) 
		{
			$tp = new TemplateProcessor('./files/wt/surat_kematian-raw.docx');
			header("Content-Disposition: attachment; filename=surat_kematian.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 9) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_nikah_n1-raw.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n1.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 20) 
		{
			$tp = new TemplateProcessor('./files/wt/sktm_sekolah-raw.docx');
			header("Content-Disposition: attachment; filename=sktm_sekolah.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 21) 
		{
			$tp = new TemplateProcessor('./files/wt/sk_beda_nama_bst_kemensos-raw.docx');
			header("Content-Disposition: attachment; filename=sk_beda_nama_bst_kemensos.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 22) 
		{
			$tp = new TemplateProcessor('./files/wt/sk_beda_nama_bst_pns-raw.docx');
			header("Content-Disposition: attachment; filename=sk_beda_nama_bst_pns.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 25) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_nikah_n2-raw.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n2.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 26) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_nikah_n4-raw.docx');
			header("Content-Disposition: attachment; filename=suket_nikah_n4.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 27) 
		{
			$tp = new TemplateProcessor('./files/wt/belum_menikah_keperluan_menikah-raw.docx');
			header("Content-Disposition: attachment; filename=belum_menikah_keperluan_menikah.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 28) 
		{
			$tp = new TemplateProcessor('./files/wt/belum_menikah_keperluan_bukan_menikah-raw.docx');
			header("Content-Disposition: attachment; filename=belum_menikah_keperluan_bukan_menikah.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 34) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_penghasilan-raw.docx');
			header("Content-Disposition: attachment; filename=suket_penghasilan.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 35) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_tidak_bekerja-raw.docx');
			header("Content-Disposition: attachment; filename=suket_tidak_bekerja.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 36) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_usaha-raw.docx');
			header("Content-Disposition: attachment; filename=suket_usaha.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 37) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_wali_nikah-raw.docx');
			header("Content-Disposition: attachment; filename=suket_wali_nikah.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 38) 
		{
			$tp = new TemplateProcessor('./files/wt/yatim-raw.docx');
			header("Content-Disposition: attachment; filename=yatim.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 39) 
		{
			$tp = new TemplateProcessor('./files/wt/suket_numpang_nikah-raw.docx');
			header("Content-Disposition: attachment; filename=suket_numpang_nikah.docx");

			$tp->saveAs('php://output');
		}
		if ($surat['id_surat_kategori'] == 45) 
		{
			$tp = new TemplateProcessor('./files/wt/sktm_rs-raw.docx');
			header("Content-Disposition: attachment; filename=sktm_rs.docx");

			$tp->saveAs('php://output');
		}
	}
}
