<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Career Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo get_template_directory('front/img/favicon.ico') ;?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo get_template_directory('front/lib/animate/animate.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo get_template_directory('front/lib/owlcarousel/assets/owl.carousel.min.css') ;?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo get_template_directory('front/css/bootstrap.min.css') ;?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo get_template_directory('front/css/style.css') ;?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">CAREER PORTAL</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="<?=base_url()?>" class="nav-item nav-link <?=is_active_page_print('', 'active')?>">Home</a>
                    <a href="<?=base_url('jobs')?>" class="nav-item nav-link <?=is_active_page_print('jobs', 'active')?>">Jobs</a>
                    <a href="<?=base_url('companies')?>" class="nav-item nav-link <?=is_active_page_print('companies', 'active')?>">Companies</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#langModal" class="nav-item nav-link">Languages</a>
                    <?php if (!empty($this->sess['logged_in']) && $this->sess['company'] == 0): ?>
                        <li class="nav-item dropdown">
                          <a class="btn btn-primary rounded-0 nav-link dropdown-toggle py-4 w-100 px-lg-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            <?=split_name($this->sess['user_name'])['first_name']?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?=base_url('user')?>"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="<?=base_url('user/application_history')?>"><i class="fas fa-list"></i> Application History</a></li>
                            <li><a class="dropdown-item" href="<?=base_url('user/profile')?>"><i class="fas fa-cog"></i> Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                          </ul>
                        </li>
                    <?php endif ?>  
                    <?php if (!empty($this->sess['logged_in']) && $this->sess['company'] == 1): ?>
                        <li class="nav-item dropdown">
                          <a class="btn btn-primary rounded-0 nav-link dropdown-toggle py-4 w-100 px-lg-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            <?=$this->sess['company_name']?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?=base_url('companies/profile')?>"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="<?=base_url('companies/jobs_offer')?>"><i class="fas fa-briefcase"></i> Jobs Offer</a></li>
                            <li><a class="dropdown-item" href="<?=base_url('companies/setting')?>"><i class="fas fa-cog"></i> Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                          </ul>
                        </li>
                    <?php endif ?>  
                </div>
                <?php if (empty($this->sess['logged_in'])): ?>
                    <a href="<?=base_url('login')?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
                <?php endif ?>
                
            </div>
        </nav>
        <!-- Navbar End -->