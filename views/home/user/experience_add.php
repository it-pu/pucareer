<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Add Experience</h3><hr>

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

                        <?php echo form_open(base_url('user/experience_post')); ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Jobs Name
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="job" class="form-control" placeholder="Jobs Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Company
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name_company" class="form-control" placeholder="Company Name" required>
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
                                            <option value="<?=$value['id_industry']?>"><?=$value['industry_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Address
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Country
                                </div>
                                <div class="col-md-8">
                                    <select id="country-select" name="country" class="form-select" placeholder="Select Country" required onchange="getState(this)">
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
                                    <select id="state-select" class="form-select" name="state" placeholder="Select State" required>
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
                                            <option value="<?=$value['id_specialization']?>"><?=$value['specialization_name']?></option>
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
                                            <option value="<?=$value['id_position']?>"><?=$value['position_name']?></option>
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
                                            <option value="<?=$value['id_currency']?>" <?=selected_helper('IDR', $value['currency_code'])?>><?=$value['currency_code']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                      <span class="input-group-text">Rp</span>
                                      <input type="text" name="monthly_salary" class="form-control" name="monthly_salary" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
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
                                      <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">End</span>
                                      <input type="date" name="end_date" class="form-control" id="end_date_id" required>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" name="present" type="checkbox" value="present" id="present" onclick="presentCheck()">
                                      <label class="form-check-label" for="present">
                                        Present
                                      </label>
                                    </div>
                                    
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary mb-2" onclick="return confirm('Add Experience?')"><i class="fas fa-plus"></i> Add Experience</button>
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