<?php get_template_home('home/header') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Setting Email</h3><hr>

                        <div class="row">
                            <div class="col-md-4">
                                New Email
                            </div>
                            <div class="col-md-4">
                                <input type="email" class="form-control" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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