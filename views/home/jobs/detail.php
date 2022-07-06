<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card shadow-lg">
                    <?php if ($company['company_banner'] != ''): ?>
                        <img src="<?=base_url().$company['company_banner']?>" class="card-img-top">
                    <?php endif ?>
                  
                  <div class="card-body">
                    <img class="img-fluid rounded mb-3" src="<?=base_url().$company['company_logo']?>" style="max-width: 100px;" alt=""><br>
                    <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$job['job_name']?></font><br>
                    <?=$job['state_name']?>, <?=$job['country_name']?><br>
                    <i class="fas fa-calendar-alt text-primary"></i> Post Date : <?=$job['created_at']?><hr>
                    <div class="col-md-12">
                        <h5><strong>Description</strong></h5>
                        <p><?=$job['job_description']?></p>
                    </div>
                    <div class="col-md-12">
                        <h5><strong>Requeirement</strong></h5>
                        <p><?=$job['job_requirement']?></p>
                    </div>
                    

                    

                    <h5><strong>Additional Info</strong></h5>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Career Level</strong>
                        </div>
                        <div class="col-md-8">
                            <?=$job['job_career_level']?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Years of Experience</strong>
                        </div>
                        <div class="col-md-8">
                            <?=$job['job_years_experience']?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Job Specializations</strong>
                        </div>
                        <div class="col-md-8">
                            <?php foreach ($specialization as $key => $value): ?>
                                <?=$value['specialization_name']?><br>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Qualification</strong>
                        </div>
                        <div class="col-md-8">
                            <?=$job['job_qualification']?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Job Type</strong>
                        </div>
                        <div class="col-md-8">
                            <?=$job['job_type']?>
                        </div>
                    </div>
                    <hr>
                    <?php if ($this->sess['company'] == 0): ?>
                        <?php if ($applied_stat == 0): ?>
                            <a href="<?=base_url('jobs/apply_job/').$job['id_job']?>" class="btn btn-primary"><i class="fas fa-pen-alt"></i> Apply</a>
                        <?php endif ?>
                        <?php if ($applied_stat == 1): ?>
                            <button class="btn btn-info" disabled><i class="fas fa-check"></i> Applied</button>
                        <?php endif ?>
                        
                    <?php endif ?>
                    
                  </div>
                </div>   
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Recent Post</h4><hr>
                        <div class="col-12">
                            <a href="<?=base_url('jobs/detail/123ID')?>">
                                <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'>Software Engineer</font><br>
                                <small class="mb-5">Podomoro University</small><br>
                                <i class="fas fa-map-marker-alt text-primary"></i> Jakarta, Indonesia
                                <i class="far fa-clock text-primary"></i> Full Time<br>
                                <i class="fas fa-calendar-alt text-primary"></i> Post Date : 22 Jun 2022
                            </a>
                        </div>
                        <hr>
                        <div class="col-12">
                            <a href="<?=base_url('jobs/detail/123ID')?>">
                                <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'>Software Engineer</font><br>
                                <small class="mb-5">Podomoro University</small><br>
                                <i class="fas fa-map-marker-alt text-primary"></i> Jakarta, Indonesia
                                <i class="far fa-clock text-primary"></i> Full Time<br>
                                <i class="fas fa-calendar-alt text-primary"></i> Post Date : 22 Jun 2022
                            </a>
                        </div>
                        <hr>
                        <div class="col-12">
                            <a href="<?=base_url('jobs/detail/123ID')?>">
                                <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'>Software Engineer</font><br>
                                <small class="mb-5">Podomoro University</small><br>
                                <i class="fas fa-map-marker-alt text-primary"></i> Jakarta, Indonesia
                                <i class="far fa-clock text-primary"></i> Full Time<br>
                                <i class="fas fa-calendar-alt text-primary"></i> Post Date : 22 Jun 2022
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>