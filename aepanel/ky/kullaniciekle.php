<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php $izinler=[6,5,4,3];
yetki($izinler,$yetki);
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">

                           Kullanıcı Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Kullanıcı Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Kullanıcı  Ekle</h4>

                                    <form action="settings/adminislem" method="post">
                                      <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Ad Soyad</label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" required="required"  name="uye_adsoyad"  placeholder="Ad Soyad">

                                          </div>
                                      </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı  Adı</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" required="required"  name="uye_kuladi"  placeholder="kullanıcı adı">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Şifre</label>
                                            <div class="col-sm-8">
                                              <div class="input-group auth-pass-inputgroup">
                                                  <input type="password" name="uye_passwordone" required="required" class="form-control" placeholder="şifre" aria-label="Password" aria-describedby="password-addon">

                                              </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tekrar Kullanıcı Şifre</label>
                                            <div class="col-sm-8">
                                              <div class="input-group auth-pass-inputgroup">
                                                  <input type="password" id="Password1" name="uye_passwordtwo" required="required" class="form-control" placeholder="tekrar şifre" aria-label="Password1" aria-describedby="password-addon">

                                              </div>
                                            </div>
                                        </div>






                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Mail</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="uye_mail"  placeholder="mail adresi giriniz">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Telefon</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="uye_tel"  placeholder="telefon no giriniz  ">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Durumu</label>
                                            <div class="col-sm-8">
                                              <select class="form-select" name="durum" id="floatingSelectGrid" aria-label="Floating label select example">

                                                            <option selected="" value="1">Aktif</option>
                                                            <option value="2">Pasif</option>

                                                        </select>

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Yetkisi</label>
                                            <div class="col-sm-8">
                                              <select required="required" class="form-select" name="admin_yetki" id="floatingSelectGrid" aria-label="Floating label select example">


                                                            <?php if ($yetki==5 or $yetki==6){ ?>
                                                          <option value="5"> Developer</option>
                                                          <option value="4"> Admin</option>
                                                          <option value="3">Yönetici</option>
                                                          <option value="2">editör</option>
                                                          <option value="1">Panel Üyesi</option>
                                                          <?php } ?>

                                                        <?php if($yetki==4){ ?>
                                                            <option value="3">Yönetici</option>
                                                            <option value="2">editör</option>
                                                            <option value="1">Panel Üyesi</option>
                                                        <?php } ?>

                                                        <?php if($yetki==3){?>
                                                          <option value="2">editör</option>
                                                          <option value="1">Panel Üyesi</option>
                                                        <?php } ?>

                                                        </select>

                                            </div>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="panelkullanıcıekle" class="btn btn-primary w-md">Kullanıcı Ekle</button>
                                                </div>
</form>
                                            </div>

                                            <div class="col-sm-10">
        <br>

        <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"]=="ok") {?>
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        Kayıt Başarıyla Eklendi :]
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  }
        if ($_GET["durum"]=="no") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Kayıt eklenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        } ?>


                                          </div>
                                            </div>
                                        </div>

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->








<?php include '../inc/footer.php'; ?>
