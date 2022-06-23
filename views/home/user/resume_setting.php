<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Setting Resume</h3><hr>

                        <div class="row">
                            <div class="col-md-4">
                                Upload new file :
                            </div>
                            <div class="col-md-4">
                                <input type="file" class="custom-file-input" id="input-resume" onchange="fileValidationPdf(this.id);">
                                <div id="emailHelp" class="form-text">File format (.pdf | .jpg | .png | .jpeg)</div>
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