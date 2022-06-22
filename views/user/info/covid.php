<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Info</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Info</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Covid 19</li>
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
                  <h3 class="mb-0">Link Covid 19 Bogor</h3>
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
              <!-- <a href="<?=base_url('admin/desa/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Tambah Desa</a> -->

              <?php echo form_open_multipart(base_url('admin/info/edit/covid')); ?>
                <input type="hidden" name="setting" value="covid" required>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Link Covid</label>
                    <input type="text" name="link" class="form-control" placeholder="Link Covid" value="<?=$data['link_setting']?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit COVID-19</button>
                </div>
              <?php echo form_close(); ?>
            </div>
            
          </div>
        </div>
      </div>

<?php get_template_home('admin/footer') ?>