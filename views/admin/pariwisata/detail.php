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
                  <h3 class="mb-0">Detail <?=$detail['nama_pariwisata']?></h3>
                  <?=$detail['alamat_pariwisata']?><br>
                  <?php if ($detail['status_pariwisata'] == 'buka'): ?>
                    <span class="badge badge-success"><?=strtoupper($detail['status_pariwisata'])?></span>
                  <?php endif ?>
                  <?php if ($detail['status_pariwisata'] == 'tutup'): ?>
                    <span class="badge badge-danger"><?=strtoupper($detail['status_pariwisata'])?></span>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?=$this->session->flashdata('error')?>
                </div>
              <?php endif ?>
                <center>
                  <img src="<?=base_url($detail['cover_pariwisata'])?>" class="img-fluid w-50 mb-3">
                </center>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="deskripssi-tab" data-toggle="tab" href="#deskripssi" role="tab" aria-controls="deskripssi" aria-selected="true">Deskripsi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="deskripssi" role="tabpanel" aria-labelledby="deskripssi-tab">
                    <p><?=$detail['deskripsi_pariwisata']?></p>
                    <p><?=$detail['deskripsi_harga']?></p>
                  </div>
                  <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <button type="button" class="btn btn-sm btn-success mt-3 mb-3" data-toggle="modal" data-target="#addGallery"><i class="fas fa-plus"></i> Tambah Foto</button>
                    <div class="row">
                      <?php foreach ($gallery as $key => $value): ?>
                        <div class="col-md-4 text-center mb-2">
                          <div class="card">
                            <img class="card-img-top" src="<?=base_url($value['pariwisata_foto'])?>" alt="Card image cap">
                            <div class="card-body">
                              <?=$value['deskripsi_foto_pariwisata']?><br>
                              <a href="<?=base_url('admin/pariwisata/delete_foto/').$value['id_pariwisata_foto']?>" class="btn btn-danger btn-sm mt-2">Delete</a>
                            </div>
                          </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>

                
            </div>
            <div class="card-footer">
              <a href="<?=base_url('admin/pariwisata/edit/').$detail['id_pariwisata']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
              <?php if ($detail['status_pariwisata'] == 'buka'): ?>
                <a href="<?=base_url('admin/pariwisata/tutup/').$detail['id_pariwisata']?>" class="btn btn-danger btn-sm"><i class="fas fa-door-closed"></i> Tutup</a>
              <?php endif ?>
              <?php if ($detail['status_pariwisata'] == 'tutup'): ?>
                <a href="<?=base_url('admin/pariwisata/buka/').$detail['id_pariwisata']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Buka</a>
              <?php endif ?>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

<?php echo form_open_multipart(base_url('admin/pariwisata/add_foto'));  ?>
<div class="modal fade" id="addGallery" tabindex="-1" aria-labelledby="addGalleryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGalleryLabel">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_pariwisata" value="<?=$detail['id_pariwisata']?>">
        <div class="form-group">
          <label for="">Keterangan</label>
          <input type="text" name="deskripsi_foto_pariwisata" class="form-control" value="">
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" name="pariwisata_foto" id="file" onchange="fileValidation(this.id);" required>
          <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<?php get_template_home('admin/footer') ?>