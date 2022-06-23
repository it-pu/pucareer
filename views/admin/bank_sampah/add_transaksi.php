<?php get_template_home('admin/header') ?>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

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
                  <li class="breadcrumb-item"><a href="#">Lokasi</a></li>
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
            <?php echo form_open_multipart(base_url('admin/bank_sampah/store_transaksi')); ?>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail Lokasi </h3>
                </div>
              </div>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nasabah</label>
                    <select class="form-control selectpicker" name="nasabah">
                      <option value="">--</option>
                      <?php foreach ($nasabah as $key => $value): ?>
                        <option data-content="<?=$value['nama_user']?><br>NIK : <?=$value['nik_user']?><br>Telp : <?=$value['no_hp_user']?>" value="<?=$value['id_user']?>"></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Lokasi</label>
                    <select class="form-control" name="lokasi">
                      <option value="">--</option>
                      <?php foreach ($lokasi as $key => $value): ?>
                        <option value="<?=$value['id_lokasi_bs']?>"><?=$value['nama_lokasi_bs']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div>
                <div class="row" id="dup">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Jenis Sampah</label>
                      <select class="form-control" name="jenis_sampah[]">
                        <option value="">--</option>
                        <?php foreach ($jenis_sampah as $key => $value): ?>
                          <option value="<?=$value['id_jenis_sampah']?>"><?=$value['kode_jenis_sampah']?> | <?=$value['nama_jenis_sampah']?> | <?=$value['satuan_jenis_sampah']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Quantity</label>
                      <input type="text" name="qty[]" class="form-control" placeholder="Qty" onkeydown="return numbersonly(this, event);">
                    </div>
                  </div>
                </div>
              </div>
              
              <button type="button" class="btn btn-success" id="btnitem">Tambah Item</button>
            </div>
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

<script type="text/javascript">
document.getElementById('btnitem').onclick = duplicate;

var i = 0;
var original = document.getElementById('dup');

function duplicate() {
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "dup" + ++i; // there can only be one element with an ID
    original.parentNode.appendChild(clone);
}
</script>

<?php get_template_home('admin/footer') ?>