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
                  <li class="breadcrumb-item"><a href="#">Companies</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Industries List</li>
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
                  <h3 class="mb-0">Industries List</h3>
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
              <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Industry</th>
                      <th scope="col">Total Companies</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Last Updated</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($industries as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['industry_name']?></td>
                        <td><?=$total_companies[$key]?></td>
                        <td>
                          <?php if ($value['industry_status'] == 1): ?>
                            <span class="badge badge-success">ACTIVE</span>
                          <?php endif ?>
                          <?php if ($value['industry_status'] == 0): ?>
                            <span class="badge badge-danger">DEACTIVE</span>
                          <?php endif ?>
                        </td>
                        <td><?=$value['created_at']?></td>
                        <td><?=$value['updated_at']?></td>
                        <td>
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal" onclick="editIndustry('<?=$value['id_industry']?>', '<?=$value['industry_name']?>')"><i class="fas fa-edit"></i> Edit</button>
                          <?php if ($value['industry_status'] == 1): ?>
                            <a href="<?=base_url('admin/companies/industries_status/').$value['id_industry']?>" class="btn btn-danger btn-sm" onclick="return confirm('Update Industry Status?')"><i class="fas fa-times"></i> Deactivate</a>
                          <?php endif ?>
                          <?php if ($value['industry_status'] == 0): ?>
                            <a href="<?=base_url('admin/companies/industries_status/').$value['id_industry']?>" class="btn btn-success btn-sm" onclick="return confirm('Update Industry Status?')"><i class="fas fa-check"></i> Activate</a>
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
<?php echo form_open_multipart(base_url('admin/companies/industries_store')); ?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Industries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control-label">Industry Name</label><font class="required">*</font>
          <input type="text" name="industry_name" class="form-control" placeholder="Industry Name" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Insert Industry?')">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php echo form_open_multipart(base_url('admin/companies/industries_update')); ?>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Industries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_industry" id="id_industry_id">
        <div class="form-group">
          <label class="form-control-label">Industry Name</label><font class="required">*</font>
          <input type="text" name="industry_name" class="form-control" placeholder="Industry Name" id="industry_name_id" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Update Industry?')">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
function editIndustry(id_industry, name)
{
  document.getElementById('id_industry_id').value = id_industry;
  document.getElementById('industry_name_id').value = name;
}
</script>

<?php get_template_home('admin/footer') ?>