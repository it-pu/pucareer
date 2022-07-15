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
                  <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Specialization Detail</li>
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
                  <h3 class="mb-0">Specialization Detail</h3>
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

              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-2">
                    <div class="col-4">
                      Name
                    </div>
                    <div class="col-8">
                      <strong><?=$specialization['specialization_name']?></strong>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-4">
                      Created by
                    </div>
                    <div class="col-8">
                      <?=$specialization['name_admin']?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-4">
                      Created at
                    </div>
                    <div class="col-8">
                      <?=tgl_en($specialization['created_at'])?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-4">
                      Status
                    </div>
                    <div class="col-8">
                      <?php if ($specialization['specialization_status'] == 1): ?>
                        <span class="badge badge-success">Active</span>
                      <?php endif ?>
                      <?php if ($specialization['specialization_status'] == 0): ?>
                        <span class="badge badge-danger">Deactive</span>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php if ($specialization['specialization_status'] == 1): ?>
                    <a href="<?=base_url('admin/jobs/specialization_status/').$specialization['id_specialization']?>" class="btn btn-danger btn-sm" onclick="return confirm('Change Specialization Status?')"><i class="fas fa-times"></i> Deactivate</a>
                  <?php endif ?>
                  <?php if ($specialization['specialization_status'] == 0): ?>
                    <a href="<?=base_url('admin/jobs/specialization_status/').$specialization['id_specialization']?>" class="btn btn-success btn-sm" onclick="return confirm('Change Specialization Status?')"><i class="fas fa-check"></i> Activate</a>
                  <?php endif ?>
                </div>
                <div class="col-md-6">
                  <div class="card shadow">
                    <div class="card-body">
                      <h4><strong>Role</strong></h4>
                      <div class="table-responsive">
                        <table class="table align-items-center" id="table_data_lite">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col" >No</th>
                              <th scope="col" >Role</th>
                              <th scope="col">Created On</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($role as $key => $value): ?>
                              <tr>
                                <td><?=$key+1?></td>
                                <td><?=$value['role_name']?></td>
                                <td><?=$value['created_at']?></td>
                                <td>
                                  <?php if ($value['role_status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                  <?php endif ?>
                                  <?php if ($value['role_status'] == 0): ?>
                                    <span class="badge badge-danger">Deactive</span>
                                  <?php endif ?>
                                </td>
                                <td>
                                  <?php if ($value['role_status'] == 1): ?>
                                    <a href="<?=base_url('admin/jobs/role_status/').$value['id_specialization']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Deactivate</a>
                                  <?php endif ?>
                                  <?php if ($value['role_status'] == 0): ?>
                                    <a href="<?=base_url('admin/jobs/role_status/').$value['id_specialization']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</a>
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
              
            </div>
            
          </div>
        </div>
      </div>


<?php get_template_home('admin/footer') ?>