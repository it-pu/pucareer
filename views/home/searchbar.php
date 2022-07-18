        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form method="GET" action="<?=base_url('jobs')?>">
                    <div class="row g-2">
                            <input type="hidden" name="sort" id="id_sort_search">
                            <input type="hidden" name="status" id="id_status_search">
                            <div class="col-md-10">
                                <div class="row g-2">
                                        <div class="col-md-3">
                                            <?php if (!empty($datasearch['keyword'])): ?>
                                                <input type="text" class="form-control border-0" name="keyword" placeholder="Keyword" value="<?=$datasearch['keyword']?>" id="keyword_search_input" />
                                            <?php endif ?>
                                            <?php if (empty($datasearch['keyword'])): ?>
                                                <input type="text" class="form-control border-0" name="keyword" placeholder="Keyword" id="keyword_search_input" />
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-3">
                                            <?php if (!empty($datasearch['spec'])): ?>
                                                <select class="form-select border-0" name="spec" id="spec_search_input">
                                                    <option selected value="0">Choose Specialization</option>
                                                    <?php foreach ($this->specialization as $key => $value): ?>
                                                        <option value="<?=$value['id_specialization']?>" <?=selected_helper($value['id_specialization'], $datasearch['spec'])?>><?=$value['specialization_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            <?php endif ?>
                                            <?php if (empty($datasearch['spec'])): ?>
                                                <select class="form-select border-0" name="spec" id="spec_search_input">
                                                    <option selected value="0">Choose Specialization</option>
                                                    <?php foreach ($this->specialization as $key => $value): ?>
                                                        <option value="<?=$value['id_specialization']?>"><?=$value['specialization_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            <?php endif ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php if (!empty($datasearch['country'])): ?>
                                                <select name="country" class="form-select border-0" placeholder="Select Country" id="country_search_input" onchange="getStateSearch(this)">
                                                    <option value="0">Choose Country</option>
                                                    <?php foreach ($this->country as $key => $value): ?>
                                                        <option value="<?=$value['id_country']?>" <?=selected_helper($value['id_country'], $datasearch['country'])?>><?=$value['country_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            <?php endif ?>
                                            <?php if (empty($datasearch['country'])): ?>
                                                <select name="country" class="form-select border-0" placeholder="Select Country" id="country_search_input" onchange="getStateSearch(this)">
                                                    <option value="0">Choose Country</option>
                                                    <?php foreach ($this->country as $key => $value): ?>
                                                        <option value="<?=$value['id_country']?>"><?=$value['country_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            <?php endif ?>
                                                
                                        </div>
                                        <div class="col-md-3">
                                            <?php if (!empty($datasearch['country'])): ?>
                                                <?php if (!empty($datasearch['state'])): ?>
                                                    <select id="state-search-drop" class="form-select border-0" name="state">
                                                        <option value="0">Choose State</option>
                                                        <?php foreach ($state_get as $key => $value): ?>
                                                            <option value="<?=$value['id_state']?>" <?=selected_helper($value['id_state'], $datasearch['state'])?>><?=$value['state_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                <?php endif ?>
                                                <?php if (empty($datasearch['state'])): ?>
                                                    <select id="state-search-drop" class="form-select border-0" name="state">
                                                        <option value="0">Choose State</option>
                                                        <?php foreach ($state_get as $key => $value): ?>
                                                            <option value="<?=$value['id_state']?>"><?=$value['state_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                <?php endif ?>
                                                    
                                            <?php endif ?>
                                            <?php if (empty($datasearch['country'])): ?>
                                                <select id="state-search-drop" class="form-select border-0" name="state">
                                                </select>
                                            <?php endif ?>
                                                
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-dark border-0 w-100">Search</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>