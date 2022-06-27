<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Skills</h3><hr>

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

                        <?php foreach ($skills as $key => $value): ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <strong><?=$value['skill_name']?></strong><br>
                                    <?=$value['skill_level']?>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-sm" id="<?=$value['id_user_skill']?>" onclick="editSkill(this.id, '<?=$value['skill_name']?>', '<?=$value['skill_level']?>')" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> | <a href="<?=base_url('user/skills_deactive/').$value['id_user_skill']?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Skill?')"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach ?>

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add Skill</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<?php echo form_open(base_url('user/skills_post')); ?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label>Add Skill</label>
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="text" name="skill" class="form-control" placeholder="Skill" required>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text">Level</span>
                  <select class="form-select" name="level">
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Advance</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Add Skill?')">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<?php echo form_open(base_url('user/skills_update')); ?>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label>Edit Skill</label>
        <input type="hidden" name="id_user_skill" id="id_user_skill_id">
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="text" name="skill" class="form-control" placeholder="Skill" id="skill_id" required>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text">Level</span>
                  <select class="form-select" name="level" id="level_id">
                      <option>BEGINNER</option>
                      <option>INTERMEDIATE</option>
                      <option>ADVANCE</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Save Skill?')">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
    function editSkill(id, skill, level)
    {
        document.getElementById('id_user_skill_id').value = id;
        document.getElementById('skill_id').value = skill;

        document.getElementById('level_id').innerHTML = '';

        if (level == 'BEGINNER') 
        {
            document.getElementById('level_id').innerHTML = `
            <option selected>BEGINNER</option>
            <option>INTERMEDIATE</option>
            <option>ADVANCE</option>
            `;
        }
        if (level == 'INTERMEDIATE') 
        {
            document.getElementById('level_id').innerHTML = `
            <option>BEGINNER</option>
            <option selected>INTERMEDIATE</option>
            <option>ADVANCE</option>
            `;
        }
        if (level == 'ADVANCE') 
        {
            document.getElementById('level_id').innerHTML = `
            <option>BEGINNER</option>
            <option>INTERMEDIATE</option>
            <option selected>ADVANCE</option>
            `;
        }

        
    }
</script>
        
<?php get_template_home('home/footer') ?>