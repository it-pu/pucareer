<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Setting Password</h3><hr>

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
                        <?php echo form_open(base_url('user/password_update')); ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Old Password*
                                </div>
                                <div class="col-md-4">
                                    <input type="password" name="old_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    New Password*
                                </div>
                                <div class="col-md-4">
                                    <input type="password" name="new_password" placeholder="(Min. 6 Character)" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Confirm Password*
                                </div>
                                <div class="col-md-4">
                                    <input type="password" name="confirm_password" class="form-control" min="6"  required> 
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Update Password?')"><i class="fas fa-edit"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>