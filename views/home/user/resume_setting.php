<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Setting Resume</h3><hr>

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

                        <?php echo form_open_multipart(base_url('user/resume_update')); ?>
                        <div class="row mb-3">
                            <div class="col-md-4">
                               File Name
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="resume_name" class="form-control" placeholder="Resume Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                Upload new file :
                            </div>
                            <div class="col-md-4">
                                <?php if ($exist == 1): ?>
                                    <input type="file" class="custom-file-input" name="resume_file" id="input-resume" onchange="fileValidationPdf(this.id); validateSize(this, 'input-resume')">
                                <?php endif ?>
                                <?php if ($exist == 0): ?>
                                    <input type="file" class="custom-file-input" name="resume_file" id="input-resume" onchange="fileValidationPdf(this.id); validateSize(this, 'input-resume')" required>
                                <?php endif ?>
                                
                                <div id="emailHelp" class="form-text">File format (.pdf | .jpg | .png | .jpeg) max 8MB</div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Update Resume?')"><i class="fas fa-edit"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>