<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card shadow-lg">
                    <div class="card-body">

                    <form action="<?=base_url('jobs')?>" method="GET">
                      <h4>Jobs Listing</h4><hr>
                        <input type="hidden" name="keyword" id="id_keyword_search">
                        <input type="hidden" name="spec" id="id_spec_search">
                        <input type="hidden" name="country" id="id_country_search">
                        <input type="hidden" name="state" id="id_state_search">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="input-group mb-3">
                              <label class="input-group-text" for="sortby">Sort By</label>
                              <select class="form-select" id="sortbysearch" name="sort" onchange="this.form.submit()">
                                <option value="DESC" <?=selected_helper('DESC', $datasearch['sort'])?>>Recent</option>
                                <option value="ASC" <?=selected_helper('ASC', $datasearch['sort'])?>>Oldest</option>
                              </select>
                            </div>
                        </div>
                          <div class="col-md-4">
                              <div class="input-group mb-3">
                              <label class="input-group-text" for="sortby">Status</label>
                              <select class="form-select" id="statussearch" name="status" onchange="this.form.submit()">
                                <option selected value="all" <?=selected_helper('all', $datasearch['status'])?>>All</option>
                                <option value="applied" <?=selected_helper('applied', $datasearch['status'])?>>Applied</option>
                                <option value="not_applied" <?=selected_helper('not_applied', $datasearch['status'])?>>Not Applied</option>
                              </select>
                            </div>
                          </div>
                      </div>
                          
                    </form>

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
                        <?php get_template_home('home/jobs/recent') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>