<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form>
                            <h4>LOGIN CAREER PORTAL</h4><hr>
                          <!-- Email input -->
                          <div class="form-outline mb-4">
                            <input type="email" id="form2Example1" class="form-control" />
                            <label class="form-label" for="form2Example1">Email address</label>
                          </div>

                          <!-- Password input -->
                          <div class="form-outline mb-4">
                            <input type="password" id="form2Example2" class="form-control" />
                            <label class="form-label" for="form2Example2">Password</label>
                          </div>

                          <!-- 2 column grid layout for inline styling -->
                          <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                              <!-- Checkbox -->
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                              </div>
                            </div>

                            <div class="col">
                              <!-- Simple link -->
                              <a href="#!">Forgot password?</a>
                            </div>
                          </div>

                          <!-- Submit button -->
                          <center>
                          <a href="<?=base_url('user')?>" class="btn btn-primary btn-block mb-4">Sign in</a>
                          </center>

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
                        </form>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>