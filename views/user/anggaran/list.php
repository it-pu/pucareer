<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Anggaran</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Anggaran</a></li>
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
                  <h3 class="mb-0">Daftar Anggaran</h3>
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
              <button class="btn btn-primary mb-3 col-md-3" data-toggle="modal" data-target="#addAnggaran" style="width: auto;"><i class="fas fa-plus"></i> Tambah Anggaran</button>

              <a href="<?=base_url('admin/desa/add')?>" class="btn btn-success mb-3 col-md-3" style="width: auto;"><i class="fas fa-print"></i> Print</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama Anggaran</th>
                      <th scope="col" >Upload By</th>
                      <th scope="col" >Tgl. Upload</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($anggaran as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_anggaran']?></td>
                        <td><?=$value['nama_user']?></td>
                        <td><?=$value['tgl_upload_anggaran']?></td>
                        <td>
                          <a href="<?=base_url($value['link_file_anggaran'])?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> Download Data</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<div class="modal fade" id="addAnggaran" tabindex="-1" role="dialog" aria-labelledby="addAnggaranLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart(base_url('admin/anggaran/upload_anggaran')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="addAnggaranLabel">Upload Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="">Nama Anggaran</label><br>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">File Anggaran</label><br>
            <input type="file" name="link_file_anggaran" id="file" onchange="fileValidation2pdf(this.id);" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php get_template_home('admin/footer') ?>