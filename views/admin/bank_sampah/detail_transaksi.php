<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Bank Sampah</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail Transaksi</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success mb-2" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mb-2" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>

              <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-6 mb-2">
                      Nasabah
                    </div>
                    <div class="col-6">
                      : <?=$transaksi['nama_user']?>
                    </div>
                    <div class="col-6 mb-2">
                      Operator
                    </div>
                    <div class="col-6">
                      : <?=$op?>
                    </div>
                    <div class="col-6 mb-2">
                      Tgl. Transaksi
                    </div>
                    <div class="col-6">
                      : <?=$transaksi['tgl_transaksi_bs']?>
                    </div>
                    <div class="col-6 mb-2">
                      Nilai Transaksi
                    </div>
                    <div class="col-6">
                      : <?=$transaksi['total_saldo_didapat']?>
                    </div>
                  </div>
                </div>
                <div class="col-3"></div>
              </div>

              <hr>
              <center><h4>Daftar Sampah</h4></center>
              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Jenis</th>
                      <th scope="col" >Quantity</th>
                      <th scope="col">Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_jenis_sampah']?></td>
                        <td><?=$value['quantity']?></td>
                        <td><?=$value['total_harga_sampah']?></td>
                      </tr>
                    <?php endforeach ?>
          
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>