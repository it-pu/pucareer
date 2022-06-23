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
                  <li class="breadcrumb-item"><a href="#">Jenis</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
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
                  <h3 class="mb-0">Daftar Jenis</h3>
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
              <?php if (in_array_exist($this->sess['level'], 'operator')): ?>
                <a href="<?=base_url('admin/bank_sampah/add_jenis')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Tambah Jenis Sampah</a>
              <?php endif ?>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Kode</th>
                      <th scope="col" >Jenis Sampah</th>
                      <th scope="col" >Satuan</th>
                      <th scope="col" >Harga</th>
                      <th scope="col">Tgl. Ditambahkan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($jenis as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['kode_jenis_sampah']?></td>
                        <td><?=$value['nama_jenis_sampah']?></td>
                        <td><?=$value['satuan_jenis_sampah']?></td>
                        <td><?=$value['harga_jenis_sampah']?></td>
                        <td><?=$value['tgl_tambah_jenis_sampah']?></td>
                        <td><a href="<?=base_url('admin/bank_sampah/edit_jenis/').$value['id_jenis_sampah']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
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