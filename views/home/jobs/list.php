<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card shadow-lg">
                    <div class="card-body">
                      <h4>Jobs Listing</h4><hr>
                      <div class="col-md-4">
                          <div class="input-group mb-3">
                          <label class="input-group-text" for="sortby">Sort By</label>
                          <select class="form-select" id="sortby">
                            <option selected>Relevance</option>
                            <option value="1">Recent</option>
                            <option value="2">Oldest</option>
                          </select>
                        </div>
                      </div>

                      <?php foreach ($jobs as $key => $value): ?>
                        <div class="card shadow-sm mb-3" style="border-radius: 10px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 mb-3 text-center">
                                        <img class="img-fluid rounded w-50" src="<?=base_url().$value['company_logo']?>" alt="">
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$value['job_name']?></font><br>
                                        <small class="mb-5"><?=$value['company_name']?></small><br>
                                        <i class="fa fa-map-marker-alt text-primary me-2 mt-3"></i><?=$value['state_name']?>, <?=$value['country_name']?><br>
                                        <i class="far fa-clock text-primary me-2"></i><?=$value['job_type']?><br>
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>Post Date : <?=$value['created_at']?>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <a href="<?=base_url('jobs/detail/').$value['id_job']?>" class="btn btn-primary"><i class="fas fa-info"></i> Detail</a>
                                        <?php if (in_array($value['id_job'], $applied_id)): ?>
                                            <small><i class="fas fa-check text-primary mt-2"></i> Applied</small>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php endforeach ?>

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