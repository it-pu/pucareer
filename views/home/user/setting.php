<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Account Setting</h3><hr>

                        <div class="row">
                            <div class="col-md-4">
                                Password
                            </div>
                            <div class="col-md-4">
                                <a href="<?=base_url('user/setting/setting_password')?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                Profile Privacy
                            </div>
                            <div class="col-md-8">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="privasi" id="dicari">
                                  <label class="form-check-label" for="dicari">
                                    <strong>Public</strong> (Everyone can see your profile)
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="privasi" id="tidak_dicari" checked>
                                  <label class="form-check-label" for="tidak_dicari">
                                    <strong>Hidden</strong> (People cannot see your profile except Companies that you apply)
                                  </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                Change Email
                            </div>
                            <div class="col-md-4">
                                <a href="<?=base_url('user/setting/setting_email')?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>