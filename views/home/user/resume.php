<?php get_template_home('home/header') ?>
<?php get_template_home('home/searchbar') ?>
    
    <div class="container mt-5">
        <div class="row">
            <?php get_template_home('home/user/side_menu') ?>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Resume</h3><hr>

                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td style="padding-right: 30px;">File Name</td>
                                        <td><strong>FILE FAJAR.pdf</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Uploaded</td>
                                        <td><strong>22 June 2022</strong></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary"><i class="fas fa-file-download"></i> Download</button> <a href="<?=base_url('user/resume/resume_setting')?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_template_home('home/footer') ?>