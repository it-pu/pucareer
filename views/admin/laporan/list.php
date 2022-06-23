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
                  <li class="breadcrumb-item active" aria-current="page">List</li>
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
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Daftar Laporan</h3>
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
              <!-- <a href="<?=base_url('admin/desa/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Tambah Desa</a> -->

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama Laporan</th>
                      <th scope="col" >Kategori</th>
                      <th scope="col" >Deskripsi</th>
                      <th scope="col" >Tgl. Upload</th>
                      <th scope="col">Status Laporan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($laporan as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_laporan']?></td>
                        <td><?=$value['nama_laporan_kategori']?></td>
                        <td><?=$value['deskripsi_laporan']?></td>
                        <td><?=$value['tgl_upload_laporan']?></td>
                        <td>
                            <?php if ($value['status_laporan'] == 'diterima'): ?>
                              <span class="badge badge-warning"><?=strtoupper($value['status_laporan'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_laporan'] == 'ditunda'): ?>
                              <span class="badge badge-danger"><?=strtoupper($value['status_laporan'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_laporan'] == 'penyelesaian'): ?>
                              <span class="badge badge-success"><?=strtoupper($value['status_laporan'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_laporan'] == 'selesai'): ?>
                              <span class="badge badge-primary"><?=strtoupper($value['status_laporan'])?></span>
                            <?php endif ?>
                          </td>
                        <td>
                          <a href="<?=base_url('admin/laporan/detail/').$value['id_laporan']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
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