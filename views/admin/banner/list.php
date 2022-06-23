<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Banner</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Banner</a></li>
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
                  <h3 class="mb-0">Daftar Banner</h3>
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

              <button class="btn btn-primary" data-toggle="modal" data-target="#addBanerModal"><i class="fas fa-plus"></i> Add</button><br>
                <br>
                *drag & drop baris di table untuk mengatur urutan <i>Banner</i>
                <table class="table mt-3" id="sortable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Banner</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($banner as $key => $value): ?>
                      <tr data-index="<?=$value['id_banner']?>" data-position="<?=$value['sort_num']?>">
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_banner']?></td>
                        <td><img src="<?=base_url().$value['file_foto_banner']?>" class="img-fluid" style="max-height: 150px;"></td>
                        <td>
                          <a href="<?=base_url('admin/banner/delete/').$value['id_banner']?>" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
            </div>
            
          </div>
        </div>
      </div>

<!-- Modal -->
<?php echo form_open_multipart(base_url('admin/banner/store'));  ?>
<div class="modal fade" id="addBanerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBannerModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="">Nama Banner</label>
            <input type="text" name="nama_banner" class="form-control" aria-describedby="" required>
          </div>

          <div class="form-group">
            <label for="">Banner</label>
            <input type="file" name="file_foto_banner" id="file" onchange="fileValidation(this.id);" required>
            <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>

<!-- Modal -->
<?php echo form_open_multipart(base_url('admin/banner/edit'));  ?>
<div class="modal fade" id="addBannerModalEdit" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBannerModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <input type="hidden" name="id_banner" id="edit_banner">
        
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama_banner" id="edit_nama_guru" class="form-control" aria-describedby="" value="" required>
          </div>

          <div class="form-group">
            <label for="">Banner</label>
            <input type="file" name="file_foto_banner" id="file2" onchange="fileValidation(this.id);">
            <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
  function editbanner(id)
  {
    $.ajax({
    url : '<?php echo base_url('admin/banner/get_edit_banner/'); ?>'+id,
    type : 'GET',
    dataType : 'JSON',
    success : function (result)
    {
        document.getElementById('edit_banner').value = id;
        document.getElementById('edit_nama_guru').value = result.nama_banner;
    }
    });
  }
</script>

<script>
    

    $( "#sortable tbody" ).sortable({
      update: function (event, ui) {
                   $(this).children().each(function (index) {
                        if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                   });

                   saveNewPositions();
               }
           });

    function saveNewPositions() {
            var positions = [];
            $('.updated').each(function () {
               positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
               $(this).removeClass('updated');
            });

            $.ajax({
               url: '<?=base_url('admin/banner/update_sort')?>',
               method: 'POST',
               dataType: 'text',
               data: {
                   update: 1,
                   positions: positions
               }, success: function (response) {
                    console.log(response);
               }
            });
        }

  </script>


<?php get_template_home('admin/footer') ?>