
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-6">
                              © <script>document.write(new Date().getFullYear())</script>  AEPANEL
                            </div>
                            <div class="col-sm-6">
                                <div  class="text-sm-end d-none d-sm-block">
                              <p>  Developed by <a style="color:#9daecb; text-decoration:none" href="https://tr.linkedin.com/in/abdullah-ek%C5%9Fi-479a16231?trk=people-guest_people_search-card">Abdullah Ekşi</a> / Sürüm No 1.0.0.0  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <script>
                                ClassicEditor
                                        .create( document.querySelector( 'textarea' ) )
                                        .then( textarea => {
                                                console.log( textarea );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->


        <script src="<?php echo AEURL; ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo AEURL; ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo AEURL; ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo AEURL; ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo AEURL; ?>/assets/libs/node-waves/waves.min.js"></script>

        <!-- Plugins js -->


        <script src="<?php echo AEURL; ?>/assets/js/app.js"></script>
  <script src="<?php echo AEURL; ?>/assets/js/shortcut.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo AEURL; ?>/assets/js/dropify.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();


                // Used events
                var drEvent = $('.dropify-event').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.filename + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });
            });
        </script>


  <script>
  $(document).ready(function(){	$(".ck_editor").each(function(index){	var input_name = $(this).attr("name");	CKEDITOR.replace(input_name);	});
  });
  </script>



  <!-- PANEL GİRİŞ KISAYOLU BAŞLANGIÇ -->
      <script src="<?php echo AEURL; ?>/assets/js/shortcut.js"></script>
      <script language="JavaScript">

    shortcut.add("Alt+A",function() {window.location = "<?php echo AEURL; ?>"});
    shortcut.add("Alt+E",function() {window.location = "<?php echo URL."/incele"; ?>"});
    </script>
  <!-- PANELE GİRİŞ KISAYOLU BİTİŞ -->
<!--


⢠⡤⢺⣿⣿⣿⣿⣿⣶⣄
⠀⠀⠉⠀⠘⠛⠉⣽⣿⣿⣿⣿⡇
⠀⠀⠀⠀⠀⠀⠀⢉⣿⣿⣿⣿⡗
⢀⣀⡀⢀⣀⣤⣤⣽⣿⣼⣿⢇⡄
⠀⠀⠙⠗⢸⣿⠁⠈⠋⢨⣏⡉⣳
⠀⠀⠀⠀⢸⣿⡄⢠⣴⣿⣿⣿
⠀⠀⠀⠀⠉⣻⣿⣿⣿⣿⣿⡟⡀
⠀⠀⠀⠀⠐⠘⣿⣶⡿⠟⠁⣴⣿⣄
⠀⠀⠀⠀⠀⠘⠛⠉⣠⣴⣾⣿⣿⣿⡦
⠀⠀⢀⣴⣠⣄⠸⠿⣻⣿⣿⣿⣿⠏
⣠⣿⣿⠟⠁

-->
<script name="aepanel" type="text/javascript">
console.log(`<?php echo AEPANEL; ?>`);

</script>

    </body>

</html>
