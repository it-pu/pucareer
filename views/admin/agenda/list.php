<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Agenda</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Agenda</a></li>
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
                  <h3 class="mb-0">Daftar Agenda</h3>
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

              <a href="<?=base_url('admin/agenda/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Tambah Agenda</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Agenda</th>
                      <th scope="col" >Status</th>
                      <th scope="col">Tgl. Upload</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($agenda as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['judul_berita']?></td>
                        <td>
                          <?php if ($value['status_berita'] == 'aktif'): ?>
                            <span class="badge badge-success"><?=strtoupper($value['status_berita'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_berita'] == 'non aktif'): ?>
                            <span class="badge badge-danger"><?=strtoupper($value['status_berita'])?></span>
                          <?php endif ?>
                        </td>
                        <td><?=$value['created_at_berita']?></td>
                        <td>
                          <a href="<?=base_url('admin/agenda/detail/').$value['id_berita']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                          <a href="<?=base_url('admin/agenda/edit/').$value['id_berita']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                          <?php if ($value['link_berita'] != ''): ?>
                            <a href="<?=$value['link_berita']?>" class="btn btn-warning btn-sm" target="_blank"><i class="fas fa-link"></i> Link</a>
                          <?php endif ?>

                          <?php if ($value['status_berita'] == 'aktif'): ?>
                            <a href="<?=base_url('admin/agenda/non_aktif/').$value['id_berita'].'/1'?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Non Aktifkan</a>
                          <?php endif ?>

                          <?php if ($value['status_berita'] == 'non aktif'): ?>
                            <a href="<?=base_url('admin/agenda/aktif/').$value['id_berita'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Aktifkan</a>
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

