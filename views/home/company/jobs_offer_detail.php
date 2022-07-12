<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/company/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Jobs Detail</h3><hr>

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
                        <div class="col-md-12">
                            <h5><strong>Description</strong></h5>
                            <?=$job['job_description']?>
                        </div>
                        <div class="col-md-12">
                            <h5><strong>Requirement</strong></h5>
                            <?=$job['job_requirement']?><br>
                        </div>
                            

                        <h5><strong>Additional Info</strong></h5>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Career Level</strong>
                            </div>
                            <div class="col-md-8">
                                <?=$job['job_career_level']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Years of Experience</strong>
                            </div>
                            <div class="col-md-8">
                                <?=$job['job_years_experience']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Job Specializations</strong>
                            </div>
                            <div class="col-md-8">
                                <?php foreach ($specialization as $key => $value): ?>
                                    <?=$value['specialization_name']?><br>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Qualification</strong>
                            </div>
                            <div class="col-md-8">
                                <?=$job['job_qualification']?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Job Type</strong>
                            </div>
                            <div class="col-md-8">
                                <?=$job['job_type']?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Expired Date</strong>
                            </div>
                            <div class="col-md-8">
                                <?=tgl_en($job['expired_at'])?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">
                                <strong>Status</strong>
                            </div>
                            <div class="col-md-8">
                                <?php if ($job['job_active'] == 1): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php endif ?>
                                <?php if ($job['job_active'] == 0): ?>
                                    <span class="badge bg-danger">Deactive</span>
                                <?php endif ?>
                                <br>
                            </div>
                        </div>

                        <?php if ($job['job_active'] == 1): ?>
                            <a href="<?=base_url('companies/deactive_job/').$job['id_job']?>" onclick="return confirm('Deactive Job Offer?')" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Deactivate Offer</a>
                        <?php endif ?>
                        <?php if ($job['job_active'] == 0): ?>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#activateModal" onclick="activateJob('<?=$value['id_job']?>')" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Activate Offer</button>
                        <?php endif ?>
                        

                        <hr>
                        <h5><strong>Applicant List</strong></h5>

                        <?php foreach ($applicant as $key => $value): ?>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5><?=strtoupper($value['user_name'])?> (<?=get_years_old($value['birth_date'])?>)</h5>
                                            <?=$value['state_name']?>, <?=$value['country_name']?><br>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-sm" id="<?=$value['id_apply']?>" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="applicantDetail(this.id)"><i class="fas fa-info"></i> Detail</button> <a href="<?=base_url('user/resume_download/').$value['id_user_resume']?>" class="btn btn-primary btn-sm"> <i class="fas fa-download"></i> Resume</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Applicant Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
        <div id="questioner_div" class="mb-3">
        </div>

        <h5>Introduction</h5>
        <div id="intro_id">
        </div>
                
        <hr>
        <h4>Profile</h4>
            <div class="row mb-2">
                <div class="col-md-4">
                    Name
                </div>
                <div class="col-md-8">
                    <strong id="name_id"></strong>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    Address
                </div>
                <div class="col-md-8" id="address_id">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    Birth Date
                </div>
                <div class="col-md-8" id="birth_date_id">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    Email
                </div>
                <div class="col-md-8" id="email_id">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    Phone Number
                </div>
                <div class="col-md-8" id="phone_id">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    About Fajar
                </div>
                <div class="col-md-8" id="about_id">
                </div>
            </div>
        <hr>
        <h4>Experience</h4>
            <div id="experience_div"></div>
        <hr>
        <h4>Skills</h4>
            <div id="skills_div"></div>
        <hr>
        <h4>Education</h4>
            <div id="education_div"></div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <a href="#" id="resume_id_file" class="btn btn-primary"> <i class="fas fa-download"></i> Resume</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<?php echo form_open(base_url('companies/activate_job/')); ?>
<div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="activateModalLabel">Activate Job</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
        <input type="hidden" name="id_job" id="active_job_id">
        <div class="mb-3">
            <label class="form-label">Expired Date<font class="required">*</font></label>
            <input type="date" class="form-control" name="expired_at" value="<?=substr(plusmonth(date('Y-m-d')), 0, 10)?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Activate Job?')"><i class="fas fa-check"></i> Activate Job</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
function applicantDetail(id_apply)
{
    $.ajax({
      url : '<?=base_url('companies/applicant_form/')?>'+id_apply,
      type : 'GET',
      dataType : 'JSON',
      success : function (result)
      {
        console.log(result[6]);
        document.getElementById('resume_id_file').href = result[6];

        document.getElementById('questioner_div').innerHTML = ``;
        if (result[1].length != 0) 
        {
            document.getElementById('questioner_div').innerHTML = `
                <div class="card shadow">
                     <div class="card-body">
                        <h5>Questioner</h5><br>
                        <div id="questioner_div_isi"></div>
                     </div>
                </div>`;

            $.each(result[1], function(i, data){
              $('#questioner_div_isi').append
              (`
                <label><strong>`+data.question_value+`</strong></label><br>
                <p>`+result[2][i].answer_value+`</p>
              `)
            });
        }
        console.log(result[0].id_user);

        document.getElementById('intro_id').innerHTML = result[0].applicant_introduction;
        var linkuser = `<a href="<?=base_url('user/')?>?u=`+result[0].id_user+`">`+result[0].user_name+`</a>`;
        var tomboldetail = `<a href="<?=base_url('user/')?>?u=`+result[0].id_user+`" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>`;
        document.getElementById('name_id').innerHTML = linkuser+' '+tomboldetail;
        document.getElementById('address_id').innerHTML = result[0].user_address;
        document.getElementById('birth_date_id').innerHTML = result[0].birth_date;
        document.getElementById('phone_id').innerHTML = result[0].user_phone_number;
        document.getElementById('email_id').innerHTML = result[0].user_email;
        document.getElementById('about_id').innerHTML = result[0].about_user;

        document.getElementById('experience_div').innerHTML = '';
        $.each(result[3], function(i, data){
            var skrg = 'Present';
            var rup = data.monthly_salary.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            if (data.end_date != '0000-00-00') 
            {
                skrg = data.end_date;
            }
          $('#experience_div').append
          (`
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <small>`+data.start_date+` - `+skrg+`</small><br>
                            <strong>`+data.job+`</strong><br>
                            `+data.name_company+`<br>`+data.state_name+`, `+data.country_name+`
                        </div>
                        <div class="col-md-7 mb-3" style="font-size:12px">
                            <div class="row">
                                <div class="col-5">
                                    Industri
                                </div>
                                <div class="col-7">
                                    <strong>`+data.industry_name+`</strong>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-5">
                                    Specialization
                                </div>
                                <div class="col-7">
                                    <strong>`+data.specialization_name+`</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    Role
                                </div>
                                <div class="col-7">
                                    <strong>`+data.role_name+`</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    Position
                                </div>
                                <div class="col-7">
                                    <strong>`+data.position_name+`</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    Monthly Salary
                                </div>
                                <div class="col-7">
                                    <strong>IDR `+rup+`</strong>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
          `)
        });

        document.getElementById('skills_div').innerHTML = '';
        $.each(result[4], function(i, data){
          $('#skills_div').append
          (`
            <div class="card shadow mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>`+data.skill_name+`</strong><br>
                            `+data.skill_level+`
                        </div>
                    </div>
                </div>
            </div>
                    
          `)
        });

        console.log(result[5]);

        document.getElementById('education_div').innerHTML = '';
        $.each(result[5], function(i, data){
          $('#education_div').append
          (`
            <div class="card shadow mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            `+data.graduation_month+` `+data.graduation_year+`
                        </div>
                        <div class="col-md-8">
                            <strong>`+data.university_name+`</strong> | `+data.university_name+`<br>
                            `+data.qualification+` of `+data.field_of_study_name+` | `+data.major+`
                        </div>
                    </div>
                </div>
            </div>
          `)
        });
      }
    });
}  

function activateJob(id_job)
{
    document.getElementById('active_job_id').value = id_job;
} 
</script>
        
<?php get_template_home('home/footer') ?>