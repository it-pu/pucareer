<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Surat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                  <li class="breadcrumb-item"><a href="#">Sub Kategori</a></li>
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

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Tambah Sub Kategori Surat</h3>
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

              <?php echo form_open_multipart(base_url('admin/surat/update_sub_kategori')); ?>
              <input type="hidden" name="id_surat_kategori_sub" value="<?=$skategori['id_surat_kategori_sub']?>" required>
              <div class="form-group">
                <label for="">Nama Sub Kategori</label>
                <input type="text" name="nama_sub_kategori" class="form-control" aria-describedby="" value="<?=$skategori['nama_surat_kategori_sub']?>" required >
              </div>
              <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?=$skategori['deskripsi_surat_kategori_sub']?>">
              </div>
              <div class="form-group">
                <label for="">Kategori Surat</label>
                <select class="form-control" name="kategori">
                  <?php foreach ($kategori as $key => $value): ?>
                    <option value="<?=$value['id_surat_kategori']?>" <?=selected_helper($skategori['id_surat_kategori'], $value['id_surat_kategori'])?>><?=$value['nama_kategori_surat']?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Syarat Surat</label>
                <textarea name="syarat" id="editor"><?=$skategori['syarat_sub_kategori']?></textarea>
              </div>
              <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Edit</button>
              <?php echo form_close(); ?>
            </div>
            
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>