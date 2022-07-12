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
                  <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Specialization List</li>
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
                  <h3 class="mb-0">Specialization List</h3>
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
              <button class="btn btn-primary mb-3 col-md-3" type="button" data-toggle="modal" data-target="#specializationModalAdd" style="width: auto;"><i class="fas fa-plus"></i> Add Specialization</button>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Specialization</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($specialization as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['specialization_name']?></td>
                        <td><?=$value['created_at']?></td>
                        <td>
                          <?php if ($value['specialization_status'] == 1): ?>
                            <span class="badge badge-success">Active</span>
                          <?php endif ?>
                          <?php if ($value['specialization_status'] == 0): ?>
                            <span class="badge badge-danger">Deactive</span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/jobs/specialization_detail/').$value['id_specialization']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a>

                          <?php if ($value['specialization_status'] == 1): ?>
                            <a href="<?=base_url('admin/jobs/specialization_status/').$value['id_specialization']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Deactivate</a>
                          <?php endif ?>
                          <?php if ($value['specialization_status'] == 0): ?>
                            <a href="<?=base_url('admin/jobs/specialization_status/').$value['id_specialization']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</a>
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

<!-- Modal -->
<?php echo form_open(base_url('admin/jobs/specialization_post')); ?>
<div class="modal fade" id="specializationModalAdd" tabindex="-1" aria-labelledby="specializationModalAddLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="specializationModalAddLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control-label" for="input-username">Specialization</label>
          <input type="text" name="specialization" class="form-control" placeholder="Name" required>
        </div>
        <hr>
        <label class="form-control-label" for="input-username">Role</label>
        <input type="text" name="role[]" class="form-control mb-3" placeholder="Role" value="">
        <div id="optional-role">
          
        </div>
        <button type="button" class="btn btn-success btn-sm" onclick="addRole()">Add Role</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
function addRole()
{
  $('#optional-role').append('<input type="text" name="role[]" class="form-control mb-3" placeholder="Role" value="">');
}
</script>

<?php get_template_home('admin/footer') ?>