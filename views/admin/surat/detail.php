<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Surat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Surat</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">File</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success mb-2" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mb-2" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
              <div class="row mb-3">
                <div class="col-4">
                  Nama Surat
                </div>
                <div class="col-8">
                  <?=$detail['nama_surat']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Kategori Surat
                </div>
                <div class="col-8">
                  <?=$detail['nama_kategori_surat']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Tgl. Request
                </div>
                <div class="col-8">
                  <?=$detail['tgl_request']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Note
                </div>
                <div class="col-8">
                  <?=$detail['note_surat']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Status Surat
                </div>
                <div class="col-8">
                  <?php if ($detail['status_surat'] == 'requested'): ?>
                    <span class="badge badge-success"><?=strtoupper($detail['status_surat'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_surat'] == 'terproses'): ?>
                    <span class="badge badge-primary"><?=strtoupper($detail['status_surat'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_surat'] == 'selesai'): ?>
                    <span class="badge badge-info"><?=strtoupper($detail['status_surat'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_surat'] == 'ditolak'): ?>
                    <span class="badge badge-danger"><?=strtoupper($detail['status_surat'])?></span>
                  <?php endif ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Nomor Surat
                </div>
                <div class="col-8">
                  <?=strtoupper($detail['nomor_surat'])?>
                </div>
              </div>
              <hr>
              <?php if ($detail['status_surat'] == 'requested'): ?>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#terimaModal"><i class="fas fa-check" ></i> Terima</button>|&nbsp&nbsp<a href="<?=base_url('admin/surat/tolak/').$detail['id_surat'].'/1'?>" class="btn btn-danger btn-sm" onclick="return confirm('Tolak Surat?')"><i class="fas fa-times"></i> Tolak</a>
              <?php endif ?>
              <?php if ($detail['status_surat'] == 'terproses'): ?>
                <a href="<?=base_url('admin/print_data/build/').$detail['id_surat']?>" class="btn btn-warning btn-sm"><i class="fas fa-download" ></i> Download Surat</a>
                <a href="<?=base_url('admin/print_data/raw/').$detail['id_surat']?>" class="btn btn-warning btn-sm"><i class="fas fa-download" ></i> Download Surat (RAW)</a>
              <?php endif ?>
            </div>

          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail Isi</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($detail['id_surat_kategori'] == 6): ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama Bayi
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_bayi']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Jenis Kelamin
                  </div>
                  <div class="col-8">
                    <?=$ext['jk_bayi']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Anak Ke
                  </div>
                  <div class="col-8">
                    <?=$ext['anak_ke']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tgl. Lahir
                  </div>
                  <div class="col-8">
                    <?=$ext['tgl_lahir_bayi']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pukul
                  </div>
                  <div class="col-8">
                    <?=$ext['pukul']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['agama_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    No KTP Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['no_ktp_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat Ayah
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_ayah']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_ibu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir_ibu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan_ibu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['agama_ibu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    No KTP Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['no_ktp_ibu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat Ibu
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_ibu']?>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($detail['id_surat_kategori'] == 7): ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$ext['nama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tgl. Lahir
                  </div>
                  <div class="col-8">
                    <?=$ext['tgl_lahir']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Jenis Kelamin
                  </div>
                  <div class="col-8">
                    <?=$ext['jenis_kelamin']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama
                  </div>
                  <div class="col-8">
                    <?=$ext['agama']?>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Meninggal Tanggal
                  </div>
                  <div class="col-8">
                    <?=$ext['meninggal_tgl']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Jam
                  </div>
                  <div class="col-8">
                    <?=$ext['jam']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Di
                  </div>
                  <div class="col-8">
                    <?=$ext['di']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Disebabkan Karena
                  </div>
                  <div class="col-8">
                    <?=$ext['disebabkan_karena']?>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($detail['id_surat_kategori'] == 8): ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$ext['nama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Jenis Kelamin
                  </div>
                  <div class="col-8">
                    <?=$ext['jenis_kelamin']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama
                  </div>
                  <div class="col-8">
                    <?=$ext['agama']?>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-4">
                    Status Pernikahan
                  </div>
                  <div class="col-8">
                    <?=$ext['status_pernikahan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Warga Negara
                  </div>
                  <div class="col-8">
                    <?=$ext['warga_negara']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    No KTP
                  </div>
                  <div class="col-8">
                    <?=$ext['no_ktp']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama KTP Baru
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_ktp_baru']?>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($detail['id_surat_kategori'] == 19): ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$ext['nama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Jenis Kelamin
                  </div>
                  <div class="col-8">
                    <?=$ext['jenis_kelamin']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama
                  </div>
                  <div class="col-8">
                    <?=$ext['agama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Status Pernikahan
                  </div>
                  <div class="col-8">
                    <?=$ext['status_pernikahan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Warga Negara
                  </div>
                  <div class="col-8">
                    <?=$ext['warga_negara']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    No KTP
                  </div>
                  <div class="col-8">
                    <?=$ext['no_ktp']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat Sekarang
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_skrg']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat eKTP
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_ektp']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat KK
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_kk']?>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($detail['id_surat_kategori'] == 19): ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$ext['nama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    NIK
                  </div>
                  <div class="col-8">
                    <?=$ext['nik']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    ID DKTS
                  </div>
                  <div class="col-8">
                    <?=$ext['id_dtks']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama
                  </div>
                  <div class="col-8">
                    <?=$ext['agama']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    NIK Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['nik_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    ID DKTS Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['id_dkts_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Tempat Tgl. Lahir Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['tempat_tgl_lahir_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Agama Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['agama_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Pekerjaan Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['pekerjaan_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Alamat Ortu
                  </div>
                  <div class="col-8">
                    <?=$ext['alamat_ortu']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Nama Sekolah
                  </div>
                  <div class="col-8">
                    <?=$ext['nama_sekolah']?>
                  </div>
                </div>
              <?php endif ?>

              <!-- <div class="row mb-3">
                <div class="col-4">
                  Tgl. Toko Diterima
                </div>
                <div class="col-8">
                  <?=tgl_ina($detail['tgl_toko_disetujui'])?>
                </div>
              </div> -->
            </div>

          </div>
        </div>

        
        <!-- <div class="col-md-8">
          <div class="card">

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Gallery Toko</h3>
                </div>
              </div>
            </div>

              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success mb-2" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mb-2" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Gallery Toko</h3>
                </div>
              </div>
            </div>

              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success mb-2" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mb-2" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
              
            </div>
          </div>
        </div> -->
      </div>

<!-- Modal -->
<?php echo form_open_multipart(base_url('admin/surat/terima_surat/').$detail['id_surat']); ?>
<div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="terimaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terimaModalLabel">Terima Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nomor Surat</label>
          <input type="text" name="nomor_surat" class="form-control" aria-describedby="" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<?php get_template_home('admin/footer') ?>