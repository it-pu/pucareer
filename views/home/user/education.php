<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Education</h3><hr>

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

                        <?php foreach ($edu as $key => $value): ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <?=$value['graduation_month']?> <?=$value['graduation_year']?>
                                </div>
                                <div class="col-md-8">
                                    <strong><?=$value['university_name']?></strong> | <?=$value['country_name']?><br>
                                    <?=$value['qualification']?> of <?=$value['field_of_study_name']?> | <?=$value['major']?>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?=base_url('user/education/edit/').$value['id_user_education']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> | <a href="<?=base_url('user/education_delete/').$value['id_user_education']?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Education?')"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach ?>

                        <a href="<?=base_url('user/education/add')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Education</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>