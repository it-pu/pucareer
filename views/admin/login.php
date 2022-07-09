<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Portal Career</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=get_foto('/public_style/front/assets/img/favicon.ico')?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/nucleo/css/nucleo.css') ;?>">
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/@fortawesome/fontawesome-free/css/all.min.css') ;?>">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/css/argon.css?v=1.2.0') ;?>">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header py-5 py-lg-6 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">ADMIN Career Portal</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign in with credentials</small>
              </div>
              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
              <?php echo form_open(base_url('admin/login'), array('role' => 'form')); ?>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" name="remember" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2022 <a href="<?=base_url()?>" class="font-weight-bold ml-1" target="_blank">Career Portal</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <!-- <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo get_template_directory('back/vendor/jquery/dist/jquery.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/js-cookie/js.cookie.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ;?>"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script src="<?php echo get_template_directory('back/js/argon.js?v=1.2.0') ;?>"></script>
</body>

</html>