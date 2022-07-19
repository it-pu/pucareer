                    <h4>Recent Post</h4><hr>
                        <?php foreach ($this->recent as $key => $value): ?>
                            <div class="col-12">
                                <a href="<?=base_url('jobs/detail/').$value['id_job']?>">
                                    <font style='font-family: "Inter",sans-serif; font-weight: 700; line-height: 1.2;'><?=$value['job_name']?></font><br>
                                    <small class="mb-5"><?=$value['company_name']?></small><br>
                                    <i class="fas fa-map-marker-alt text-primary"></i> <?=$value['state_name']?>, <?=$value['country_name']?>
                                    <i class="far fa-clock text-primary"></i> <?=$value['job_type']?><br>
                                    <i class="fas fa-calendar-alt text-primary"></i> Post Date : <?=$value['created_at']?>
                                </a>
                            </div>
                            <hr>
                        <?php endforeach ?>