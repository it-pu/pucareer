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
            <?php echo form_open_multipart(base_url('admin/access/store')); ?>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add Admin</h3>
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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Name</label><font class="required">*</font>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Email</label><font class="required">*</font>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Password</label><font class="required">*</font>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Confirm Password</label><font class="required">*</font>
                    <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Profile Pic</label><font class="required">*</font><br>
                    <input accept="image/*" type='file' name="image_admin" onchange="preview_img('image_admin')" required/><br>
                      <img id="image_admin" src="" alt="" style="max-width: 200px;" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" onclick="return confirm('Add Admin?');">Add Admin</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

<script type="text/javascript">
  function getrt(selectObject)
  {
    var id_rw = selectObject.value;

    $.ajax({
    url : '<?php echo base_url('admin/rt_rw/get_rt/'); ?>'+id_rw,
    type : 'GET',
    dataType : 'JSON',
    success : function (result)
    {
        document.getElementById('rtisi').innerHTML = '';

        $('#rtisi').append('<option value=""></option>')
        $.each(result, function(i, data){
          $('#rtisi').append
          (`
            <option value="`+data.id_rt+`">`+data.nomor_rt+`</option>
          `)
        });
    }
    });
  }
</script>

<?php get_template_home('admin/footer') ?>