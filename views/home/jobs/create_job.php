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
                            <h4>Post your Jobs offer here</h4><hr>
                        </center>

                        <?php echo form_open_multipart(base_url('jobs/post_job')); ?>
                        <div class="mb-3">
                            <label class="form-label">Jobs Name<font class="required">*</font></label>
                            <input type="text" class="form-control" name="job_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Country<font class="required">*</font></label>
                            <select id="country-drop" name="id_country" class="form-select" placeholder="Select Country" required onchange="getState(this)">
                                <option value="">-- CHOOSE COUNTRY --</option>
                                <?php foreach ($country as $key => $value): ?>
                                    <option value="<?=$value['id_country']?>"><?=$value['country_name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3" id="state_div">
                            <label class="form-label">State<font class="required">*</font></label>
                            <select id="state-drop" class="form-select" name="id_state" placeholder="Select Provence" required>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Offer Expiration Date<font class="required">*</font></label>
                            <input type="date" class="form-control" name="expired_at" value="<?=substr(plusmonth(date('Y-m-d')), 0, 10)?>">
                        </div>

                        <hr>

                        <h5><strong>Hightlights</strong></h5>

                        <div id="main_high">
                            <div class="row mb-3 g-3 align-items-center">
                              <div class="col-1">
                                <label class="col-form-label">*</label>
                              </div>
                              <div class="col-11">
                                <input type="text" name="highlight[]" class="form-control" >
                              </div>
                            </div>
                        </div>
                            
                        <div id="hightlightadd">
                            
                        </div>

                        <div class="row justify-content-center">
                           <button type="button" class="btn btn-success btn-sm w-50" onclick="addHightlight()">Add Highlight</button> 
                        </div>
                        
                        <hr>
                        <div class="mb-3">
                            <h5><strong>Jobs Requirement</strong><font class="required">*</font></h5>
                            <textarea id="requirement" name="job_requirement"></textarea>
                        </div>

                        <hr>
                        <div class="mb-3">
                            <h5><strong>Jobs Description</strong><font class="required">*</font></h5>
                            <textarea id="description" name="job_description"></textarea>
                        </div>

                        

                        <hr>
                        <h5><strong>Additional Info</strong></h5>
                        <div class="mb-3">
                            <label class="form-label">Career Level</label>
                            <select class="form-select" name="job_career_level">
                                <option value="">-- CHOOSE CAREER LEVEL --</option>
                                <option value="CEO / GM / Director / Senior Manager">CEO / GM / Director / Senior Manager</option>
                                <option value="Manager / Assistant Manager">Manager / Assistant Manager</option>
                                <option value="Supervisor / Coordinator">Supervisor / Coordinator</option>
                                <option value="Staff">Staff</option>
                                <option value="Fresh Grad.">Fresh Grad.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Years of Experience</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="job_years_experience"  onkeypress="return isNumberKey(event);" max="2">
                              <div class="input-group-append">
                                <span class="input-group-text">Years</span>
                              </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qualification</label>
                            <select class="form-select" name="job_qualification">
                                <option value="">-- CHOOSE QUALIFICATION --</option>
                                <option value="SMU">SMU</option>
                                <option value="Associate Degree">Associate Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree / Post Graduate Degree">Master's Degree / Post Graduate Degree</option>
                                <option value="Doctorate">Doctorate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Type</label>
                            <select class="form-select" name="job_type">
                                <option value="">-- CHOOSE JOB TYPE --</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Project-based">Project Based</option>
                            </select>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Job Specialization</label>
                            <select class="form-select" name="id_specialization[]" id="specialization-select" multiple="multiple" required>
                                <option value="">-- CHOOSE SPEECIALIZATION --</option>
                                <?php foreach ($specialization as $key => $value): ?>
                                    <option value="<?=$value['id_specialization']?>"><?=$value['specialization_name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <hr>
                        <h5><strong>Question (Optional)</strong></h5>
                        <div class="mb-3">
                            <input type="hidden" value="1" id="number_q">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">1</span>
                              </div>
                              <input type="text" class="form-control" name="question[]">
                            </div>
                        </div>

                        <div id="question_add">
                            
                        </div>

                        <div class="row justify-content-center mb-3">
                           <button type="button" class="btn btn-success btn-sm w-50" onclick="addQuestion()">Add Question</button> 
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Save Data?')">Post Jobs</button>
                        </form>

                        <br>
                        <br>
                        <center>
                            <a href="<?=base_url('companies/jobs_offer')?>">Back to Career Portal</a>
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

function addHightlight()
{
    var myDiv = document.getElementById("main_high").innerHTML;
    $('#hightlightadd').append(myDiv);
}

function addQuestion()
{
    var numberQ = parseInt(document.getElementById('number_q').value);
    numberQ += 1;

    var Qfill =  `<div class="mb-3">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">`+numberQ+`</span>
                          </div>
                          <input type="text" class="form-control" name="question[]">
                        </div>
                    </div>`;
    $('#question_add').append(Qfill);
    document.getElementById('number_q').value = numberQ;
}

$(document).ready(function() {
    $('#industry-drop').select2();
    $('#country-drop').select2();
    $('#state-drop').select2();

    $('#requirement').summernote();
    $('#description').summernote();
});

$('#specialization-select').select2();
</script>

</body>

</html>