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
                  <li class="breadcrumb-item"><a href="#">Surat</a></li>
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
                  <h3 class="mb-0">Daftar Surat Layanan</h3>
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

              <a href="<?=base_url('admin/desa/add')?>" class="btn btn-success mb-3 col-md-3" style="width: auto;"><i class="fas fa-print"></i> Print</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama Surat</th>
                      <th scope="col" >Kategori</th>
                      <th scope="col" >Pemohon</th>
                      <th scope="col" >Tgl. Request</th>
                      <th scope="col">Tgl. Terima</th>
                      <th scope="col">Status Surat</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($surat as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_surat']?></td>
                        <td><?=$value['nama_kategori_surat']?></td>
                        <td><?=$value['nama_user']?></td>
                        <td><?=$value['tgl_request']?></td>
                        <td><?=$value['tgl_terima']?></td>
                        <td>
                            <?php if ($value['status_surat'] == 'requested'): ?>
                              <span class="badge badge-success"><?=strtoupper($value['status_surat'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_surat'] == 'terproses'): ?>
                              <span class="badge badge-primary"><?=strtoupper($value['status_surat'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_surat'] == 'selesai'): ?>
                              <span class="badge badge-info"><?=strtoupper($value['status_surat'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_surat'] == 'ditolak'): ?>
                              <span class="badge badge-danger"><?=strtoupper($value['status_surat'])?></span>
                            <?php endif ?>
                          </td>
                        <td>
                          <a href="<?=base_url('admin/surat/detail/').$value['id_surat']?>" class="btn btn-info btn-sm"><i class="fas fa-info"  ></i> Detail</a>
                          <?php if ($value['status_surat'] == 'requested'): ?>
                            <!-- <button type="button" class="btn btn-primary btn-sm" id="<?=$value['id_surat']?>" data-toggle="modal" data-target="#kirimsuratModal" onclick="kirimsurat(this.id, '<?php echo $value['nama_user']; ?>')"><i class="fas fa-paper-plane"></i> Kirim Surat</button> -->

                            <a href="<?=base_url('admin/surat/ambil_surat/').$value['id_surat']?>" class="btn btn-success btn-sm" onclick="return confirm('Edit Status?')"><i class="fas fa-check"  ></i> Diterima</a>

                            <a href="<?=base_url('admin/surat/tolak/').$value['id_surat']?>" class="btn btn-danger btn-sm" onclick="return confirm('Tolak Surat?')"><i class="fas fa-times"  ></i> Tolak</a>
                          <?php endif ?>
                          <?php if ($value['status_surat'] == 'diterima'): ?>
                            <!-- <a href="<?=base_url().$value['link_file_surat']?>" class="btn btn-warning btn-sm" target="_blank"><i class="fas fa-download"></i> Download</a>
                            <button type="button" class="btn btn-success btn-sm" id="<?=$value['id_surat']?>" data-toggle="modal" data-target="#suratEdit" onclick="editsurat(this.id)"><i class="fas fa-edit"></i> Edit Surat</button> -->
                          <?php endif ?>
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

<div class="modal fade" id="kirimsuratModal" tabindex="-1" role="dialog" aria-labelledby="kirimsuratModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart(base_url('admin/surat/kirim_surat')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="kirimsuratModalLabel">Kirim Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <input type="hidden" name="id_surat" id="id_surat_kirim">
          <div class="form-group">
            <label for="">Surat</label><br>
            <input type="file" name="link_file_surat" id="file" onchange="fileValidation2pdf(this.id);" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php echo form_open_multipart(base_url('admin/surat/edit_surat'));  ?>
<div class="modal fade" id="suratEdit" tabindex="-1" aria-labelledby="suratEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="suratEditLabel">Edit Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_surat" id="id_surat_edit" value="">
        <div class="form-group">
          <label for="">Surat</label><br>
          <input type="file" name="link_file_surat" id="file" onchange="ValidateSingleInput(this);" required>
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

<script type="text/javascript">
  function kirimsurat(id, nama)
  {
    document.getElementById("kirimsuratModalLabel").innerHTML = "Kirim Surat kepada <b>"+nama+"<b>";
    document.getElementById("id_surat_kirim").value = id;
  }

  function editsurat(id)
  {
    document.getElementById("id_surat_edit").value = id;
  }
</script>
<?php get_template_home('admin/footer') ?>