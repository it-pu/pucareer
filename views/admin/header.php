
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin - Career Portal</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=get_foto('/public_style/front/assets/img/favicon.ico')?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/nucleo/css/nucleo.css') ;?>">
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/@fortawesome/fontawesome-free/css/all.min.css') ;?>">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.6/sp-1.2.2/sl-1.3.1/datatables.min.css"/>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/css/argon.css?v=1.2.0') ;?>">
  <link rel="stylesheet" href="<?php echo get_template_directory('back/css/custom.css') ;?>">

  <script src="<?php echo get_template_directory('back/vendor/jquery/dist/jquery.min.js') ;?>"></script>

  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/newjquery/jquery-ui/jquery-ui.css') ;?>">
  <script src="<?php echo get_template_directory('back/vendor/newjquery/jquery-ui/jquery-ui.min.js') ;?>"></script>

  <script src="<?php echo get_template_directory('back/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/js-cookie/js.cookie.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ;?>"></script>

  <style type="text/css">
    navbar-brand-img, .navbar-vertical .navbar-brand > img {
    max-width: 100%;
    max-height: 4rem;
}
  </style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/RPC-JP_Logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, '', 'active')?>" href="<?=base_url('admin')?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

            <?php if ($this->sess['level_admin'] == 'super_admin'): ?>
              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'access', 'active')?>" href="<?=base_url('admin/access')?>">
                  <i class="fas fa-user-cog" style="color: #9b59b6"></i>
                  <span class="nav-link-text">Admin</span>
                </a>
              </li>
            <?php endif ?>

            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'jobs', 'active')?>" href="#jobs-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fas fa-briefcase" style="color: #2980b9;"></i>
                <span class="nav-link-text">Jobs</span>
              </a>
              <div class="collapse" id="jobs-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/jobs')?>" class="nav-link">
                      <span class="sidenav-normal"> List</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/jobs/specialization')?>" class="nav-link">
                      <span class="sidenav-normal"> Specialization</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'companies', 'active')?>" href="<?=base_url('admin/companies')?>">
                <i class="fas fa-building" style="color: #e67e22"></i>
                <span class="nav-link-text">Companies</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'users', 'active')?>" href="<?=base_url('admin/users')?>">
                <i class="fas fa-users" style="color: #16a085"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'settings', 'active')?>" href="<?=base_url('admin/settings')?>">
                <i class="fas fa-cog" style="color: #34495e "></i>
                <span class="nav-link-text">Site Setting</span>
              </a>
            </li>
            
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/logout')?>">
                <i class="fas fa-sign-out-alt" style="color: #e74c3c;"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form> -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <?php if ($this->sess['image_admin'] != ''): ?>
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="<?=base_url().$this->sess['image_admin']?>">
                    </span>
                  <?php endif ?>
                  
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?=$this->sess['name_admin']?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?=base_url('admin/access/detail/').$this->sess['id_admin']?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?=base_url('admin/logout')?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->