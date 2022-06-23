<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kemajuan Desa</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Kemajuan Desa</a></li>
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
              Detail Kemajuan Desa
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
              
              <h3><?=$detail['nama_kemajuan_desa']?></h3>
              <?=tgl_ina($detail['tgl_kemajuan_desa'])?> | <?=strtoupper($detail['kegiatan_kemajuan_desa'])?>
<!--               <?php if ($detail['kegiatan_kemajuan_desa'] == 'rw'): ?>
                | 
              <?php endif ?> -->
              <hr>
              <center><img src="<?=base_url().$detail['cover_kemajuan_desa']?>" class="img-fluid w-50 mb-3"></center>
              
              <p><?=$detail['deskripsi_kemajuan_desa']?></p>
              <a href="<?=base_url('admin/berita/edit/').$detail['id_kemajuan_desa']?>" class="btn btn-sm btn-success mt-2"><i class="fas fa-edit"></i> Edit</a>

            </div>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>