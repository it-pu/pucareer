<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Application History</h3><hr>

                        <?php foreach ($app_history as $key => $value): ?>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <a href="<?=base_url('jobs/detail/').$value['id_job']?>"><img class="img-fluid rounded w-50" src="<?=base_url().$value['company_logo']?>" alt=""></a>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?=base_url('jobs/detail/').$value['id_job']?>"><font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$value['job_name']?></font></a><br>
                                    <small class="mb-5"><?=$value['company_name']?></small><br>
                                    <?php if ($value['apply_review'] == 0): ?>
                                        <i class="fas fa-check text-success"></i> Reviewed
                                    <?php endif ?>
                                    <?php if ($value['apply_review'] == 1): ?>
                                        <i class="fas fa-check text-success"></i> Your profile has been seen by Employer
                                    <?php endif ?>
                                    <?php if ($value['apply_review'] == 2): ?>
                                        <i class="fas fa-check text-success"></i> Your CV was downloaded by Employer
                                    <?php endif ?>
                                    
                                    <br>
                                    <i class="fa fa-map-marker-alt text-primary me-2 mt-3"></i><?=$value['state_name']?>, <?=$value['country_name']?>
                                    <i class="far fa-clock text-primary me-2"></i><?=$value['job_type']?><br>
                                    (Apply Date : <?=tgl_en($value['created_at'])?>)
                                </div>
                            </div>
                            <hr>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>