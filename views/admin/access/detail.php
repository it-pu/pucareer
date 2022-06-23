<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
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

        <div class="card">
          <div class="card-header">
            User Detail <?=$detail['nama_user']?>
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
              <div class="col-md-4">
                <img src="<?=base_url($detail['foto_user'])?>" class="img-fluid" style="border-radius: 15px;"><br>
                <button class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#fotoEdit"><i class="fas fa-image"></i> Edit Foto</button>
              </div>
              <div class="col-md-8">
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$detail['nama_user']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    No. HP
                  </div>
                  <div class="col-8">
                    <?=$detail['no_hp_user']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Email
                  </div>
                  <div class="col-8">
                    <?=$detail['email_user']?>
                  </div>
                </div>
                <?php if (in_array_exist($detail['level_user'], 'member')): ?>
                  <div class="row mb-3">
                    <div class="col-4">
                      NIK
                    </div>
                    <div class="col-8">
                      <?=$detail['nik_user']?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      Pekerjaan
                    </div>
                    <div class="col-8">
                      <?=$detail['pekerjaan_user']?>
                    </div>
                  </div>
                <?php endif ?>
                <div class="row mb-3">
                  <div class="col-4">
                    Level
                  </div>
                  <div class="col-8">
                    <?php foreach ($detail['level_user'] as $key => $value): ?>
                      <?=$detail['nama_level'][$key]?><br>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Status
                  </div>
                  <div class="col-8">
                    <?php if ($detail['status_user'] == 'aktif'): ?>
                      <span class="badge badge-success"><?=strtoupper($detail['status_user'])?></span>
                    <?php endif ?>
                    <?php if ($detail['status_user'] == 'non aktif'): ?>
                      <span class="badge badge-danger"><?=strtoupper($detail['status_user'])?></span>
                    <?php endif ?>
                  </div>
                </div>
                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Edit Profil</button>
                <?php if ($detail['status_user'] == 'aktif'): ?>
                  <a href="<?=base_url('admin/access/edit_status/').$detail['id_user'].'/1'?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Non Aktifkan</a>
                <?php endif ?>
                <?php if ($detail['status_user'] == 'non aktif'): ?>
                  <a href="<?=base_url('admin/access/edit_status/').$detail['id_user'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Aktifkan</a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>

<?php echo form_open_multipart(base_url('admin/access/edit_foto'));  ?>
<div class="modal fade" id="fotoEdit" tabindex="-1" aria-labelledby="fotoEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fotoEditLabel">Edit Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" value="<?=$detail['id_user']?>">
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" name="foto_user" id="file" onchange="fileValidation(this.id);" required>
          <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
        
<?php get_template_home('admin/footer') ?>