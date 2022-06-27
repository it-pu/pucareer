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
                                    Name :
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Name" value="<?=ucwords($detail['nama_user'])?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Address :
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="alamat" required><?=$detail['alamat_user']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Email :
                                </div>
                                <div class="col-md-8">
                                    <?=$detail['email_user']?> | <a href="<?=base_url('user/setting/setting_email')?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Phone Number :
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">+62</span>
                                      <input type="text" name="telp" class="form-control" placeholder="No HP" value="<?=$detail['telp_user']?>" onkeypress="return isNumberKey(event);" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    About me :
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="about">Hello my name is Fajar, I'm a tech savvy especially in programming and computer hardware. I'm start coding since 2016 and I'd love to follow anything related to computer hardware.
                                    I'm focused on PHP (CodeIgniter & Laravel), and MySql including backend API.</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Image :
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="foto_user" id="file"  >
                                    <div id="previewpic" class="mt-2"><img src="<?=base_url().$detail['foto_user']?>" alt class="img-fluid" style="width: 250px;"></div>
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