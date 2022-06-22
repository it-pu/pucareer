<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Bank Sampah</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Transaksi Reward</a></li>
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
                  <h3 class="mb-0">Daftar Transaksi</h3>
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
              <?php if (in_array_exist($this->sess['level'], 'operator')): ?>
                <!-- <button class="btn btn-primary mb-3 col-md-3" data-toggle="modal" data-target="#addReward" style="width: auto;"><i class="fas fa-plus"></i> Tambah Reward</button> -->
              <?php endif ?>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >User</th>
                      <th scope="col" >Nama Reward</th>
                      <th scope="col" >Qty Diambil</th>
                      <th scope="col" >Status</th>
                      <th scope="col">Tgl. Klaim</th>
                      <th scope="col">Tgl. Ambil</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($trans as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_user']?></td>
                        <td><?=$value['nama_reward']?></td>
                        <td><?=$value['qty_get_reward']?></td>
                        <td>
                            <?php if ($value['status_transaksi_reward'] == 'diklaim'): ?>
                              <span class="badge badge-success"><?=strtoupper($value['status_transaksi_reward'])?></span>
                            <?php endif ?>
                            <?php if ($value['status_transaksi_reward'] == 'sudah diambil'): ?>
                              <span class="badge badge-primary"><?=strtoupper($value['status_transaksi_reward'])?></span>
                            <?php endif ?>
                        </td>
                        <td><?=$value['tgl_klaim_reward']?></td>
                        <td><?=$value['tgl_ambil_reward']?></td>
                        <td><a href="<?=base_url('admin/bank_sampah/edit_stat_trans/').$value['id_transaksi_reward_bs']?>" class="btn btn-success btn-sm" ><i class="fas fa-edit"></i> Edit Status</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<div class="modal fade" id="addReward" tabindex="-1" role="dialog" aria-labelledby="addRewardLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart(base_url('admin/bank_sampah/store_reward')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="addRewardLabel">Tambah Reward</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="">Nama Reward</label><br>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Nilai Dibutuhkan</label><br>
            <input type="text" name="nilai" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Quantity</label><br>
            <input type="text" name="qty" class="form-control" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php get_template_home('admin/footer') ?>