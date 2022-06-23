<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Social Media</h3><hr>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                Personal Website
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Link">
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-globe"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Linked in
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Link">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Instagram
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Link">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Facebook
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Link">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Twitter
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Link">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
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