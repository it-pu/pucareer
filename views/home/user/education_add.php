<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Add Education</h3><hr>

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
                        <?php echo form_open(base_url('user/education_post')); ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Institue / University
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="university_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Graduation Date
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-text">Month</span>
                                        <select class="form-select" name="graduation_month" required>
                                            <option value="">-- MONTH --</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-text">Year</span>
                                        <select class="form-select" name="graduation_year" required>
                                            <?php for ($i=date('Y'); $i > 1920; $i--): ?>
                                                <option value="<?=$i?>"><?=$i?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Country
                                </div>
                                <div class="col-md-8">
                                    <select id="country-select" name="id_country" class="form-select" placeholder="Select Country" required onchange="getState(this)">
                                        <option value="">-- CHOOSE COUNTRY --</option>
                                        <?php foreach ($country as $key => $value): ?>
                                            <option value="<?=$value['id_country']?>"><?=$value['country_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    State
                                </div>
                                <div class="col-md-8">
                                    <select id="state-select" class="form-select" name="id_state" placeholder="Select State" required>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Qualification
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="qualification" required>
                                        <option value="">-- CHOOSE QUALIFICATION --</option>
                                        <option value="SMU">SMU</option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                                        <option value="Master's Degree / Post Graduate Degree">Master's Degree / Post Graduate Degree</option>
                                        <option value="Doctorate">Doctorate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Field of Study
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="id_field_of_study" required>
                                        <option value="">-- CHOOSE FIELD OF STUDY --</option>
                                        <?php foreach ($fos as $key => $value): ?>
                                            <option value="<?=$value['id_field_of_study']?>"><?=$value['field_of_study_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Major
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="major" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Grade
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="grade" onchange="gradeChange(this);">
                                        <option value="">-- CHOOSE GRADE --</option>
                                        <option value="cgpa">CGPA</option>
                                        <option value="incomplete">Incomplete</option>
                                        <option value="ongoing">On-going</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Score
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="score" id="score_id" readonly>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-text">Out of</span>
                                        <input type="text" class="form-control" name="score_out_of" id="out_of_id" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Additional Info
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="additional_info"></textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Add Education?')"><i class="fas fa-edit"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        document.getElementById("state-select").innerHTML = "";
        $('#state-select').append('<option value="">-- CHOOSE STATE --</option>')
        $.each(result, function(i, data){
          $('#state-select').append
          (`
            <option value="`+data.id_state+`">`+data.state_name+`</option>
          `)
        });
      }
    });
}
function gradeChange(dataselect) 
{
    var val = dataselect.value;
    if (val == 'cgpa') 
    {
        document.getElementById("score_id").readOnly = false;
        document.getElementById("out_of_id").readOnly = false;
    }
    else
    {
        document.getElementById("score_id").readOnly = true;
        document.getElementById("out_of_id").readOnly = true;
    }
}
</script>
        
<?php get_template_home('home/footer') ?>