<?php include '../aelib.php'; ?>
<?php include '../inc/header.php';
$izinler=[5,6];
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


                        $bilgikategori_id=$_GET["num"];
                        $bilgikategorisor=$db->prepare("SELECT*FROM bilgikategori WHERE bilgikategori_id=:id");

                        $bilgikategorisor->execute(array(
                          'id'=>$bilgikategori_id
                        ));
                        $bilgikategoricek=$bilgikategorisor->fetch(PDO::FETCH_ASSOC);
                        ?>
                          <?php echo $bilgikategoricek["bilgikategori_adi"];?> Bilgi Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><a href="bilgilistele-<?php echo $bilgikategori_id; ?>" ><?php echo $bilgikategoricek["bilgikategori_adi"];?></a></li>
                                <li class="breadcrumb-item active">Bilgi Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
<?php


$bilgikategori_id=$_GET["num"];

 ?>

            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Bilgi  Ekle</h4>

                                    <form action="settings/adminislem" method="post">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Kodu</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgiadi"  placeholder="kod için türkçe karekter kullanmadan degisken yaz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Adı</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgi_title"  placeholder="bilgi Adı giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  Başlık</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgi_baslik"  placeholder="bilgi başlık giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  İcerik</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgi_icerik"  placeholder="bilgi icerik giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi  İcon</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="bilgi_icon"  placeholder="bilgi icon giriniz ">
                                              <input type="hidden" name="kategori_id" value="<?php echo $bilgikategori_id; ?>">
                                            </div>
                                        </div>

                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="bilgiekle" class="btn btn-primary w-md">Yeni Ekle</button>
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
