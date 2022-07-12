<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                  <h3 class="mb-0">Admin List</h3>
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
              <a href="<?=base_url('admin/access/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Add Admin</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama</th>
                      <th scope="col" >Email</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['name_admin']?></td>
                        <td><?=$value['email_admin']?></td>
                        <td><?=$value['created_at']?></td>
                        <td>
                          <?php if ($value['status_admin'] == 'active'): ?>
                            <span class="badge badge-success"><?=strtoupper($value['status_admin'])?></span>
                          <?php endif ?>
                          <?php if ($value['status_admin'] == 'deactive'): ?>
                            <span class="badge badge-danger"><?=strtoupper($value['status_admin'])?></span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/access/detail/').$value['id_admin']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>

                          <?php if ($value['status_admin'] == 'aktif'): ?>
                            <a href="<?=base_url('admin/access/edit_status/').$value['id_admin']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Non Aktifkan</a>
                          <?php endif ?>
                          <?php if ($value['status_admin'] == 'non aktif'): ?>
                            <a href="<?=base_url('admin/access/edit_status/').$value['id_admin']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Aktifkan</a>
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