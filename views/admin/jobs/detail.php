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
                  <h3 class="mb-0">Job Detail</h3>
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
                <div class="col-md-12">
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Name</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Company</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['company_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Created at</strong>
                    </div>
                    <div class="col-8">
                      <?=tgl_en($job['created_at'])?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Expired at</strong>
                    </div>
                    <div class="col-8">
                      <?=tgl_en($job['expired_at'])?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Status</strong>
                    </div>
                    <div class="col-8">
                      <?php if ($job['job_active'] == 1): ?>
                        <span class="badge badge-success">Active</span>
                      <?php endif ?>
                      <?php if ($job['job_active'] == 0): ?>
                        <span class="badge badge-danger">Deactive</span>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php if (date('Y-m-d') < $job['expired_at']): ?>
                    <div class="row mb-3">
                      <div class="col-3">
                      </div>
                      <div class="col-8">
                        <?php if ($job['job_active'] == 1): ?>
                          <a href="<?=base_url('admin/jobs/change_status/').$job['id_job']?>" class="btn btn-danger btn-sm" onclick="return confirm('Update Status?');"><i class="fas fa-times"></i> Deactivate</a>
                        <?php endif ?>
                        <?php if ($job['job_active'] == 0): ?>
                          <a href="<?=base_url('admin/jobs/change_status/').$job['id_job']?>" class="btn btn-success btn-sm" onclick="return confirm('Update Status?');"><i class="fas fa-check"></i> Activate</a>
                        <?php endif ?>
                      </div>
                    </div>
                  <?php endif ?>
                    
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Placement Country</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['country_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Placement State</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['state_name']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Career Level</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_career_level']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Years Experience</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_years_experience']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Qualfication</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_qualification']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Type</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_type']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Specialization</strong>
                    </div>
                    <div class="col-8">
                      <?php foreach ($specialization as $key => $value): ?>
                        <?=$value['specialization_name']?><br>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Question</strong>
                    </div>
                    <div class="col-8">
                      <?php foreach ($question as $key => $value): ?>
                        <?=$value['question_value']?><br>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card shadow">
                        <div class="card-body">
                          <h4><strong>Job Description</strong></h4><hr>
                          <?=$job['job_description']?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card shadow">
                        <div class="card-body">
                          <h4><strong>Job Requirement</strong></h4><hr>
                          <?=$job['job_requirement']?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Description</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_description']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-3">
                      <strong>Job Requirement</strong>
                    </div>
                    <div class="col-8">
                      <?=$job['job_requirement']?>
                    </div>
                  </div> -->

                </div>
              </div>

              <hr>
              <center>
                <h4><strong>Applicant Data</strong></h4>
              </center>
              
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table align-items-center" id="table_data">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" >No</th>
                          <th scope="col" >Applicant Name</th>
                          <th scope="col" >Apply Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($applicant as $key => $value): ?>
                          <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value['user_name']?></td>
                            <td><?=$value['created_at']?></td>
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