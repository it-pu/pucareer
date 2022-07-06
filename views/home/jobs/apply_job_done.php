<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobs Offer</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                            <h3>Thank you for submitting the form</h3><hr>
                            You will automatically directed to jobs page in 5 seconds, <a href="<?=base_url('jobs')?>">click here</a> if nothing happen. 
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- JavaScript Libraries -->


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
$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "<?=base_url('jobs')?>";
    }, 5000);
});
</script>
</body>

</html>