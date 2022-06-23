<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Toko</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Toko</a></li>
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

        <div class="col-xl-4 order-xl-2">
          <div class="card">
            <div class="card-header">
              Gallery
            </div>
            <div class="card-body">
              <img src="<?=base_url($detail['link_file_toko_foto'])?>" class="img-fluid"><hr>
              <div class="row">
                <?php foreach ($gallery as $key => $value): ?>
                  <div class="col-4 p-0">
                    <img src="<?=base_url($value['link_file_toko_foto'])?>" class="img-fluid">
                  </div>
                <?php endforeach ?>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail <b><?=$detail['nama_toko']?></b> </h3>
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
                  Nama Toko
                </div>
                <div class="col-8">
                  <?=$detail['nama_toko']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Deskripsi Toko
                </div>
                <div class="col-8">
                  <?=$detail['deskripsi_toko']?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Status Toko
                </div>
                <div class="col-8">
                  <?php if ($detail['status_toko'] == 'memohon'): ?>
                    <span class="badge badge-success"><?=strtoupper($detail['status_toko'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_toko'] == 'buka'): ?>
                    <span class="badge badge-primary"><?=strtoupper($detail['status_toko'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_toko'] == 'ditolak' || $detail['status_toko'] == 'block'): ?>
                    <span class="badge badge-danger"><?=strtoupper($detail['status_toko'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_toko'] == 'tutup'): ?>
                    <span class="badge badge-secondary"><?=strtoupper($detail['status_toko'])?></span>
                  <?php endif ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  Tgl. Pengajuan Toko
                </div>
                <div class="col-8">
                  <?=tgl_ina($detail['tgl_toko_request'])?>
                </div>
              </div>
              
                  <?php if ($detail['status_toko'] == 'buka' || $detail['status_toko'] == 'tutup'): ?>
                  <div class="row mb-3">
                    <div class="col-4">
                      Tgl. Toko Diterima
                    </div>
                    <div class="col-8">
                      <?=tgl_ina($detail['tgl_toko_disetujui'])?>
                    </div>
                  </div>
                  <?php endif ?>
                
              <hr>
              <?php if ($detail['status_toko'] == 'memohon'): ?>
                <a href="<?=base_url('admin/toko/buka/').$detail['id_toko']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
                <a href="<?=base_url('admin/toko/tolak/').$detail['id_toko']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
              <?php endif ?>
              <?php if ($detail['status_toko'] == 'ditolak' || $detail['status_toko'] == 'block'): ?>
                <a href="<?=base_url('admin/toko/buka/').$detail['id_toko']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
              <?php endif ?>
              <?php if ($detail['status_toko'] == 'buka'): ?>
                <a href="<?=base_url('admin/toko/block/').$detail['id_toko']?>" class="btn btn-danger btn-sm"><i class="fas fa-hand-paper"></i> Block</a>
              <?php endif ?>
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
              Katalog Produk
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Cover</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Tgl. Upload</th>
                      <th scope="col">Status Produk</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($produk as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><img src="<?=base_url($value['link_file_produk_foto'])?>" class="img-fluid"></td>
                        <td><?=$value['nama_produk']?></td>
                        <td><?=$value['deskripsi_produk']?></td>
                        <td><?=$value['tgl_upload_produk']?></td>
                        <td>
                          <?php if ($value['status_produk'] == 'aktif'): ?>
                            <span class="badge badge-success"><?=strtoupper($value['status_produk'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_produk'] == 'non aktif'): ?>
                            <span class="badge badge-primary"><?=strtoupper($value['status_produk'])?></span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/toko/detail/').$value['id_toko_produk']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>