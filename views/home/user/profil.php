<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Profil</h3><hr>

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

                        <?php echo form_open_multipart(base_url('user/profile_update')); ?>
                        <input type="hidden" name="id_user" value="<?=$detail['id_user']?>">
                            <div class="row">
                                <div class="col-md-4">
                                    Name<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Name" value="<?=ucwords($detail['user_name'])?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Address<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="alamat" required><?=$detail['user_address']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Birth Date<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="birth_date" value="<?=$detail['birth_date']?>" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Email<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <?=$detail['user_email']?> | <a href="<?=base_url('user/setting/setting_email')?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Phone Number<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">+62</span>
                                      <input type="text" name="telp" class="form-control" placeholder="No HP" value="<?=$detail['user_phone_number']?>" onkeypress="return isNumberKey(event);" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    About me
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="about"><?=$detail['about_user']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Image
                                </div>
                                <div class="col-md-8">
                                    <input accept="image/*" type='file' id="user_image" name="user_image" onchange="fileValidationImage(this.id, true, 'prev_logo');" /><br>
                                    <img id="prev_logo" src="<?=base_url().$detail['user_image']?>" alt="" style="max-width: 250px;" />
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Update Data?')"><i class="fas fa-edit"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>