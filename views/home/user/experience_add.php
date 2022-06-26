<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Add Experience</h3><hr>

                        <?php echo form_open(base_url('user/experience_add')); ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Jobs Name
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Jobs Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Company
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Company Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Address
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Address" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Country
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select">
                                        <?php foreach ($country as $key => $value): ?>
                                            <option value="<?=$value['id_country']?>"><?=$value['country_name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Specialization
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Specialization" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Role
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Role" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Position
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" placeholder="Position" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Monthly Salary
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="currency">
                                        <?php foreach ($currency as $key => $value): ?>
                                            <option value="<?=$value['id_currency']?>" <?=selected_helper('IDR', $value['currency_code'])?>><?=$value['currency_code']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">Rp</span>
                                      <input type="text" name="telp" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
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
                                      <input type="date" name="telp" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">End</span>
                                      <input type="date" name="telp" class="form-control" required>
                                    </div>
                                    
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Add Experience</button>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>