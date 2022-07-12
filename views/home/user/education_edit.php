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
                        <?php echo form_open(base_url('user/education_update')); ?>
                        <input type="hidden" name="id_user_education" value="<?=$edu['id_user_education']?>">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Institue / University
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="university_name" class="form-control" value="<?=$edu['university_name']?>" required>
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
                                            <option value="January" <?=selected_helper('January', $edu['graduation_month'])?>>January</option>
                                            <option value="February" <?=selected_helper('February', $edu['graduation_month'])?>>February</option>
                                            <option value="March" <?=selected_helper('March', $edu['graduation_month'])?>>March</option>
                                            <option value="April" <?=selected_helper('April', $edu['graduation_month'])?>>April</option>
                                            <option value="May" <?=selected_helper('May', $edu['graduation_month'])?>>May</option>
                                            <option value="June" <?=selected_helper('June', $edu['graduation_month'])?>>June</option>
                                            <option value="July" <?=selected_helper('July', $edu['graduation_month'])?>>July</option>
                                            <option value="August" <?=selected_helper('August', $edu['graduation_month'])?>>August</option>
                                            <option value="September" <?=selected_helper('September', $edu['graduation_month'])?>>September</option>
                                            <option value="October" <?=selected_helper('October', $edu['graduation_month'])?>>October</option>
                                            <option value="November" <?=selected_helper('November', $edu['graduation_month'])?>>November</option>
                                            <option value="December" <?=selected_helper('December', $edu['graduation_month'])?>>December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-text">Year</span>
                                        <select class="form-select" name="graduation_year" required>
                                            <?php for ($i=date('Y'); $i > 1920; $i--): ?>
                                                <option value="<?=$i?>" <?=selected_helper($i, $edu['graduation_year'])?>><?=$i?></option>
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
                                            <option value="<?=$value['id_country']?>" <?=selected_helper($value['id_country'], $edu['id_country'])?>><?=$value['country_name']?></option>
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
                                        <?php foreach ($state as $key => $value): ?>
                                            <option value="<?=$value['id_state']?>" <?=selected_helper($value['id_state'], $edu['id_state'])?>><?=$value['state_name']?></option>
                                        <?php endforeach ?>
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
                                        <option value="SMU" <?=selected_helper('SMU', $edu['qualification'])?>>SMU</option>
                                        <option value="Associate Degree" <?=selected_helper('Associate Degree', $edu['qualification'])?>>Associate Degree</option>
                                        <option value="Bachelor's Degree" <?=selected_helper("Bachelor's Degree", $edu['qualification'])?>>Bachelor's Degree</option>
                                        <option value="Master's Degree / Post Graduate Degree" <?=selected_helper("Master's Degree / Post Graduate Degree", $edu['qualification'])?>>Master's Degree / Post Graduate Degree</option>
                                        <option value="Doctorate" <?=selected_helper("Doctorate", $edu['qualification'])?>>Doctorate</option>
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
                                            <option value="<?=$value['id_field_of_study']?>" <?=selected_helper($value['id_field_of_study'], $edu['id_field_of_study'])?>><?=$value['field_of_study_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Major
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="major" value="<?=$edu['major']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Grade
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="grade" onchange="gradeChange(this);">
                                        <option value="">-- CHOOSE GRADE --</option>
                                        <option value="cgpa" <?=selected_helper("cgpa", $edu['grade'])?>>CGPA</option>
                                        <option value="incomplete" <?=selected_helper("incomplete", $edu['grade'])?>>Incomplete</option>
                                        <option value="ongoing" <?=selected_helper("ongoing", $edu['grade'])?>>On-going</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Score
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="score" value="<?=$edu['score']?>" id="score_id" readonly>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-text">Out of</span>
                                        <input type="text" class="form-control" value="<?=$edu['score_out_of']?>" name="score_out_of" id="out_of_id" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Additional Info
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="additional_info"><?=$edu['additional_info']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Save Education?')"><i class="fas fa-edit"></i> Save</button>
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
var grade = "<?=$edu['grade']?>";
$( document ).ready(function() 
{
    if (grade == 'cgpa') 
    {
        document.getElementById("score_id").readOnly = false;
        document.getElementById("out_of_id").readOnly = false;
    }
});

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