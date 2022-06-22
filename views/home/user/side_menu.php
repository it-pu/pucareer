            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <center>
                            <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" class="img-fluid w-50 pt-3 mb-3">
                            <br>
                            Fajar Ramadhan<br>
                            <span class="badge bg-primary">PREMIUM</span>
                        </center>
                        <ul class="list-group list-group-flush mt-3">
                            <a href="<?=base_url('user/')?>"><li class="list-group-item <?=is_active_page_print_rep(2, '', 'active')?>"><i class="fas fa-user"></i> Profil</li></a>
                            <a href="<?=base_url('user/application_history')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'application_history', 'active')?>"><i class="fas fa-history"></i> Application History</li></a>
                            <a href="<?=base_url('user/education')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'education', 'active')?>"><i class="fas fa-university"></i> Education</li></a>
                            <a href="<?=base_url('user/skills')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'skills', 'active')?>"><i class="fas fa-list"></i> Skills</li></a>
                            <a href="<?=base_url('user/setting')?>"><li class="list-group-item <?=is_active_page_print_rep(2, 'setting', 'active')?>"><i class="fas fa-cog"></i> Setting</li></a>
                            <a href="<?=base_url('logout')?>"><li class="list-group-item"><i class="fas fa-sign-out-alt"></i> Logout</li></a>
                      </ul>
                    </div>
                </div>
            </div>      