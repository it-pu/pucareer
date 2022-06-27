<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Edit Experience</h3><hr>

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

                        <?php echo form_open(base_url('user/experience_update')); ?>
                        <input type="hidden" value="<?=$exp['id_user_experience']?>" name="id_user_experience">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Jobs Name
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="job" class="form-control" placeholder="Jobs Name" value="<?=$exp['job']?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Company
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name_company" class="form-control" placeholder="Company Name" value="<?=$exp['name_company']?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Industry
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" required name="industry">
                                        <option value="">-- CHOOSE INDUSTRY --</option>
                                        <?php foreach ($industry as $key => $value): ?>
                                            <option value="<?=$value['id_industry']?>" <?=selected_helper($value['id_industry'], $exp['industry'])?>><?=$value['industry_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Address
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="<?=$exp['address']?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Country
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="country" required>
                                        <?php foreach ($country as $key => $value): ?>
                                            <option value="<?=$value['id_country']?>" <?=selected_helper($value['id_country'], $exp['country'])?>><?=$value['country_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Specialization
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" name="specialization" required onchange="getRole(this)">
                                        <option value="">-- CHOOSE SPEECIALIZATION --</option>
                                        <?php foreach ($specialization as $key => $value): ?>
                                            <option value="<?=$value['id_specialization']?>" <?=selected_helper($value['id_specialization'], $exp['specialization'])?>><?=$value['specialization_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Role
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" id="role_id" name="role" required>
                                        <?php foreach ($role as $key => $value): ?>
                                            <option value="<?=$value['id_role']?>" <?=selected_helper($value['id_role'], $exp['role'])?>><?=$value['role_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Position
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select" required name="position">
                                        <option value="">-- CHOOSE POSITION --</option>
                                        <?php foreach ($position as $key => $value): ?>
                                            <option value="<?=$value['id_position']?>" <?=selected_helper($value['id_position'], $exp['position'])?>><?=$value['position_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Monthly Salary
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="id_currency" required>
                                        <?php foreach ($currency as $key => $value): ?>
                                            <option value="<?=$value['id_currency']?>" <?=selected_helper($value['id_currency'], $exp['id_currency'])?>><?=$value['currency_code']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                      <span class="input-group-text">Rp</span>
                                      <input type="text" name="monthly_salary" class="form-control" name="monthly_salary" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?=rupiah($exp['monthly_salary'])?>" required>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Date
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">Start</span>
                                      <input type="date" name="start_date" class="form-control" value="<?=$exp['start_date']?>" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">End</span>
                                      <?php if ($exp['end_date'] == '0000-00-00'): ?>
                                          <input type="date" name="end_date" class="form-control" id="end_date_id" readonly>
                                      <?php endif ?>
                                      <?php if ($exp['end_date'] != '0000-00-00'): ?>
                                          <input type="date" name="end_date" class="form-control" id="end_date_id" value="<?=$exp['end_date']?>" required>
                                      <?php endif ?>
                                      
                                    </div>
                                    <div class="form-check">
                                        <?php if ($exp['end_date'] == '0000-00-00'): ?>
                                            <input class="form-check-input" name="present" type="checkbox" value="present" id="present" onclick="presentCheck()" checked>
                                        <?php endif ?>
                                        <?php if ($exp['end_date'] != '0000-00-00'): ?>
                                            <input class="form-check-input" name="present" type="checkbox" value="present" id="present" onclick="presentCheck()">
                                        <?php endif ?>
                                      
                                      <label class="form-check-label" for="present">
                                        Present
                                      </label>
                                    </div>
                                    
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-success mb-2" onclick="return confirm('Edit Experience?')"><i class="fas fa-edit"></i> Edit Experience</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<script type="text/javascript">

function presentCheck()
{
    var present = $('#present').is(':checked'); 
    if (present == true) 
    {
        document.getElementById('end_date_id').readOnly = true;
        document.getElementById('end_date_id').required = false;
    }
    if (present == false) 
    {
        document.getElementById('end_date_id').readOnly = false;
        document.getElementById('end_date_id').required = true;
    }
}


  function getRole(dataselect) 
  {
    var id = dataselect.value;
    console.log(id);
    $.ajax({
      url : '<?=base_url('user/get_role/')?>'+id,
      type : 'GET',
      dataType : 'JSON',
      success : function (result)
      {
        document.getElementById("role_id").innerHTML = "";
        $('#role_id').append('<option value="">-- CHOOSE ROLE --</option>')
        $.each(result, function(i, data){
          $('#role_id').append
          (`
            <option value="`+data.id_role+`">`+data.role_name+`</option>
          `)
        });
      }
    });
  }
</script>
<?php get_template_home('home/footer') ?>