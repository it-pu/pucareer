<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                            <h4>OTP CAREER PORTAL</h4><hr>
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
                          <?php echo form_open(base_url('register/otp_validation')); ?>
                            <center><strong class="text-primary">OTP Code :</strong>
                            <input type="text" name="otp" class="form-control mt-2 mb-2" required>

                            <button type="submit" class="btn btn-primary btn-block mb-4">Validate</button>
                            </center>
                          </form>

                          <!-- Register buttons -->
                          <div class="text-center mt-5">
                            <p><a href="<?=base_url('login')?>">Back to Login</a></p>
                            <!-- <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                              <i class="fab fa-google"></i>
                            </button> -->
                          </div>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>