<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/company/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>About</h3><hr>

                        <?php if ($this->session->flashdata('error')): ?>
                          <div class="alert alert-danger" role="alert">
                            <?=$this->session->flashdata('error')?>
                          </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('success')): ?>
                          <div class="alert alert-success" role="alert">
                            <?=$this->session->flashdata('success')?>
                          </div>
                        <?php endif ?>

                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPhoto">Add Photo</button><br>

                        <div class="row">
                            <?php foreach ($gallery as $key => $value): ?>
                                <div class="col-md-4 mb-3">
                                     <img src="<?=base_url().$value['gallery_file']?>" class="card-img-top">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="<?=base_url('companies/gallery_delete/').$value['id_company_gallery']?>" onclick="return confirm('Delete Image?')"><i class="fas fa-times"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<?php echo form_open_multipart(base_url('companies/gallery_post')); ?>
<div class="modal fade" id="addPhoto" tabindex="-1" aria-labelledby="addPhotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPhotoLabel">Add Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_company" value="<?=$this->sess['id_company']?>">
        <div class="row">
            <div class="col-md-4">
                Image (.jpg/.png/.jpeg)<font class="required">*</font>
            </div>
            <div class="col-md-8">
                <input accept="image/*" type='file' id="gallery_c" name="gallery_file" onchange="fileValidationImage(this.id, true, 'prev_gall');" /><br>
                <img id="prev_gall" src="" alt="" style="max-width: 250px;" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
        
<?php get_template_home('home/footer') ?>