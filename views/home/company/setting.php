<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/company/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>About</h3><hr>

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

                        <?php echo form_open_multipart(base_url('companies/profile_update')); ?>
                        <input type="hidden" name="id_company" value="<?=$company['id_company']?>">
                            <div class="row">
                                <div class="col-md-4">
                                    Company's Name<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Name" value="<?=ucwords($company['company_name'])?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Address<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="alamat" required><?=$company['company_address']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Email
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" value="<?=$company['company_email']?>" name="company_email">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Phone Number<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                      <input type="text" name="telp" class="form-control" value="<?=$company['company_phone_number']?>" onkeypress="return isNumberKey(event);" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Website
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?=$company['company_website']?>" name="company_website">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    About Company<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="about"><?=$company['company_description']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Logo<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input accept="image/*" type='file' id="logo_c" onchange="fileValidationImage(this.id, true, 'prev_logo');" /><br>
                                    <img id="prev_logo" src="<?=base_url().$company['company_logo']?>" alt="" style="max-width: 250px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Banner<font class="required">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input accept="image/*" type='file' id="banner_c" onchange="fileValidationImage(this.id, true, 'prev_banner');" /><br>
                                    <img id="prev_banner" src="<?=base_url().$company['company_banner']?>" alt="" style="max-width: 250px;" />
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