<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pariwisata</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pariwisata</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
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
            <?php echo form_open_multipart(base_url('admin/pariwisata/store')); ?>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Tambah Pariwisata </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Nama Pariwisata</label>
                    <input type="text" name="nama_pariwisata" class="form-control" placeholder="Nama Pariwisata" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Alamat</label>
                    <input type="text" name="alamat_pariwisata" class="form-control" placeholder="Alamat" required>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi_pariwisata" id="editor"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Telp. Pengurus</label>
                    <input type="text" name="no_telp_pengurus" class="form-control" placeholder="Telp Pengurus" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Deskripsi Harga</label>
                    <textarea name="deskripsi_harga" id="editor2"></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Cover Pariwisata</label><br>
                    <input type="file" name="cover_pariwisata" id="file" onchange="fileValidation(this.id);" required>
                    <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah Pariwisata</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>