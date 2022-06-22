<?php get_template_home('home/header') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Setting Password</h3><hr>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                Old Password*
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                New Password*
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Confirm Password*
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="form-control" placeholder="(Min 6 Character)" required> 
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