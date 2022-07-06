<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
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
                <div class="card shadow-lg">
                    <?php if ($company['company_banner'] != ''): ?>
                        <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/podomoro-university.jpg" class="card-img-top">
                    <?php endif ?>
                    <div class="card-body">
                        <img class="img-fluid rounded mb-3" src="<?=base_url().$company['company_logo']?>" style="max-width: 100px;" alt=""><br>
                        <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$company['company_name']?></font><br>
                        <?=$company['country_name']?> | <?=$company['state_name']?><br>
                        <i><?=$company['industry_name']?></i><hr>
                        <h4><strong>Description</strong></h4>
                        <?=$company['company_description']?><br><br>

                        <h5><strong>Gallery</strong></h5>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/podomoro-university.jpg" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/podomoro-university.jpg" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/podomoro-university.jpg" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/podomoro-university.jpg" class="img-fluid">
                            </div>
                        </div>
                        <hr>
                        <h4><strong>Jobs Offer</strong></h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5><strong>Senior Engineer</strong></h5>
                                        Jakarta | Indonesia<br>
                                        <small>3 Days Ago</small><br>
                                        <a href="#">Detail >>></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5><strong>Senior Engineer</strong></h5>
                                        Jakarta | Indonesia<br>
                                        <small>3 Days Ago</small><br>
                                        <a href="#">Detail >>></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5><strong>Senior Engineer</strong></h5>
                                        Jakarta | Indonesia<br>
                                        <small>3 Days Ago</small><br>
                                        <a href="#">Detail >>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="<?=base_url('companies/setting')?>" class="btn btn-success"><i class="fas fa-edit"></i> Setting Profile</a> <a href="<?=base_url('jobs/create_job')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Jobs Offer</a>
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