
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Kampung Online</title>
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
          <img src="<?=get_foto_assets('back/img/banjar.png')?>" class="navbar-brand-img" alt="...">
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
            
            <?php if (in_array_exist($this->sess['level'], 'super_admin') || in_array_exist($this->sess['level'], 'admin')): ?>
              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'rt_rw', 'active')?> <?=is_active_page_print_rep(2, 'access', 'active')?>" href="#rtrw-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                  <i class="fas fa-users" style="color: #2980b9;"></i>
                  <span class="nav-link-text">Users</span>
                </a>
                <div class="collapse" id="rtrw-dashboards">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="<?=base_url('admin/access')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar User </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?=base_url('admin/rt_rw/daftar_rt')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar RT </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?=base_url('admin/rt_rw/daftar_rw')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar RW </span>
                      </a>
                    </li>
                  </ul>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'desa', 'active')?>" href="<?=base_url('admin/desa')?>">
                  <i class="fas fa-home" style="color: #3498db;"></i>
                  <span class="nav-link-text">Desa</span>
                </a>
              </li>
            <?php endif ?>
            <?php if (in_array_exist($this->sess['level'], 'operator')): ?>

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'rt_rw', 'active')?> <?=is_active_page_print_rep(2, 'access', 'active')?>" href="#rtrw-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                  <i class="fas fa-users" style="color: #2980b9;"></i>
                  <span class="nav-link-text">Users</span>
                </a>
                <div class="collapse" id="rtrw-dashboards">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="<?=base_url('admin/access')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar User </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?=base_url('admin/rt_rw/daftar_rt')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar RT </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?=base_url('admin/rt_rw/daftar_rw')?>" class="nav-link">
                        <span class="sidenav-normal"> Daftar RW </span>
                      </a>
                    </li>
                  </ul>
                </div>

              </li>

              <a class="nav-link <?=is_active_page_print_rep(2, 'surat', 'active')?>" href="#navbar-surat" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-surat">
                <i class="fas fa-mail-bulk" style="color: #00cec9"></i>
                <span class="nav-link-text">Surat</span>
              </a>
              <div class="collapse" id="navbar-surat">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/surat')?>" class="nav-link">
                      <span class="sidenav-normal"> Daftar Surat </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/surat/kategori')?>" class="nav-link">
                      <span class="sidenav-normal"> Kategori </span>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="<?=base_url('admin/surat/sub_kategori')?>" class="nav-link">
                      <span class="sidenav-normal"> Sub Kategori </span>
                    </a>
                  </li> -->
                </ul>
              </div>

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'toko', 'active')?>" href="<?=base_url('admin/toko')?>">
                  <i class="fas fa-store" style="color: #16a085"></i>
                  <span class="nav-link-text">Toko</span>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'anggaran', 'active')?>" href="<?=base_url('admin/anggaran')?>">
                  <i class="fas fa-money-check-alt" style="color: #95a5a6"></i>
                  <span class="nav-link-text">Anggaran</span>
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'berita', 'active')?> <?=is_active_page_print_rep(2, 'agenda', 'active')?>" href="#beritaagenda-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                  <i class="far fa-newspaper" style="color: #9b59b6;"></i>
                  <span class="nav-link-text">Berita / Agenda</span>
                </a>
                <div class="collapse" id="beritaagenda-dashboards">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="<?=base_url('admin/berita')?>" class="nav-link">
                        <span class="sidenav-normal"> Berita </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?=base_url('admin/agenda')?>" class="nav-link">
                        <span class="sidenav-normal"> Agenda </span>
                      </a>
                    </li>
                  </ul>
                </div>

              </li>

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'kemajuan_desa', 'active')?>" href="<?=base_url('admin/kemajuan_desa')?>">
                 <i class="fas fa-chart-line" style="color: #34495e;"></i>
                  <span class="nav-link-text">Kemajuan Desa</span>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'pariwisata', 'active')?>" href="<?=base_url('admin/pariwisata')?>">
                  <i class="fas fa-umbrella-beach" style="color: #f1c40f;"></i>
                  <span class="nav-link-text">Pariwisata</span>
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'laporan', 'active')?>" href="<?=base_url('admin/laporan')?>">
                  <i class="fas fa-exclamation-triangle" style="color: red;"></i>
                  <span class="nav-link-text">Laporan</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'banner', 'active')?>" href="<?=base_url('admin/banner')?>">
                  <i class="far fa-window-maximize" style="color: #27ae60"></i>
                  <span class="nav-link-text">Banner</span>
                </a>
              </li>

              <a class="nav-link <?=is_active_page_print_rep(2, 'bank_sampah', 'active')?>" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fas fa-piggy-bank" style="color: #00cec9;"></i>
                <span class="nav-link-text">Bank Sampah</span>
              </a>
              <div class="collapse" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/transaksi')?>" class="nav-link">
                      <span class="sidenav-normal"> Transaksi </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/jenis_sampah')?>" class="nav-link">
                      <span class="sidenav-normal"> Jenis Sampah </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/lokasi')?>" class="nav-link">
                      <span class="sidenav-normal"> Lokasi Bank Sampah </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/reward')?>" class="nav-link">
                      <span class="sidenav-normal"> Reward </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/trans_reward')?>" class="nav-link">
                      <span class="sidenav-normal"> Transaksi Reward </span>
                    </a>
                  </li>
                </ul>
              </div>

              <a class="nav-link <?=is_active_page_print_rep(2, 'info', 'active')?>" href="#navbar-info" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-info">
                <i class="fa fa-info-circle" style="color: #e056fd;"></i>
                <span class="nav-link-text">Info</span>
              </a>
              <div class="collapse" id="navbar-info">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/covid')?>" class="nav-link">
                      <span class="sidenav-normal"> COVID-19 </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/anggaran')?>" class="nav-link">
                      <span class="sidenav-normal"> Anggaran </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/bansos')?>" class="nav-link">
                      <span class="sidenav-normal"> Bansos </span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/dpt')?>" class="nav-link">
                      <span class="sidenav-normal"> Cek DPT </span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/umkm')?>" class="nav-link">
                      <span class="sidenav-normal"> Bantuan UMKM </span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?=base_url('admin/info/profil_desa')?>" class="nav-link">
                      <span class="sidenav-normal"> Profil Desa </span>
                    </a>
                  </li>
                </ul>
              </div>

              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'pendaftaran', 'active')?>" href="<?=base_url('admin/pendaftaran')?>">
                  <i class="fas fa-hand-paper" style="color: #3498db;"></i>
                  <span class="nav-link-text">Pendaftar Baru</span>
                </a>
              </li>
            <?php endif ?>

            <?php if (in_array_exist($this->sess['level'], 'operator_sampah')): ?>
              <a class="nav-link <?=is_active_page_print_rep(2, 'bank_sampah', 'active')?>" href="#navbar-bs" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-bs">

                <i class="fas fa-piggy-bank" style="color: #00cec9;"></i>
                <span class="nav-link-text">Bank Sampah</span>
              </a>
              <div class="collapse" id="navbar-bs">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/transaksi')?>" class="nav-link">
                      <span class="sidenav-normal"> Transaksi </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/jenis_sampah')?>" class="nav-link">
                      <span class="sidenav-normal"> Jenis Sampah </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/bank_sampah/lokasi')?>" class="nav-link">
                      <span class="sidenav-normal"> Lokasi Bank Sampah </span>
                    </a>
                  </li>
                </ul>
              </div>
            <?php endif ?>
            
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('logout')?>">
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
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?=$this->sess['foto_user']?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><!-- <?=$this->sess['nama_user']?> -->Operator</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?=base_url('admin/access/detail/').$this->sess['id_user']?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?=base_url('logout')?>" class="dropdown-item">
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