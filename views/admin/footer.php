      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2022 <a href="<?=base_url()?>" class="font-weight-bold ml-1" target="_blank">Career Portal</a>
            </div>
          </div>
          <!-- <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div> -->
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  
  
  <!-- Optional JS -->
  <script src="<?php echo get_template_directory('back/vendor/chart.js/dist/Chart.min.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/vendor/chart.js/dist/Chart.extension.js') ;?>"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.6/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

  <script src="<?php echo get_template_directory('back/vendor/ckeditor/ckeditor.js') ;?>"></script>

  <!-- Argon JS -->
  <script src="<?php echo get_template_directory('back/js/argon.js') ;?>"></script>
  <script src="<?php echo get_template_directory('back/js/function.js') ;?>"></script>

  <script type="text/javascript">
    $(document).ready( function () {
        $('#table_data').DataTable({
          "language": {
            "paginate": {
              "previous": "<i class='fas fa-chevron-left'></i>",
              "next" : "<i class='fas fa-chevron-right'></i>"
            }
          }
        });

    } );

    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor2');

    $('.selectpicker').selectpicker();
  </script>
</body>

</html>
