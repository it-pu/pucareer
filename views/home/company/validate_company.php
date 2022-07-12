<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Career Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo get_template_directory('front/img/favicon.ico') ;?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo get_template_directory('front/lib/animate/animate.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo get_template_directory('front/lib/owlcarousel/assets/owl.carousel.min.css') ;?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo get_template_directory('front/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo get_template_directory('front/css/style.css') ;?>" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body style="background-color: #bdc3c7;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card shadow-lg mb-3">
                    <div class="card-body">
                        <center>
                            <h4>Validate Company</h4><hr>
                            Thank you for your validation, to complete the registration please add information about your Company.<br><br>
                        </center>

                        <?php if ($this->session->flashdata('error')): ?>
                          <div class="alert alert-danger" role="alert">
                            <?=$this->session->flashdata('error')?>
                          </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('success')): ?>
                          <div class="alert alert-success" role="alert">
                            <?=$this->session->flashdata('success')?>
                          </div>
                        <?php endif ?>

                        <?php echo form_open_multipart(base_url('companies/validate_company_post')); ?>
                        <div class="mb-3">
                            <label class="form-label">Company's Name</label><font class="required">*</font>
                            <input type="text" class="form-control" name="company_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Industry</label><font class="required">*</font>
                            <select name="id_industry" class="form-select" id="industry-drop" placeholder="Select Industry" required>
                                <option value="">-- CHOOSE INDUSTRY --</option>
                                <?php foreach ($industry as $key => $value): ?>
                                        <option value="<?=$value['id_industry']?>"><?=$value['industry_name']?></option>
                                    <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company's Address</label><font class="required">*</font>
                            <input type="text" class="form-control" name="company_address" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Country</label><font class="required">*</font>
                            <select id="country-drop" name="id_country" class="form-select" placeholder="Select Country" required onchange="getState(this)">
                                <option value="">-- CHOOSE COUNTRY --</option>
                                <?php foreach ($country as $key => $value): ?>
                                    <option value="<?=$value['id_country']?>"><?=$value['country_name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3" id="state_div">
                            <label class="form-label">State</label><font class="required">*</font>
                            <select id="state-drop" class="form-select" name="id_state" placeholder="Select Provence" required>
                            </select>
                        </div>

                        <div class="mb-3" id="state_div">
                            <label class="form-label">Phone Number</label><font class="required">*</font>
                            <input type="text" name="company_phone_number" class="form-control" onkeypress="return isNumberKey(event);" required>
                        </div>

                        <div class="mb-3" id="state_div">
                            <label class="form-label">Email</label>
                            <input type="text" name="company_email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label><font class="required">*</font>
                            <textarea class="form-control" name="company_description" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo</label><font class="required">*</font>
                            <input accept="image/*" type='file' name="company_logo" id="logo_img" onchange="preview_img('prev_logo')" required/><br>
                            <img id="prev_logo" src="" alt="" style="max-width: 200px;" />
                        </div>

                        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Save Data?')">Save</button>
                        </form>

                        <br>
                        <br>
                        <a href="<?=base_url('logout')?>"><<< Logout</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- JavaScript Libraries -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory('front/lib/wow/wow.min.js') ;?>"></script>
<script src="<?php echo get_template_directory('front/lib/easing/easing.min.js') ;?>"></script>
<script src="<?php echo get_template_directory('front/lib/waypoints/waypoints.min.js') ;?>"></script>
<script src="<?php echo get_template_directory('front/lib/owlcarousel/owl.carousel.min.js') ;?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

<!-- Template Javascript -->
<script src="<?php echo get_template_directory('front/js/function.js') ;?>"></script>
<script src="<?php echo get_template_directory('front/js/main.js') ;?>"></script>

<script type="text/javascript">
function getState(dataselect) 
{
    var id = dataselect.value;
    $.ajax({
      url : '<?=base_url('country/get_state/')?>'+id,
      type : 'GET',
      dataType : 'JSON',
      success : function (result)
      {
        document.getElementById("state-drop").innerHTML = "";
        $('#state-drop').append('<option value="">-- CHOOSE STATE --</option>')
        $.each(result, function(i, data){
          $('#state-drop').append
          (`
            <option value="`+data.id_state+`">`+data.state_name+`</option>
          `)
        });
      }
    });
}

$(document).ready(function() {
    $('#industry-drop').select2();
    $('#country-drop').select2();
    $('#state-drop').select2();
});
</script>

</body>

</html>