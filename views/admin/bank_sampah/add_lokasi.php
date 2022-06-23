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
            <?php echo form_open_multipart(base_url('admin/bank_sampah/store_lokasi')); ?>
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
                    <label class="form-control-label" for="input-username">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                </div>
              </div>

              <div class="card card-default">
                <div class="card-body" id="idlokasiview">
                    <font style="color: red;">* </font><label for="Lokasi">Lokasi :</label><br>
                     <div id="mapid" style="height: 400px;"></div><br>
                    <div class="form-group">
                      <label for="notelp">Latitude :</label>
                      <input type="text" name="lat" class="form-control" id="idlat" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="notelp">Longitude :</label>
                      <input type="text" name="lon" class="form-control" id="idlon" readonly required>
                    </div>
                </div>
              </div>
                
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah Bank Sampah</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

<script>
var map = L.map('mapid').setView([-6.66902405665009, 106.85449985081574], 15);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFqYXJycHMiLCJhIjoiY2sxZjV5bHF1MG02ZTNjbXVvdHIwbGFubSJ9.PFFxGb-ySoloszNTzKXjbQ', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZmFqYXJycHMiLCJhIjoiY2sxZjV5bHF1MG02ZTNjbXVvdHIwbGFubSJ9.PFFxGb-ySoloszNTzKXjbQ'
}).addTo(map);


// map.on('click', function(e) {
//     alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)

// });

var new_event_marker;  // replace marker

map.on('click', function(e) {

 if(typeof(new_event_marker)==='undefined')
 {
  new_event_marker = new L.marker(e.latlng,{ draggable: true});
  new_event_marker.addTo(map);        
 }
 else 
 {
  new_event_marker.setLatLng(e.latlng);         
 }

 document.getElementById("idlat").value = e.latlng.lat;
 document.getElementById("idlon").value = e.latlng.lng;
});

// var stuSplit = L.latLng(55.4411764, 11.7928708);
// var myMarker = L.circleMarker(stuSplit, 
//     { title: 'unselected' })
//         .addTo(map);
// alert(myMarker.getLatLng());
</script>
<?php get_template_home('admin/footer') ?>