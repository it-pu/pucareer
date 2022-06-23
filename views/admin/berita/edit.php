<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Berita</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Berita</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                  <h3 class="mb-0">Edit Berita</h3>
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

              <?php echo form_open_multipart(base_url('admin/berita/update')); ?>
              <input type="hidden" name="id_berita" value="<?=$detail['id_berita']?>">

              <div class="form-group">
                <label for="">Judul Berita</label>
                <input type="text" name="judul_berita" class="form-control" aria-describedby="" value="<?=$detail['judul_berita']?>" required>
              </div>
              <div class="form-group">
                <label for="">Cover</label>
                <input type="file" name="cover_berita" id="file" onchange="fileValidation(this.id);">
                <div id="previewpic" class="mt-2"><img src="<?=base_url($detail['cover_berita'])?>" alt class="img-fluid" style="width: 500px;"></div>
              </div>
              <div class="form-group">
                <label for="">Sumber Berita</label>
                <input type="text" name="sumber" class="form-control" value="<?=$detail['sumber_berita']?>">
              </div>
              <div class="form-group">
                <label for="">Link Berita *isi bila berita dari website lain</label>
                <input type="text" name="link_berita" class="form-control" value="<?=$detail['link_berita']?>">
              </div>
              <div class="form-group">
                <label for="">Isi Berita</label>
                <textarea name="isi_berita" id="editor"><?=$detail['isi_berita']?></textarea>
              </div>
              <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
              <?php echo form_close(); ?>
            </div>
            
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>