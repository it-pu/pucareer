<?php get_template_home('home/header') ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <?php if ($this->sess['user_image'] != ''): ?>
                                <a href="<?=base_url('user')?>" style="text-decoration: none; color: #666565;"><img src="<?=base_url().$this->sess['user_image']?>" class="img-fluid w-50 pt-3 mb-3">
                            <?php endif; ?>
                            <br>
                            <?=strtoupper($this->sess['user_name'])?><br></a>
                            <strong><?=$applicant['country_name']?> | <?=$applicant['state_name']?></strong>
                        </center>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-2">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="col-10">
                                <?=$applicant['user_email']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="col-10">
                                <?=$applicant['user_phone_number']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="col-10">
                                <a href="<?=base_url().$resume['resume_file']?>"><strong><?=$resume['resume_name']?></strong></a><br>
                                <small>Updated : <?=time_elapsed_string($resume['updated_at'])?></small>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>      
            <div class="col-md-8">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 mb-3 text-center">
                                <img class="img-fluid rounded w-50" src="<?=base_url().$job['company_logo']?>" alt="">
                            </div>
                            <div class="col-md-9 mb-2">
                                <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$job['job_name']?></font><br>
                                <small class="mb-5"><?=$job['company_name']?></small><br>
                                <i class="fa fa-map-marker-alt text-primary me-2 mt-3"></i><?=$job['state_name']?>, <?=$job['country_name']?><br>
                                <i class="far fa-clock text-primary me-2"></i><?=$job['job_type']?> | 
                                <i class="fas fa-calendar-alt text-primary me-2"></i>Post Date : <?=tgl_ina($job['created_at'])?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h4>Applicant Form</h4><hr>

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

                        <?php echo form_open(base_url('jobs/apply_job_post')); ?>
                            <input type="hidden" name="id_job" value="<?=$job['id_job']?>">
                            <?php if (!empty($question)): ?>

                                Answer the employer question for better review<br>
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <?php foreach ($question as $key => $value): ?>
                                            <input type="hidden" name="id_job_question[]" value="<?=$value['id_job_question']?>">
                                            <div class="mb-3">
                                                <label class="form-label"><?=$value['question_value']?></label>
                                                <input type="text" class="form-control w-100" name="question_answer[]">
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <hr>
                            <?php endif ?>

                            Introduce yourself or even tell about what you can do
                            <div class="mb-3 mt-2">
                                <textarea id="summ-text" name="applicant_form"></textarea>
                            </div>
                            <button class="btn btn-primary w-100" onclick="return confirm('Apply?')">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>