<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">RT / RW</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">RW</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
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
                  <h3 class="mb-0">Daftar RW</h3>
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
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addnewRW" style="width: auto;"><i class="fas fa-plus"></i> Tambah RW</button>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nomor RW</th>
                      <th scope="col" >Penanggung Jawab</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rw as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nomor_rw']?></td>
                        <td><?=$value['nama_user']?></td>
                        <td>
                          <button type="button" class="btn btn-success btn-sm" id="<?=$value['id_rw']?>" data-toggle="modal" data-target="#editPJRWModal" onclick="editrwpj(this.id)"><i class="fas fa-edit"></i> Penanggung Jawab</button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<div class="modal fade" id="editPJRTModal" tabindex="-1" role="dialog" aria-labelledby="kirimsuratModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart(base_url('admin/rt_rw/edit_rw_pj')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="kirimsuratModalLabel">Edit Penanggung Jawab</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <input type="hidden" name="id_rt" id="id_rt_pj">
          <div class="form-group">
            <label for="">Pilih User</label><br>
            <select class="form-control" name="id_user" required>
              <option value="">--</option>
              <?php foreach ($user as $key => $value): ?>
                <option value="<?=$value['id_user']?>"><?=$value['nama_user']?></option>
              <?php endforeach ?>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Edit</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="addnewRW" tabindex="-1" role="dialog" aria-labelledby="addnewRWLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart(base_url('admin/rt_rw/add_rw')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="addnewRWLabel">Tambah RW</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="">Nomor RW</label><br>
            <input type="text" name="nomor_rw" class="form-control" required>
          </div>
      
          <div class="form-group">
            <label for="">Pilih User</label><br>
            <select class="form-control" name="id_user">
              <option value="">--</option>
              <?php foreach ($user as $key => $value): ?>
                <option value="<?=$value['id_user']?>"><?=$value['nama_user']?> | NIK : <?=$value['alamat_user']?></option>
              <?php endforeach ?>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>
<?php get_template_home('admin/footer') ?>