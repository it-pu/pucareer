            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <a href="<?=base_url('companies/profile')?>" style="text-decoration: none; color: #666565;">
                                <?php if ($this->sess['company_logo'] != ''): ?>
                                    <img src="<?=base_url().$this->sess['company_logo']?>" class="img-fluid w-50 pt-3 mb-3">
                                <?php endif ?>
                            <br>
                            <?=$this->sess['company_name']?></a><br><br>
                            <strong>SETTINGS</strong>
                        </center>
                        <ul class="list-group list-group-flush mt-3">
                            <a href="<?=base_url('companies/setting')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'setting', 'active')?>"><i class="fas fa-info"></i> About</li></a>
                            <a href="<?=base_url('companies/gallery_setting')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'gallery_setting', 'active')?>"><i class="fas fa-image"></i> Gallery</li></a>
                            <a href="<?=base_url('companies/jobs_offer')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'jobs_offer', 'active')?>"><i class="fas fa-list"></i> Jobs Offer</li></a>
                            <a href="<?=base_url('companies/account_setting')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'account_setting', 'active')?>"><i class="fas fa-cog"></i> Account Setting</li></a>
                            <a href="<?=base_url('logout')?>"><li class="list-group-item"><i class="fas fa-sign-out-alt"></i> Logout</li></a>
                      </ul>
                    </div>
                </div>
            </div>      