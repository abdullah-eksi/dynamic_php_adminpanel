
<?php require_once 'aelib.php';
  admingiriskontrol();
?>

<!doctype html>
<html lang="tr">

    <head>

      <?php include 'inc/head.php'; ?>

    </head>

    <body style="background-color:#222736">
      <div class="account-pages my-5 pt-sm-5">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-md-8 col-lg-6 col-xl-5">
                          <div class="card overflow-hidden">
                              <div class="bg-primary bg-soft">
                                  <div class="row">
                                      <div class="col-7">
                                          <div class="text-primary p-4">
                                              <h5 class="text-primary">AEPANEL / SİTE YÖNETİM</h5>
                                              <p> Hoşgeldin  bilgilerinle Giriş Yap</p>
                                          </div>
                                      </div>
                                      <div class="col-5 align-self-end">
                                          <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body pt-0">
                                  <div class="auth-logo">
                                      <a href="<?php echo URL; ?>" class="auth-logo-light">
                                          <div class="avatar-md profile-user-wid mb-4">
                                              <span class="avatar-title rounded-circle bg-light">
                                                  <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                              </span>
                                          </div>
                                      </a>

                                      <a href="<?php echo URL; ?>" class="auth-logo-dark">
                                          <div class="avatar-md profile-user-wid mb-4">
                                              <span class="avatar-title rounded-circle bg-light">
                                                  <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                              </span>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="p-2">
                                      <form class="form-horizontal" action="settings/adminislem" method="post">

                                          <div class="mb-3">
                                              <label for="username" class="form-label">Kullanıcı Adı</label>
                                              <input type="text" class="form-control" name="username" id="username" required="required" placeholder="kullanıcı adı giriniz">
                                          </div>

                                          <div class="mb-3">
                                              <label class="form-label">Şifre</label>
                                              <div class="input-group auth-pass-inputgroup">
                                                  <input type="password" class="form-control" placeholder="Şifrenizi Giriniz" name="password" required="required" aria-label="Password" aria-describedby="password-addon">
                                                  <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                              </div>
                                          </div>


                                          <div class="mt-3 d-grid">
                                              <button class="btn btn-primary waves-effect waves-light" name="loginadmin" type="submit">Giriş Yap</button>
                                          </div>





                                <!--
                                          <div class="mt-4 text-center">
                                              <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i> Şifremi Unuttum</a>
                                          </div>

                                          !-->
                                      </form>
                                  </div>

                              </div>
                          </div>
                          <div class="mt-5 text-center">

                              <div>

                                  <p> <i class="mdi mdi-laptop text-primary"></i> AEPANEL  <script>document.write(new Date().getFullYear())</script> © </p>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
            <script src="<?php echo AEURL; ?>/assets/js/shortcut.js"></script>
            <script language="JavaScript">

          shortcut.add("Alt+A",function() {window.location = "/aepanel"});
            shortcut.add("Alt+E",function() {window.location = "<?php echo URL; ?>/incele"});
          </script>
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

          <script src="assets/libs/jquery/jquery.min.js"></script>
          <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="assets/libs/metismenu/metisMenu.min.js"></script>
          <script src="assets/libs/simplebar/simplebar.min.js"></script>
          <script src="assets/libs/node-waves/waves.min.js"></script>

          <!-- App js -->
          <script src="assets/js/app.js"></script>
