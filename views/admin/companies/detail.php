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
                  <li class="breadcrumb-item"><a href="#">Companies</a></li>
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
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Company Detail</h3>
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
                <div class="col-md-3">
                  <label><strong>Logo</strong></label>
                  <img src="<?=base_url().$company['company_logo']?>" class="img-fluid"><hr>
                  <label><strong>Banner</strong></label>
                  <img src="<?=base_url().$company['company_banner']?>" class="img-fluid">
                </div>
                <div class="col-md-9">
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Name</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['company_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Location</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['state_name']?>, <?=$company['country_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Address</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['company_address']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Industry</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['industry_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Contact</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['company_phone_number']?><br>
                      <?=$company['company_email']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Website</strong>
                    </div>
                    <div class="col-8">
                      <?=$company['company_website']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Created at</strong>
                    </div>
                    <div class="col-8">
                      <?=tgl_en($company['created_at'])?>
                    </div>
                  </div>
                </div>
              </div>

              <hr>
              <center>
                <h4><strong>Jobs Offer Data</strong></h4>
              </center>
              
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table align-items-center" id="table_data">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" >No</th>
                          <th scope="col" >Job</th>
                          <th scope="col" >Created at</th>
                          <th scope="col" >Expired at</th>
                          <th scope="col" >Status</th>
                          <th scope="col" >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($jobs as $key => $value): ?>
                          <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value['job_name']?></td>
                            <td><?=$value['created_at']?></td>
                            <td><?=$value['expired_at']?></td>
                            <td>
                              <?php if ($value['job_active'] == 1): ?>
                                <span class="badge badge-success">Active</span>
                              <?php endif ?>
                              <?php if ($value['job_active'] == 0): ?>
                                <span class="badge badge-danger">Deactive</span>
                              <?php endif ?>
                            </td>
                            <td><a href="<?=base_url('admin/jobs/detail/').$value['id_job']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a></td>
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


<?php get_template_home('admin/footer') ?>