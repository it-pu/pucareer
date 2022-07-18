        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">CAREER PORTAL</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							<!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- Modal -->
    <?php echo form_open(base_url('home/change_lang')); ?>
    <div class="modal fade" id="langModal" tabindex="-1" aria-labelledby="langModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="langModalLabel">Change Language</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="url_hidden" value="<?=current_url();?>">
            <div class="mb-3">
              <label for="name_registrar" class="form-label">Language</label>
              <select class="form-select" name="lang_code">
                <?php foreach ($this->sess['lang_av'] as $key => $value): ?>
                    <option value="<?=$value['lang_code']?>" <?=selected_helper($this->sess['lang'], $value['lang_code'])?>><?=$value['lang_name']?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
    </form>

    <!-- JavaScript Libraries -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory('front/lib/wow/wow.min.js') ;?>"></script>
    <script src="<?php echo get_template_directory('front/lib/easing/easing.min.js') ;?>"></script>
    <script src="<?php echo get_template_directory('front/lib/waypoints/waypoints.min.js') ;?>"></script>
    <script src="<?php echo get_template_directory('front/lib/owlcarousel/owl.carousel.min.js') ;?>"></script>
    
    <script src="<?php echo get_template_directory('front/lib/select2/dist/js/select2.js') ;?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo get_template_directory('front/js/function.js') ;?>"></script>
    <script src="<?php echo get_template_directory('front/js/main.js') ;?>"></script>

    <script type="text/javascript">

        var sortbysearch = document.getElementById('sortbysearch').value;
        var statussearch = document.getElementById('statussearch').value;

        var keywordsearch = document.getElementById('keyword_search_input').value;
        var specsearch = document.getElementById('spec_search_input').value;
        var countrysearch = document.getElementById('country_search_input').value;
        var statesearch = document.getElementById('state-search-drop').value;
        
        if (sortbysearch) 
        {
            document.getElementById('id_sort_search').value = sortbysearch;
        }
        if (statussearch) 
        {
            document.getElementById('id_status_search').value = statussearch;
        }
        if (keywordsearch) 
        {
            document.getElementById('id_keyword_search').value = keywordsearch;
        }
        if (specsearch) 
        {
            document.getElementById('id_spec_search').value = specsearch;
        }
        if (countrysearch) 
        {
            document.getElementById('id_country_search').value = countrysearch;
        }
        if (statesearch) 
        {
            document.getElementById('id_state_search').value = statesearch;
        }


        $(document).ready(function() {
            $('#summ-text').summernote();

            $('#drop-select').select2();
            $('#country-select').select2();
            $('#country-search-select').select2();
            $('#state-select').select2();
        });

        function getStateSearch(dataselect) 
        {
            var id = dataselect.value;
            $.ajax({
              url : '<?=base_url('country/get_state/')?>'+id,
              type : 'GET',
              dataType : 'JSON',
              success : function (result)
              {
                document.getElementById("state-search-drop").innerHTML = "";
                $('#state-search-drop').append('<option value="0">Choose State</option>')
                $.each(result, function(i, data){
                  $('#state-search-drop').append
                  (`
                    <option value="`+data.id_state+`">`+data.state_name+`</option>
                  `)
                });
              }
            });
        }
    </script>
</body>

</html>