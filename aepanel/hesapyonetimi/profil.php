<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>






<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">

                       Profil Ayarları</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo AEURL; ?>/profil" >Profil Ayarları</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Profilini  Düzenle</h4>

                                    <form action="settings/adminislem" method="post">
                                      <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Ad Soyad</label>
                                          <div class="col-sm-8">
                                            <input type="text" value="<?php echo $kullanıcıarat["uye_adi"]; ?>"  class="form-control" name="uye_adsoyad">

                                          </div>
                                      </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Eposta</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_mail"]; ?>"  class="form-control" name="uye_mail">
                                                <input type="hidden" value="<?php echo $kullanıcıarat["uye_id"]; ?>"  class="form-control" name="uye_id">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Telefon No</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_tel"]; ?>"  class="form-control" name="uye_tel">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_facebook"]; ?>"  class="form-control" name="uye_facebook">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">İnstagram Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_instagram"]; ?>"  class="form-control" name="uye_instagram">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Linkedin Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_linkedin"]; ?>"  class="form-control" name="uye_linkedin">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Youtube Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_youtube"]; ?>"  class="form-control" name="uye_youtube">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Twitter Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" value="<?php echo $kullanıcıarat["uye_twitter"]; ?>"  class="form-control" name="uye_twitter">
                                            </div>
                                        </div>

                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="profilkaydet" class="btn btn-primary w-md">Kaydet</button>
                                                </div>

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
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
















<?php include '../inc/footer.php'; ?>
