<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
            Admin Detail <?=$detail['name_admin']?>
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
                <img src="<?=base_url($detail['image_admin'])?>" class="img-fluid" style="border-radius: 15px;"><br>
                <button class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#fotoEdit"><i class="fas fa-image"></i> Edit Image</button>
              </div>
              <div class="col-md-8">
                <div class="row mb-3">
                  <div class="col-4">
                    Nama
                  </div>
                  <div class="col-8">
                    <?=$detail['name_admin']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Email
                  </div>
                  <div class="col-8">
                    <?=$detail['email_admin']?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Level
                  </div>
                  <div class="col-8">
                      <?=strtoupper($detail['level_admin'])?>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    Status
                  </div>
                  <div class="col-8">
                    <?php if ($detail['status_admin'] == 'active'): ?>
                      <span class="badge badge-success">ACTIVE</span>
                    <?php endif ?>
                    <?php if ($detail['status_admin'] == 'deactive'): ?>
                      <span class="badge badge-danger">DEACTIVE</span>
                    <?php endif ?>
                  </div>
                </div>
                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Edit Profile</button>
                <?php if ($detail['status_admin'] == 'active'): ?>
                  <a href="<?=base_url('admin/access/edit_status/').$detail['id_admin'].'/1'?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Deactivate</a>
                <?php endif ?>
                <?php if ($detail['status_admin'] == 'deactive'): ?>
                  <a href="<?=base_url('admin/access/edit_status/').$detail['id_admin'].'/1'?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</a>
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
        <input type="hidden" name="id_admin" value="<?=$detail['id_admin']?>">
        <div class="form-group">
          <label for="">Foto</label>
          <input accept="image/*" type='file' name="image_admin" id="image_admin" onchange="preview_img('prev_img_admin')" required/><br>
          <img id="prev_img_admin" src="" alt="" style="max-width: 200px;" />
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