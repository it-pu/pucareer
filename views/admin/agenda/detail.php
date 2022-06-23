<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Berita</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Berita</a></li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Detail Berita
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
              
              <h3><?=$detail['judul_berita']?></h3>
              <?=tgl_ina($detail['created_at_berita'])?> |
              <?php if ($detail['status_berita'] == 'aktif'): ?>
                <span class="badge badge-success"><?=strtoupper($detail['status_berita'])?></span>
              <?php endif ?>
              <?php if ($detail['status_berita'] == 'non aktif'): ?>
                <span class="badge badge-danger"><?=strtoupper($detail['status_berita'])?></span>
              <?php endif ?>
              <hr>
              <center><img src="<?=base_url().$detail['cover_berita']?>" class="img-fluid w-50 mb-3"></center>
              <?php if (!empty($detail['link_berita'])): ?>
                <p><a href="#" target="_blank">Link Youtube</a></p>
              <?php endif ?>
              <strong>Tanggal Agenda : <?=tgl_ina($detail['tgl_agenda'])?></strong>
              <p><?=$detail['isi_berita']?></p>
              <a href="<?=base_url('admin/agenda/edit/').$detail['id_berita']?>" class="btn btn-sm btn-success mt-2"><i class="fas fa-edit"></i> Edit</a>

              <?php if ($detail['status_berita'] == 'aktif'): ?>
                <a href="<?=base_url('admin/agenda/non_aktif/').$detail['id_berita']?>" class="btn btn-sm btn-danger mt-2"><i class="fas fa-times"></i> Non Aktifkan</a>
              <?php endif ?>
              <?php if ($detail['status_berita'] == 'non aktif'): ?>
                <a href="<?=base_url('admin/agenda/aktif/').$detail['id_berita']?>" class="btn btn-sm btn-success mt-2"><i class="fas fa-check"></i> Aktifkan</a>

                <a href="<?=base_url('admin/agenda/delete/').$detail['id_berita']?>" class="btn btn-sm btn-danger mt-2"><i class="fas fa-trash"></i> Delete</a>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>