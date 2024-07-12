<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>

<?php  $izinler=[6,5,4,3];
yetki($izinler,$yetki); ?>


<?php


$menukategori_id=get("num");

$menukategoricek=vericek("menukategori","WHERE menukat_id='$menukategori_id'","TEK");

?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">
          
                          <?php echo $menukategoricek["kategori_adi"];?> Menu Ekle</h4>

                        <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>

                              <li class="breadcrumb-item active"><a href="menulistele-<?php echo $menukategori_id; ?>" ><?php echo $menukategoricek["kategori_adi"];?></a></li>
                              <li class="breadcrumb-item active">Menü Ekle</li>
                          </ol>
                        </div>

                    </div>
                </div>
            </div>
<?php


$menukategori_id=$_GET["num"];

 ?>

            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Menu  Ekle</h4>

                                    <form action="settings/adminislem" method="post">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  Link</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="menu_link"  placeholder="menu linki giriniz">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu Adı</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="menu_adi"  placeholder="Menu icerik giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  İcon</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="menuicon"  placeholder="Menu icon giriniz ">
                                              <input type="hidden" name="kategori_id" value="<?php echo $menukategori_id; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  Sıra</label>
                                            <div class="col-sm-8">
                                              <input type="number" class="form-control" name="sira"  placeholder="Menu sıra giriniz ">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Alt  Menu</label>
                                            <div class="col-sm-8">
                                              <?php   $num=$_GET["num"];
                                               ?>
                                              <select class="form-control" name="parent_id">
                                                <option selected="" value="0">Hayır</option>
                                                <?php

                                                $menusor=$db->prepare("SELECT * FROM menuler where menukat_id=:id");
                                                                   $menusor->execute(array(
                                                                     'id'=>$num
                                                                   ));
                                                while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){?>

                                                <option  value="<?php echo $menucek["menu_id"]; ?>"> <?php echo $menucek["menu_adi"]; ?></option>
                                              <?php } ?>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="menuekle" class="btn btn-primary w-md">Yeni Ekle</button>
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
