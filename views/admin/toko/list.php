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
                  <h3 class="mb-0">Daftar Toko</h3>
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
                      <th scope="col">No</th>
                      <th scope="col">Nama Toko</th>
                      <th scope="col">Penjual</th>
                      <th scope="col">Tgl. Request</th>
                      <th scope="col">Tgl. Disetujui</th>
                      <th scope="col">Status Toko</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($toko as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_toko']?></td>
                        <td><?=$value['nama_user']?></td>
                        <td><?=$value['tgl_toko_request']?></td>
                        <td><?=$value['tgl_toko_disetujui']?></td>
                        <td>
                          <?php if ($value['status_toko'] == 'memohon'): ?>
                            <span class="badge badge-success"><?=strtoupper($value['status_toko'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_toko'] == 'buka'): ?>
                            <span class="badge badge-primary"><?=strtoupper($value['status_toko'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_toko'] == 'ditolak' || $value['status_toko'] == 'block'): ?>
                            <span class="badge badge-danger"><?=strtoupper($value['status_toko'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_toko'] == 'tutup'): ?>
                            <span class="badge badge-secondary"><?=strtoupper($value['status_toko'])?></span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/toko/detail/').$value['id_toko']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                          <?php if ($value['status_toko'] == 'memohon'): ?>
                            <a href="<?=base_url('admin/toko/buka/').$value['id_toko'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Terima</a>
                            <a href="<?=base_url('admin/toko/tolak/').$value['id_toko'].'/1'?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
                          <?php endif ?>
                          <?php if ($value['status_toko'] == 'ditolak'): ?>
                            <a href="<?=base_url('admin/toko/buka/').$value['id_toko'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Terima</a>
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