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

                       Hesap Ayarları</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo AEURL; ?>/sifreayar" >Şifre Ayarları</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Şifre  Ayarları</h4>

                                    <form action="settings/adminislem" method="post">

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Eski  Şifre</label>
                                            <div class="col-sm-8">
                                                <input type="hidden"   class="form-control" value="<?php echo $kullanıcıarat["uye_id"]; ?>" name="uye_id">
                                              <input type="password"   class="form-control" placeholder="eski şifre" name="eski_sifre">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Yeni  Şifre</label>
                                            <div class="col-sm-8">
                                              <input type="password"   class="form-control"  placeholder="yeni şifre" name="yeni_sifre">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tekrar Yeni  Şifre</label>
                                            <div class="col-sm-8">
                                              <input type="password" class="form-control" placeholder="tekrar yeni şifre" name="yeni_sifre2">
                                            </div>
                                        </div>


                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="asifreupdate" class="btn btn-primary w-md">Güncelle</button>
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
