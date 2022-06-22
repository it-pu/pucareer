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
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
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
                  <h3 class="mb-0">Detail User </h3>
                </div>
              </div>
            </div>
            <div class="card-body">

              <?php if (in_array_exist($this->sess['level'], 'super_admin') || in_array_exist($this->sess['level'], 'admin')): ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username" >Role</label>
                      <select class="form-control" name="level[]">
                        <?php foreach ($level as $key => $value): ?>
                          <option value="<?=$value['id_level']?>"><?=$value['deskripsi_level']?></option>  
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <?php if (in_array_exist($this->sess['level'], 'admin')): ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >Role</label>
                        <select class="form-control" name="desa">
                          <?php foreach ($desa as $key => $value): ?>
                            <option value="<?=$value['id_desa']?>"><?=$value['nama_desa']?></option>  
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  <?php endif ?>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">No. HP</label>
                      <input type="text" name="no_hp" class="form-control" placeholder="No. HP">
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Email" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Alamat</label>
                      <textarea name="alamat_user" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">RW</label>
                      <select class="form-control" name="desa">
                        <?php foreach ($rw as $key => $value): ?>
                          <option value="<?=$value['id_rw']?>"><?=$value['nomor_rw']?></option>  
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Profile Pic</label><br>
                      <input type="file" name="foto_user" id="file" onchange="fileValidation(this.id);" required>
                      <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
                    </div>
                  </div>
                </div>
              <?php endif ?>

              <?php if (in_array_exist($this->sess['level'], 'operator')): ?>
                <input type="hidden" name="desa" value="<?=$this->sess['id_desa']?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username" >Role</label>
                      <select class="form-control" name="level[]">
                        <?php foreach ($level as $key => $value): ?>
                          <option value="<?=$value['id_level']?>"><?=$value['deskripsi_level']?></option>  
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">NIK</label>
                      <input type="text" name="nik" class="form-control" placeholder="NIK">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">No. HP</label>
                      <input type="text" name="no_hp" class="form-control" placeholder="No. HP">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Alamat</label>
                      <textarea name="alamat_user" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">RW</label>
                      <select class="form-control" name="desa" id="boxrw" onChange="getrt(this);">
                        <option value="0">--</option>
                        <?php foreach ($rw as $key => $value): ?>
                          <option value="<?=$value['id_rw']?>"><?=$value['nomor_rw']?></option>  
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="">RT</label>
                      <select class="form-control" name="id_rt" id="rtisi">
                        <option>--</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Profile Pic</label><br>
                      <input type="file" name="foto_user" id="file" onchange="fileValidation(this.id);" required>
                      <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
                    </div>
                  </div>
                </div>
              <?php endif ?>
                
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah User</button>
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