<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                            <h4>LOGIN CAREER PORTAL</h4><hr>
                            <?php if ($this->session->flashdata('error')): ?>
                              <div class="alert alert-danger" role="alert">
                                <?=$this->session->flashdata('error')?>
                              </div>
                            <?php endif ?>
                          <?php echo form_open(base_url('login/validate')); ?>
                            <div class="form-outline mb-4">
                              <input type="email" name="email" class="form-control" required/>
                              <label class="form-label">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                              <input type="password" name="password" class="form-control" required/>
                              <label class="form-label" >Password</label>
                            </div>

                            <div class="row mb-4">
                              <div class="col d-flex justify-content-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>
                              </div>

                              <div class="col">
                                <a href="#!">Forgot password?</a>
                              </div>
                            </div>

                            <!-- Submit button -->
                            <center>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            </center>
                          </form>

                          <!-- Register buttons -->
                          <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                              <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                              <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                              <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                              <i class="fab fa-github"></i>
                            </button>
                          </div>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>