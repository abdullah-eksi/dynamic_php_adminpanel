<?php include '../aelib.php'; ?>

<?php include '../inc/header.php'; ?>

<?php


$izinler=[6,5,4,3,2];
yetki($izinler,$yetki);

  if (isset($_GET["num"])) {
  $id =  get("num");

  $tablocek=vericek("tablolar","Where tablo_id='$id'","TEK");
  $tablo_adi=$tablocek["tablo_adi"];
  $tablo_id=$tablocek["tablo_id"];
  $tablo_baslik=$tablocek["tablo_baslik"];


}

 ?>



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo $tablo_baslik; ?> Meta  Düzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>/iceriklistele-<?php echo $tablo_id; ?>"><?php echo $tablo_baslik; ?></a></li>
                                <li class="breadcrumb-item active">Meta Düzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                                    <div class="card-body">
<form class="" action="settings/adminislem" method="post">


                                      <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">  Meta Keywords</label>
                                          <div class="col-sm-8">

                                            <input type="text" class="form-control" name="keywords"   value="<?php echo $tablocek["keywords"]; ?>" placeholder=" Meta Keywords giriniz ">
                                            <input type="hidden" name="no" value="<?php echo $id; ?>">
                                          </div>
                                      </div>
                                      <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">  Meta Description</label>
                                          <div class="col-sm-8">

                                            <textarea  class="form-control" name="description" rows="6" > <?php echo $tablocek["description"]; ?></textarea>

                                          </div>
                                      </div>
                                      <div class="row mb-4">

                                        <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary" name="icerikmetaupdate"> Düzenle</button>
                                      </div>
                                      </form>
                                      </div>
                                    </div>
                                    </div>
                                </div>



                          <!-- end col -->
                      </div>
                      <!-- end row -->





















<?php include '../inc/footer.php'; ?>
