<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Resume</h3><hr>

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

                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td style="padding-right: 30px;">File Name</td>
                                        <td><strong><?=$nama_file?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Uploaded</td>
                                        <td><strong><?=$tgl_upload_file?></strong></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <?php if ($exist == 1): ?>
                                    <a href="<?=base_url('user/resume_download/').$id_user_resume?>" target="_blank" class="btn btn-primary"><i class="fas fa-file-download"></i> Download</a>
                                <?php endif ?>
                                 <a href="<?=base_url('user/resume/resume_setting')?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>