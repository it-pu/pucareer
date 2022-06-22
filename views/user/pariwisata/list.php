<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pariwisata</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pariwisata</a></li>
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
                  <h3 class="mb-0">Daftar Pariwisata</h3>
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

              <a href="<?=base_url('admin/pariwisata/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Tambah Pariwisata</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pariwisata</th>
                      <th scope="col">Tgl. Upload</th>
                      <th scope="col">Telp. Pengurus</th>
                      <th scope="col">Status Pariwisata</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pariwisata as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_pariwisata']?></td>
                        <td><?=$value['tgl_upload_pariwisata']?></td>
                        <td><?=$value['no_telp_pengurus']?></td>
                        <td>
                          <?php if ($value['status_pariwisata'] == 'buka'): ?>
                            <span class="badge badge-success"><?=strtoupper($value['status_pariwisata'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_pariwisata'] == 'tutup'): ?>
                            <span class="badge badge-danger"><?=strtoupper($value['status_pariwisata'])?></span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/pariwisata/detail/').$value['id_pariwisata']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                          <?php if ($value['status_pariwisata'] == 'buka'): ?>
                            <a href="<?=base_url('admin/pariwisata/tutup/').$value['id_pariwisata'].'/1'?>" class="btn btn-danger btn-sm"><i class="fas fa-door-closed"></i> Tutup</a>
                          <?php endif ?>
                          <?php if ($value['status_pariwisata'] == 'tutup'): ?>
                            <a href="<?=base_url('admin/pariwisata/buka/').$value['id_pariwisata'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
                          <?php endif ?>
                          
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