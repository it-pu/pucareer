<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                            <h4>REGISTER CAREER PORTAL</h4><hr>
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
                          <?php echo form_open(base_url('register/validate')); ?>
                            <div class="mb-3">
                              <label class="form-label">Full Name</label>
                              <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                              <label for="name_registrar" class="form-label">Country</label>
                              <select class="form-select" name="id_country" required>
                                <option value="">-- CHOOSE COUNTRY --</option>
                                <?php foreach ($country as $key => $value): ?>
                                    <option value="<?=$value['id_country']?>" <?=selected_helper('ID', $value['iso'])?>><?=$value['country_name']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="name_registrar" class="form-label">Register As</label>
                              <select class="form-select" name="register_as" required>
                                <option value="">-- CHOOSE ACCOUNT TYPE --</option>
                                <option value="user">User</option>
                                <option value="company">Company</option>
                              </select>
                              <div id="emailHelp" class="form-text">
                                Choose <strong class="text-primary">User</strong> for searching Jobs<br>
                                Choose <strong class="text-primary">Company</strong> for post Jobs
                              </div>
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Password</label>
                              <input type="password" class="form-control" min="6" name="password" required>
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" min="6" name="confirm_password" required>
                            </div>

                            <!-- Submit button -->
                            <center>
                            <button type="submit" class="btn btn-primary btn-block mb-4" onclick="return confirm('Regist Data?')">Register</button>
                            </center>
                          </form>

                          <!-- Register buttons -->
                          <div class="text-center">
                            <p>We Will Send you <strong class="text-primary">OTP Code</strong> after you click Register</p>
                            <p>Already have OTP Code? <a href="<?=base_url('otp')?>">Click here to input <strong class="text-primary">OTP Code</strong></a></p>
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