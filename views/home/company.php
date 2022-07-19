<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
              <div class="container">
                  <h1 class="text-center mb-5">FEATURED COMPANY</h1>
                  <div class="owl-carousel company-carousel">
                      <?php foreach ($companies as $key => $value): ?>
                        <div class="company-item bg-light rounded p-4">
                            <center>
                              <img class="img-fluid rounded w-50 mb-3" src="<?=base_url().$value['company_logo']?>" alt="">
                              <h5 class="text-primary"><?=$value['company_name']?></h5>
                              <?=$value['state_name']?>, <?=$value['country_name']?>
                            </center>
                        </div>
                      <?php endforeach ?>
                  </div>
              </div>
            </div>
            <div class="row">
              
                <?php foreach ($companies as $key => $value): ?>
                  <div class="col-md-6">
                    <div class="card shadow-sm mb-3" style="border-radius: 10px;">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-3 mb-3 text-center">
                                  <img class="img-fluid img-responsive center-block rounded pt-2" src="<?=base_url().$value['company_logo']?>" alt="">
                              </div>
                              <div class="col-9 mb-2">
                                  <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$value['company_name']?></font><br>
                                  <small class="mb-5"><?=$value['state_name']?>, <?=$value['country_name']?></small><br>
                                  <i><?=$value['industry_name']?></i><br>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>

            </div>
            <center>
            <a class="btn btn-primary py-3 px-5 w-50" href="">Browse More Jobs</a>
            </center>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>