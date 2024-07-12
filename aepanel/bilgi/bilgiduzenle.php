<?php include '../aelib.php'; ?>
<?php include '../inc/header.php';

$izinler=[6,5,4,3,2];
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
                          <?php


                        $bilgikategori_id=get("num");
                        $bilgi_id=get("no");
                        $tablo_adi = tekvericek("bilgikategori", "bilgikategori_adi", "bilgikategori_id", $bilgikategori_id);

                          $bilgicek=vericek("bilgi","Where kategori_id='$bilgikategori_id' AND bilgi_id='$bilgi_id' ","TEK");



                        ?>
                          <?php echo $bilgicek["bilgi_title"];?> Düzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><a href="bilgilistele-<?php echo $bilgikategori_id; ?>" ><?php echo $tablo_adi; ?></a></li>
                                <li class="breadcrumb-item active">duzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Bilgi  duzenle</h4>

                                    <form action="settings/adminislem" method="post">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Kodu</label>
                                            <div class="col-sm-8">

<?php if($yetki==6 or $yetki==5){ ?>
   <input type="text" class="form-control" name="bilgiadi"  value="<?php echo $bilgicek["bilgiadi"]; ?>"  placeholder="kod için türkçe karekter kullanmadan degisken yaz ">
 <?php } else {?>
 <input type="text" class="form-control" name="bilgiadi" disabled="disabled" value="<?php echo $bilgicek["bilgiadi"]; ?>"  placeholder="kod için türkçe karekter kullanmadan degisken yaz ">
 <?php } ?>





                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Adı</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgi_title" value="<?php echo $bilgicek["bilgi_title"]; ?>" placeholder="bilgi Adı giriniz ">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Baslik</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" value="<?php echo $bilgicek["bilgi_baslik"]; ?>" name="bilgi_baslik"  placeholder="bilgi başlık giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  İcerik</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" value="<?php echo $bilgicek["bilgi_icerik"]; ?>" name="bilgi_icerik"  placeholder="bilgi icerik giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  İcon</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" value="<?php echo $bilgicek["bilgi_icon"]; ?>" name="bilgi_icon"  placeholder="bilgi icon giriniz ">
                                              <input type="hidden" name="kategori_id" value="<?php echo $bilgikategori_id; ?>">
                                              <input type="hidden" name="bilgid" value="<?php echo $bilgi_id; ?>">
                                            </div>
                                        </div>

                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="bilgiupdate" class="btn btn-primary w-md">Düzenle</button>
                                                </div>

                                            </div>

                                            <div class="col-sm-10">
        <br>

        <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"]=="ok") {?>
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        Kayıt Başarıyla Güncellendi :]
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
