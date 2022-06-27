<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Experience</h3><hr>

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

                        <?php foreach ($exp as $key => $value): ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="col-md-12 mb-3">
                                        <strong><?=$value['job']?></strong> | <small><?=tgl_ina($value['start_date'])?> - 
                                            <?php if ($value['end_date'] == '0000-00-00'): ?>
                                                Present    
                                            <?php endif ?>
                                            <?php if ($value['end_date'] != '0000-00-00'): ?>
                                                <?=tgl_ina($value['end_date'])?>
                                            <?php endif ?>
                                        </small><br>
                                        <?=$value['name_company']?> | <?=$value['address']?>, <?=$value['country_name']?>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            Industri
                                        </div>
                                        <div class="col-9">
                                            <strong><?=$value['industry_name']?></strong>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-sm-3">
                                            Specialization
                                        </div>
                                        <div class="col-sm-9">
                                            <strong><?=$value['specialization_name']?></strong>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            Role
                                        </div>
                                        <div class="col-sm-9">
                                            <strong><?=$value['role_name']?></strong>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            Position
                                        </div>
                                        <div class="col-sm-9">
                                            <strong><?=$value['position_name']?></strong>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            Monthly Salary
                                        </div>
                                        <div class="col-sm-9">
                                            <strong><?=$value['currency_code']?> <?=rupiah($value['monthly_salary'])?></strong>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-2">
                                    <a href="<?=base_url('user/experience/edit/').$value['id_user_experience']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> | <a href="<?=base_url('user/experience_delete/').$value['id_user_experience']?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Experience?')"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach ?>

                        <a href="<?=base_url('user/experience/add')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Experience</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>