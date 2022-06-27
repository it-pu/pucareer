<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Social Media</h3><hr>

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

                        <?php echo form_open(base_url('user/social_media_update')); ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Personal Website
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" name="website_user" class="form-control" placeholder="Link" value="<?=$user['website_user']?>">
                                        </div>
                                        <div class="col-2">
                                            <?php if (!empty($user['website_user'])): ?>
                                                <a href="<?=$user['website_user']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-globe"></i></a>
                                            <?php endif ?>
                                            <?php if (empty($user['website_user'])): ?>
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-globe"></i></button>
                                            <?php endif ?>
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
                                        <div class="col-10">
                                            <input type="text" name="linked_in_link" class="form-control" placeholder="Link" value="<?=$user['linked_in_link']?>">
                                        </div>
                                        <div class="col-2">
                                            <?php if (!empty($user['linked_in_link'])): ?>
                                                <a href="<?=$user['linked_in_link']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i></a>
                                            <?php endif ?>
                                            <?php if (empty($user['linked_in_link'])): ?>
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i></button>
                                            <?php endif ?>
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
                                            <input type="text" name="ig_link" class="form-control" placeholder="Link" value="<?=$user['ig_link']?>">
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="ig_username" class="form-control" placeholder="Username" value="<?=$user['ig_username']?>">
                                        </div>
                                        <div class="col-2">
                                            <?php if (!empty($user['ig_link'])): ?>
                                                <a href="<?=$user['ig_link']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-instagram"></i></a>
                                            <?php endif ?>
                                            <?php if (empty($user['ig_link'])): ?>
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-instagram"></i></button>
                                            <?php endif ?>
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
                                            <input type="text" name="fb_link" class="form-control" placeholder="Link" value="<?=$user['fb_link']?>">
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="fb_username" class="form-control" placeholder="Username" value="<?=$user['fb_username']?>">
                                        </div>
                                        <div class="col-2">
                                            <?php if (!empty($user['fb_link'])): ?>
                                                <a href="<?=$user['fb_link']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-facebook"></i></a>
                                            <?php endif ?>
                                            <?php if (empty($user['fb_link'])): ?>
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-facebook"></i></button>
                                            <?php endif ?>
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
                                            <input type="text" name="twitter_link" class="form-control" placeholder="Link" value="<?=$user['twitter_link']?>">
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="twitter_username" class="form-control" placeholder="Username" value="<?=$user['twitter_username']?>">
                                        </div>
                                        <div class="col-2">
                                            <?php if (!empty($user['twitter_link'])): ?>
                                                <a href="<?=$user['twitter_link']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-twitter"></i></a>
                                            <?php endif ?>
                                            <?php if (empty($user['twitter_link'])): ?>
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-twitter"></i></button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Update Social Media?')"><i class="fas fa-edit"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>