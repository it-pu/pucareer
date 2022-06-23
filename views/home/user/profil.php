<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Profil</h3><hr>

                        <div class="row">
                            <div class="col-md-4">
                                Nama :
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Nama" value="Fajar Ramadhan">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                Address :
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control">Ini Alamat Fajar</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                Email :
                            </div>
                            <div class="col-md-8">
                                fajar.santoso@podomorouniversity.ac.id | <a href="<?=base_url('user/setting/setting_email')?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                No. HP :
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                  <span class="input-group-text">+62</span>
                                  <input type="text" class="form-control" placeholder="No HP" value="81288887777" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                About me
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control">Hello my name is Fajar, I'm a tech savvy especially in programming and computer hardware. I'm start coding since 2016 and I'd love to follow anything related to computer hardware.
                                I'm focused on PHP (CodeIgniter & Laravel), and MySql including backend API.</textarea>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>