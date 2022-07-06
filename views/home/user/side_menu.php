            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <a href="<?=base_url('user')?>" style="text-decoration: none; color: #666565;">
                                <?php if ($this->sess['user_image'] != ''): ?>
                                    <img src="<?=base_url().$this->sess['user_image']?>" class="img-fluid w-50 pt-3 mb-3">
                                <?php endif ?>
                            <br>
                            <?=$this->sess['user_name']?><br></a>
                            <span class="badge bg-primary">PREMIUM</span><br><br>
                            <strong>SETTINGS</strong>
                        </center>
                        <ul class="list-group list-group-flush mt-3">
                            <a href="<?=base_url('user/profile')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'profile', 'active')?>"><i class="fas fa-user"></i> Profile</li></a>
                            <a href="<?=base_url('user/experience')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'experience', 'active')?>"><i class="fas fa-briefcase"></i> Experience</li></a>
                            <a href="<?=base_url('user/application_history')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'application_history', 'active')?>"><i class="fas fa-history"></i> Application History</li></a>
                            <a href="<?=base_url('user/education')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'education', 'active')?>"><i class="fas fa-university"></i> Education</li></a>
                            <a href="<?=base_url('user/skills')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'skills', 'active')?>"><i class="fas fa-list"></i> Skills</li></a>
                            <a href="<?=base_url('user/resume')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'resume', 'active')?>"><i class="fas fa-file-contract"></i> Resume</li></a>
                            <a href="<?=base_url('user/social_media')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'social_media', 'active')?>"><i class="fas fa-link"></i> Social Media</li></a>
                            <a href="<?=base_url('user/setting')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'setting', 'active')?>"><i class="fas fa-cog"></i> Account Setting</li></a>
                            <a href="<?=base_url('logout')?>"><li class="list-group-item"><i class="fas fa-sign-out-alt"></i> Logout</li></a>
                      </ul>
                    </div>
                </div>
            </div>      