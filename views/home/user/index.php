<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <?php if ($user['user_image'] != ''): ?>
                                <a href="<?=base_url('user')?>" style="text-decoration: none; color: #666565;"><img src="<?=base_url().$user['user_image']?>" class="img-fluid w-50 pt-3 mb-3">
                            <?php endif; ?>
                            <br>
                            <strong><?=strtoupper($user['user_name'])?></strong><br></a>
                            <span class="badge bg-primary">PREMIUM</span><!-- <br>
                            <strong>IT Programmer<br>Podomoro University</strong> -->
                        </center>
                        <hr>
                        <?php if ($user['website_user'] != ''): ?>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="col-10">
                                    <a href="<?=$user['website_user']?>" target="_blank"><?=$user['website_user']?></a>
                                </div>
                            </div>
                        <?php endif ?>

                        <?php if ($user['linked_in_link'] != ''): ?>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                                <div class="col-10">
                                    <a href="<?=$user['linked_in_link']?>" target="_blank">Linked In</a>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($user['ig_link'] != ''): ?>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="col-10">
                                    <?php if ($user['ig_username'] != ''): ?>
                                        <a href="<?=$user['ig_link']?>" target="_blank"><?=$user['ig_username']?></a>
                                    <?php endif ?>
                                    <?php if ($user['ig_username'] == ''): ?>
                                        <a href="<?=$user['ig_link']?>" target="_blank">Instagram</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                            
                        <?php if ($user['fb_link'] != ''): ?>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <i class="fab fa-facebook"></i>
                                </div>
                                <div class="col-10">
                                    <?php if ($user['fb_username'] != ''): ?>
                                        <a href="<?=$user['fb_link']?>" target="_blank"><?=$user['fb_username']?></a>
                                    <?php endif ?>
                                    <?php if ($user['fb_username'] == ''): ?>
                                        <a href="<?=$user['fb_link']?>" target="_blank">Facebook</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>

                        <?php if ($user['twitter_link'] != ''): ?>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="col-10">
                                    <?php if ($user['twitter_username'] != ''): ?>
                                        <a href="<?=$user['twitter_link']?>" target="_blank"><?=$user['twitter_username']?></a>
                                    <?php endif ?>
                                    <?php if ($user['twitter_username'] == ''): ?>
                                        <a href="<?=$user['twitter_link']?>" target="_blank">Twitter</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <hr>
                        <center>
                            <a href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                        </center>
                    </div>
                </div>
            </div>      
            <div class="col-md-8">
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
                    <div class="card-body">
                        <h3>Profil</h3><hr>

                        <div class="row mb-2">
                            <div class="col-md-4">
                                Name
                            </div>
                            <div class="col-md-8">
                                <strong><?=strtoupper($user['user_name'])?>n</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Address
                            </div>
                            <div class="col-md-8">
                                <?=$user['user_address']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Birth Date
                            </div>
                            <div class="col-md-8">
                                <?=$user['birth_date']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-8">
                                <?=$user['user_email']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Phone Number
                            </div>
                            <div class="col-md-8">
                                <?=$user['user_phone_number']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                About Fajar
                            </div>
                            <div class="col-md-8">
                                <?=$user['about_user']?>
                            </div>
                        </div>
                        <hr>
                        <h5><strong><i class="fas fa-briefcase"></i> Experience</strong></h5>
                        <?php foreach ($experience as $key => $value): ?>
                            <div class="row mb-5">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <small><?=tgl_en($value['start_date'])?> - 
                                                <?php if ($value['end_date'] == '0000-00-00'): ?>
                                                    Present
                                                <?php endif ?>
                                                <?php if ($value['end_date'] != '0000-00-00'): ?>
                                                    <?=tgl_en($value['end_date'])?>
                                                <?php endif ?>
                                            </small><br>
                                            <strong><?=$value['job']?></strong><br>
                                            <?=$value['name_company']?><br><?=$value['state_name']?>, <?=$value['country']?>
                                        </div>
                                        <div class="col-md-7 mb-3" style="font-size:12px">
                                            <div class="row">
                                                <div class="col-5">
                                                    Industri
                                                </div>
                                                <div class="col-7">
                                                    <strong><?=$value['industry_name']?></strong>
                                                </div>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-5">
                                                    Specialization
                                                </div>
                                                <div class="col-7">
                                                    <strong><?=$value['specialization_name']?></strong>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    Role
                                                </div>
                                                <div class="col-7">
                                                    <strong><?=$value['role_name']?></strong>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    Position
                                                </div>
                                                <div class="col-7">
                                                    <strong><?=$value['position_name']?></strong>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    Monthly Salary
                                                </div>
                                                <div class="col-7">
                                                    <strong><?=$value['currency_code']?> <?=rupiah($value['monthly_salary'])?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <hr>
                        <h5><strong><i class="fas fa-university"></i> Educations</strong></h5>
                        <?php foreach ($education as $key => $value): ?>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <?=$value['graduation_month']?> <?=$value['graduation_year']?>
                                </div>
                                <div class="col-md-8">
                                    <strong><?=$value['university_name']?></strong> | <?=$value['country_name']?><br>
                                    <?=$value['qualification']?> of <?=$value['field_of_study_name']?> | <?=$value['major']?>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <hr>
                        <h5 class="mb-3"><strong><i class="fas fa-list"></i> Skills</strong></h5>
                        <?php foreach ($skill as $key => $value): ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong><?=$value['skill_name']?></strong>
                                </div>
                                <div class="col-md-4">
                                    <?=$value['skill_level']?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <hr>
                        <a href="<?=base_url('user/profile')?>" class="btn btn-success"><i class="fas fa-cog"></i> Setting</a> <button type="button" class="btn btn-primary"><i class="fas fa-envelope"></i> Send a Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>