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
                  <h3 class="mb-0">User Detail</h3>
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
                  <label><strong>Profile Pic</strong></label>
                  <?php if ($user['user_image'] != ''): ?>
                    <img src="<?=base_url().$user['user_image']?>" class="img-fluid">
                  <?php endif ?>
                  <?php if ($user['user_image'] == ''): ?>
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="img-fluid">
                  <?php endif ?>
                  
                </div>
                <div class="col-md-9">
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Name</strong>
                    </div>
                    <div class="col-8">
                      <?=$user['user_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Status</strong>
                    </div>
                    <div class="col-8">
                      <?php if ($user['user_status'] == 'active'): ?>
                        <span class="badge badge-success mb-2">ACTIVE</span><br>
                        <a href="<?=base_url('admin/users/change_status/').$user['id_user']?>" class="btn btn-danger btn-sm" onclick="return confirm('Update User Status?')"><i class="fas fa-times"></i> Deactivate</a>
                      <?php endif ?>
                      <?php if ($user['user_status'] == 'deactive'): ?>
                        <span class="badge badge-danger mb-2">DEACTIVE</span><br>
                        <a href="<?=base_url('admin/users/change_status/').$user['id_user']?>" class="btn btn-success btn-sm" onclick="return confirm('Update User Status?')"><i class="fas fa-check"></i> Activate</a>
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Location</strong>
                    </div>
                    <div class="col-8">
                      <?=$user['state_name']?>, <?=$user['country_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Address</strong>
                    </div>
                    <div class="col-8">
                      <?=$user['user_address']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Contact</strong>
                    </div>
                    <div class="col-8">
                      <?=$user['user_phone_number']?><br><?=$user['user_email']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Type</strong>
                    </div>
                    <div class="col-8">
                      <?php if ($user['company_account'] == 0): ?>
                        <span class="badge badge-success">USER</span>
                      <?php endif ?>
                      <?php if ($user['company_account'] == 1): ?>
                        <span class="badge badge-info">COMPANY</span>
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Active Date</strong>
                    </div>
                    <div class="col-8">
                      <?=tgl_en($user['created_at'])?>
                    </div>
                  </div>
                  <div class="card shadow">
                    <div class="card-body">
                      <h4><strong>Social Media</strong></h4><hr>
                      <div class="row mb-3">
                        <div class="col-3">
                          <strong>User Website</strong>
                        </div>
                        <div class="col-8">
                          <?=$user['website_user']?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-3">
                          <strong>Linked in</strong>
                        </div>
                        <div class="col-8">
                          <?=$user['linked_in_link']?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-3">
                          <strong>Instagram</strong>
                        </div>
                        <div class="col-8">
                          <?=$user['ig_link']?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-3">
                          <strong>Facebook</strong>
                        </div>
                        <div class="col-8">
                          <?=$user['fb_link']?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-3">
                          <strong>Twitter</strong>
                        </div>
                        <div class="col-8">
                          <?=$user['twitter_link']?>
                        </div>
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