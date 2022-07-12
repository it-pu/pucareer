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
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
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
                  <h3 class="mb-0">Users List</h3>
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
              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >User Name</th>
                      <th scope="col" >Account Type</th>
                      <th scope="col" >Location</th>
                      <th scope="col" >Address</th>
                      <th scope="col" >Contact</th>
                      <th scope="col">Join Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $key => $value): ?>
                      <?php if ($value['company_account'] != 0 && $value['id_company'] != 0): ?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td><?=$value['user_name']?></td>
                          <td>
                            <span class="badge badge-info">COMPANY</span>
                          </td>
                          <td><?=$value['state_name']?>, <?=$value['country_name']?></td>
                          <td><?=$value['user_address']?></td>
                          <td><?=$value['user_phone_number']?><br><?=$value['user_email']?></td>
                          <td><?=$value['created_at']?></td>
                          <td>
                            <a href="<?=base_url('admin/companies/detail/').$value['id_company']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                          </td>
                        </tr>
                      <?php endif ?>
                      <?php if ($value['company_account'] == 0): ?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td><?=$value['user_name']?></td>
                          <td>
                            <span class="badge badge-success">USER</span>
                          </td>
                          <td><?=$value['state_name']?>, <?=$value['country_name']?></td>
                          <td><?=$value['user_address']?></td>
                          <td><?=$value['user_phone_number']?><br><?=$value['user_email']?></td>
                          <td><?=$value['created_at']?></td>
                          <td>
                            <a href="<?=base_url('admin/users/detail/').$value['id_user']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>
                          </td>
                        </tr>
                      <?php endif ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<?php get_template_home('admin/footer') ?>