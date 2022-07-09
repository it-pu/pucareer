<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/company/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Jobs Offer</h3><hr>

                        <?php if ($this->session->flashdata('error')): ?>
                          <div class="alert alert-danger" role="alert">
                            <?=$this->session->flashdata('error')?>
                          </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('success')): ?>
                          <div class="alert alert-success" role="alert">
                            <?=$this->session->flashdata('success')?>
                          </div>
                        <?php endif ?>

                        <a href="<?=base_url('jobs/create_job')?>" class="btn btn-primary mb-3">Add New Offer</a>

                        <?php foreach ($jobs as $key => $value): ?>
                           <div class="card shadow mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$value['job_name']?></font>
                                            <?php if ($value['job_active'] == 1): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php endif ?>
                                            <?php if ($value['job_active'] == 0): ?>
                                                <span class="badge bg-danger">Deactive</span>
                                            <?php endif ?>
                                            <br>
                                            <small class="mb-5"><?=$value['company_name']?></small><br>
                                            <i class="fa fa-map-marker-alt text-primary me-2 mt-3"></i><?=$value['state_name']?>, <?=$value['country_name']?>
                                            <i class="far fa-clock text-primary me-2"></i><?=$value['job_type']?><br>
                                            <i class="fas fa-calendar-alt text-primary me-2"></i>Post Date : <?=tgl_en($value['created_at'])?><br>
                                            <i class="fas fa-calendar-alt text-primary me-2"></i>Expired Date : <?=tgl_en($value['expired_at'])?>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-users text-primary"></i> Total Applicant : <?=$applicant[$key]?><br>
                                            <a href="<?=base_url('companies/jobs_offer/detail/').$value['id_job']?>" class="btn btn-primary btn-sm">See all applicant</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php endforeach ?>

                            
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>