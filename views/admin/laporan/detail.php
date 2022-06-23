<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Laporan</a></li>
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
        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail <b><?=$detail['nama_laporan']?></b> </h3>
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
                  Nama Laporan
                </div>
                <div class="col-8">
                  <?=$detail['nama_laporan']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Deskripsi
                </div>
                <div class="col-8">
                  <?=$detail['deskripsi_laporan']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Status Laporan
                </div>
                <div class="col-8">
                  <?php if ($detail['status_laporan'] == 'diterima'): ?>
                    <span class="badge badge-warning"><?=strtoupper($detail['status_laporan'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_laporan'] == 'ditunda'): ?>
                    <span class="badge badge-danger"><?=strtoupper($detail['status_laporan'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_laporan'] == 'penyelesaian'): ?>
                    <span class="badge badge-success"><?=strtoupper($detail['status_laporan'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_laporan'] == 'selesai'): ?>
                    <span class="badge badge-primary"><?=strtoupper($detail['status_laporan'])?></span>
                  <?php endif ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Tgl. Upload
                </div>
                <div class="col-8">
                  <?=tgl_ina($detail['tgl_upload_laporan'])?>
                </div>
              </div>
              <!-- <div class="row mb-3">
                <div class="col-4">
                  Tgl. Toko Diterima
                </div>
                <div class="col-8">
                  <?=tgl_ina($detail['tgl_toko_disetujui'])?>
                </div>
              </div> -->
              <hr>
              <?php if ($detail['status_laporan'] == 'diterima'): ?>
                <a href="<?=base_url('admin/laporan/konfirmasi/').$detail['id_laporan']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Konfirmasi</a>
                 <a href="<?=base_url('admin/laporan/tunda/').$detail['id_laporan']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tunda</a>
              <?php endif ?>
              <?php if ($detail['status_laporan'] == 'ditunda'): ?>
                <a href="<?=base_url('admin/laporan/konfirmasi/').$detail['id_laporan']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Konfirmasi</a>
              <?php endif ?>
              <?php if ($detail['status_laporan'] == 'penyelesaian'): ?>
                <a href="<?=base_url('admin/laporan/selesai/').$detail['id_laporan']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Selesai</a>
              <?php endif ?>
              <?php if ($detail['status_laporan'] == 'selesai'): ?>
                <!-- <span class="badge badge-primary"><?=strtoupper($detail['status_laporan'])?></span> -->
              <?php endif ?>

              <!-- <?php if ($detail['status_toko'] == 'memohon'): ?>
                <a href="<?=base_url('admin/toko/buka/').$detail['id_toko']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
                <a href="<?=base_url('admin/toko/tolak/').$detail['id_toko']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
              <?php endif ?>
              <?php if ($detail['status_toko'] == 'ditolak' || $detail['status_toko'] == 'block'): ?>
                <a href="<?=base_url('admin/toko/buka/').$detail['id_toko']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
              <?php endif ?>
              <?php if ($detail['status_toko'] == 'buka'): ?>
                <a href="<?=base_url('admin/toko/block/').$detail['id_toko']?>" class="btn btn-danger btn-sm"><i class="fas fa-hand-paper"></i> Block</a>
              <?php endif ?> -->
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

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              Foto Laporan
            </div>
            <div class="card-body">
              <div class="row">
                <?php foreach ($gallery as $key => $value): ?>
                  <div class="col-3">
                    <img src="<?=base_url($value['link_file_laporan_foto'])?>" class="img-fluid">
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>