<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
                        <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <a href="<?=base_url('user')?>" style="text-decoration: none; color: #666565;"><img src="<?=$this->sess['foto_user']?>" class="img-fluid w-50 pt-3 mb-3">
                            <br>
                            Fajar Ramadhan<br></a>
                            <span class="badge bg-primary">PREMIUM</span><br>
                            <strong>IT Programmer<br>Podomoro University</strong>
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
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Profil</h3><hr>

                        <div class="row mb-2">
                            <div class="col-md-4">
                                Name
                            </div>
                            <div class="col-md-8">
                                <strong>Fajar Ramadhan</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Address
                            </div>
                            <div class="col-md-8">
                                Ini Alamat Fajar
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-8">
                                fajar.santoso@podomorouniversity.ac.id
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Phone Number
                            </div>
                            <div class="col-md-8">
                                +62 81296883431
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                About Fajar
                            </div>
                            <div class="col-md-8">
                                Hello my name is Fajar, I'm a tech savvy especially in programming and computer hardware. I'm start coding since 2016 and I'd love to follow anything related to computer hardware. I'm focused on PHP (CodeIgniter & Laravel), and MySql including backend API.
                            </div>
                        </div>
                        <hr>
                        <h5><strong><i class="fas fa-briefcase"></i> Experience</strong></h5>
                        <div class="row mb-5">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <small>September 2014 - Present</small><br>
                                        <strong>IT Programmer</strong><br>
                                        Podomoro University<br>Jawa Barat, Indonesia
                                    </div>
                                    <div class="col-md-7 mb-3" style="font-size:12px">
                                        <div class="row">
                                            <div class="col-5">
                                                Industri
                                            </div>
                                            <div class="col-7">
                                                <strong>Education</strong>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-5">
                                                Specialization
                                            </div>
                                            <div class="col-7">
                                                <strong>IT/Computer - Software</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Role
                                            </div>
                                            <div class="col-7">
                                                <strong>Software Engineer/Programmer</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Position
                                            </div>
                                            <div class="col-7">
                                                <strong>Staff</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Monthly Salary
                                            </div>
                                            <div class="col-7">
                                                <strong>IDR 100,000,000</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    

                                        
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <small>September 2014 - Present</small><br>
                                        <strong>IT Programmer</strong><br>
                                        Podomoro University<br>Jawa Barat, Indonesia
                                    </div>
                                    <div class="col-md-7 mb-3" style="font-size:12px">
                                        <div class="row">
                                            <div class="col-5">
                                                Industri
                                            </div>
                                            <div class="col-7">
                                                <strong>Education</strong>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-5">
                                                Specialization
                                            </div>
                                            <div class="col-7">
                                                <strong>IT/Computer - Software</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Role
                                            </div>
                                            <div class="col-7">
                                                <strong>Software Engineer/Programmer</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Position
                                            </div>
                                            <div class="col-7">
                                                <strong>Staff</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                                Monthly Salary
                                            </div>
                                            <div class="col-7">
                                                <strong>IDR 100,000,000</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>           
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3"><strong><i class="fas fa-list"></i> Skills</strong></h5>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <strong>PHP And MySQL</strong><br>
                                
                            </div>
                            <div class="col-md-2">
                                Intermediate
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <strong>PHP And MySQL</strong><br>
                                
                            </div>
                            <div class="col-md-2">
                                Intermediate
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <strong>PHP And MySQL</strong><br>
                            </div>
                            <div class="col-md-2">
                                Intermediate
                            </div>
                        </div>
                        <hr>
                        <a href="<?=base_url('user/profile')?>" class="btn btn-success"><i class="fas fa-cog"></i> Setting</a> <button type="button" class="btn btn-primary"><i class="fas fa-envelope"></i> Send a Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>