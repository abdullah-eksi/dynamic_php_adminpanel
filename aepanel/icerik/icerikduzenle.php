<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php if (isset($_GET)) {
  $tablo_id=$_GET["num"];

  $icerik_id=$_GET["id"];



  $izinler=[6,5,4,3,2];
yetki($izinler,$yetki);

  $tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);
  $tablo_baslik = tekvericek("tablolar", "tablo_baslik", "tablo_id", $tablo_id);
  $icerikcek=vericek($tablo_adi,"Where id='$icerik_id'","TEK");

}
else {
yonlendir(AEURL);
} ?>
<?php


?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">

                           <?php echo $tablo_baslik; ?> Düzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo AEURL."/iceriklistele-".$tablo_id; ?>"><?php echo $tablo_baslik; ?></a></li>
                                <li class="breadcrumb-item active"><?php echo $icerikcek["sekilbaslik"]; ?> Düzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                                          <div class="card">
                                              <div class="card-body">

                                                  <h4 class="card-title"><?php echo $icerikcek["sekilbaslik"]; ?> Düzenle</h4>


                                                  <!-- Nav tabs -->
                                                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                      <li class="nav-item">
                                                          <a class="nav-link active" data-bs-toggle="tab" href="#genel" role="tab">
                                                              <span class="d-block d-sm-none"><i class="fas fa-laptop"></i></span>
                                                              <span class="d-none d-sm-block">Genel</span>
                                                          </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link" data-bs-toggle="tab" href="#icerik" role="tab">
                                                              <span class="d-block d-sm-none"><i class="far fa-file-alt"></i></span>
                                                              <span class="d-none d-sm-block">İçerik</span>
                                                          </a>
                                                      </li>
                                                      <?php
                                                      if ($yetki==6 or $yetki==5) {?>


                                                      <li class="nav-item">
                                                          <a class="nav-link" data-bs-toggle="tab" href="#code" role="tab">
                                                              <span class="d-block d-sm-none"><i class="far fa-file-alt"></i></span>
                                                              <span class="d-none d-sm-block">Kaynak Kodu</span>
                                                          </a>
                                                      </li>
                                                      <?php  } ?>
                                                  </ul>

                                                  <!-- Tab panes -->
                                                  	<form action="settings/adminislem" method="post" enctype="multipart/form-data">
                                                  <div class="tab-content p-3 text-muted">
                                                      <div class="tab-pane active" id="genel" role="tabpanel">
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">icerik Başlık</label>
                                                            <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="<?php echo $icerikcek["sekilbaslik"]; ?>" required="required"  name="sekilbaslik"  placeholder="Başlık">
                                                            <input type="hidden" name="tabloid" value="<?php echo $tablo_id; ?>">
                                                        </div>
                                                      </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">icerik resim</label>


                                                            <div class="col-sm-8">
                                                              <div class="input-group">
                                                                        <input type="file" id="input-file-now"    name="resim" class="dropify" data-default-file="" >

                                                                        <input type="hidden" name="icerik_id" value="<?php echo $icerik_id; ?>">
                                                                       </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Meta Description</label>
                                                            <div class="col-sm-8">
                                                            <textarea   cols="40" rows="5"  class="form-control" name="description"  ><?php echo $icerikcek["description"]; ?>   </textarea>

                                                        </div>
                                                      </div>
                                                      <div class="row mb-4">
                                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Meta Keywords</label>
                                                          <div class="col-sm-8">
                                                          <input type="text" class="form-control"   name="keywords"  value="<?php echo $icerikcek["keywords"]; ?>" placeholder=" Meta Anahtar Kelime">

                                                      </div>
                                                    </div>


                                                        <div class="col-sm-10">
                                                        <div style="float:right">
                                                          <button type="submit" name="icerikduzenle" class="btn btn-primary w-md"> Düzenle</button>
                                                        </div>
                                                          </div>
      <br><br>
      <br>

                                                          <?php if (isset($_GET["durum"])) {
                                                            ?>

                                                            <div class="col-sm-12">
      <div class="container">


                                                        <?php
                                                          if ($_GET["durum"]=="ok") {?>
                                                          <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                                          Kayıt Başarıyla duzenlendi :]
                                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                          </div>
                                                          <?php  }
                                                          if ($_GET["durum"]=="no") {
                                                          ?>
                                                          <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                          <i class="fas fa-exclamation-triangle"></i> Kayıt duzenlenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
                                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                          </div>
                                                          <?php
                                                          }
                                                          ?>     </div> </div><?php
                                                          } ?>



                                                      </div>
                                                      <div class="tab-pane" id="icerik" role="tabpanel">
                                                        <?php
                                              $sayi=0;
                                              $degiskensor =  vericek("degiskenler","where tablo_id='$tablo_id'","COK");
                                                    foreach ($degiskensor as $degiskencek) {



                                                       $degiskentype=$degiskencek["degiskentype"];
                                                       $degiskenadi=$degiskencek["degisken_adi"];
                                                       if ($degiskentype==0) {



                                                        ?>
                                                       <div class="row mb-4">
                                                         <label for="horizontal-firstname-input" class="col-sm-2 col-form-label"><?php echo $degiskencek["degiskenbaslik"]; ?></label>
                                                         <div class="col-sm-8">
                                                           <input type="text" class="form-control" value="<?php echo $icerikcek[$degiskenadi]; ?>"  name="<?php echo $degiskencek["degisken_adi"]; ?>"  placeholder="<?php echo $degiskencek["degiskenbaslik"]; ?> giriniz">

                                                         </div>
                                                       </div>

                                                       <?php } else {

                                                         ?>

                                                       <div class="row mb-4">
                                                         <label for="horizontal-firstname-input"  class="col-sm-2 col-form-label"><?php echo $degiskencek["degiskenbaslik"]; ?></label>
                                                         <div  class="col-sm-8">

                                                            <textarea class="ckeditor" style="height:500px" name="<?php echo $degiskencek["degisken_adi"]; ?>" ><?php echo $icerikcek[$degiskenadi]; ?></textarea>
                                                       </div>
                                              </div>

                                            <?php    } ?>

                                               <?php $sayi++;} ?>
                                               <div class="col-sm-10">
                                               <div style="float:right">
                                                 <button type="submit" name="icerikduzenle" class="btn btn-primary w-md">Düzenle</button>
                                               </div>
                                                 </div>
<br><br>
<br>

                                                 <?php if (isset($_GET["durum"])) {
                                                   ?>

                                                   <div class="col-sm-12">
<div class="container">


                                               <?php
                                                 if ($_GET["durum"]=="ok") {?>
                                                 <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                                 Kayıt Başarıyla duzenlendi :]
                                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                 </div>
                                                 <?php  }
                                                 if ($_GET["durum"]=="no") {
                                                 ?>
                                                 <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                 <i class="fas fa-exclamation-triangle"></i> Kayıt duzenlenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
                                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                 </div>
                                                 <?php
                                                 }
                                                 ?>     </div> </div><?php
                                                 } ?>


  <input type="hidden" name="yol" value="<?php echo $icerikcek["resim"]; ?>">
                                                      </div>
</form>
<?php if ($yetki==6 or $yetki==5) {?>

<?php
$codecek=vericek("degiskenler","Where tablo_id='$tablo_id'","COK");
 ?>
                                              <div class="tab-pane" id="code" role="tabpanel">

                                            <div class="container">
                                              <div style="background-color:black; padding:10px; border-radius:5px;" class="col-md-12">
                                                <div style="color:green" class="col-md-12">
                                                <p><?php echo " < ?php </br>";
                                                echo '$sekil_id='.$tablo_id.';</br>';
                                              echo  '$veriler = icerikcek("$sekil_id","ORDER BY id ASC");</br>';
                                                  echo   ' foreach ($veriler as $veri) { </br>';
                                                  echo    '$no     = $veri->id;</br>';
                                                  echo    '$sekil_adi = $veri->sekilbaslik;</br>';
                                                  echo   ' $resim = $veri->resim; </br> ' ;
                                                  foreach ($codecek as $code) {
                                                  echo  "$".$code["degisken_adi"]." = $"."veri->".$code["degisken_adi"].";</br>";
                                                  }
                                                  echo "</br>  ? >  </br> </br> ";

                                                  echo "## tekrarlancak kod buraya ## </br> </br>";
                                                  echo "</br> </br>< ?php } ?></br> </br>";
                              echo  '</br>//kodların çalışması için php taglarının yanındaki boşlukları  kaldırın"; '; ?></p>
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                            <?php } ?>

                                                  </div>



                                              </div>
                                          </div>


                                      </div>







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
