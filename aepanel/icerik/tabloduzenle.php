<?php include '../aelib.php'; ?>

<?php include '../inc/header.php'; ?>

<?php


$izinler=[6,5];
yetki($izinler,$yetki);

  if (isset($_GET["num"])) {
  $id =  $_GET["num"];
  $tablobul=$db->prepare("SELECT*FROM tablolar WHERE tablo_id=:id");

  $tablobul->execute(array(
  'id'=>$id
  ));
  $tablocek=$tablobul->fetch(PDO::FETCH_ASSOC);
  $tablo_adi=$tablocek["tablo_adi"];
  $tablo_id=$tablocek["tablo_id"];
}

 ?>



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo $tablocek["tablo_baslik"]; ?> Tablosunu Düzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>"> Anasayfa</a></li>
                              <li class="breadcrumb-item"><a href="tablolistele"> Tablolar</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>/iceriklistele-<?php echo $tablo_id; ?>"><?php echo $tablocek["tablo_baslik"]; ?> </a></li>
                                <li class="breadcrumb-item active"><?php echo $tablocek["tablo_baslik"]; ?> Düzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                                    <div class="card-body">



                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-dark" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-table"></i></span>
                                                    <span class="d-none d-sm-block">Tablo Düzenle</span>
                                                </a>
                                            </li>

                                            <li class="nav-item waves-effect waves-dark" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block">Değişken Ekle</span>
                                                </a>
                                            </li>
                                            <?php if ($yetki==6 or $yetki==5) {?>
                                            <li class="nav-item waves-effect waves-dark" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#code" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="fas fa-laptop"></i></span>
                                                    <span class="d-none d-sm-block">Kaynak Kodu</span>
                                                </a>
                                            </li>
                                          <?php } ?>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active show" id="home-1" role="tabpanel">


                                                  <div class="row mb-4">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tablo  Code</label>
                                                      <div class="col-sm-8">

                                                        <input type="text" class="form-control" name="tablo_adi" disabled  value="<?php echo $tablo_adi; ?>" placeholder=" tablo adı giriniz ">

                                                      </div>
                                                  </div>
                                                    <form action="settings/adminislem" method="post">
                                                  <div class="row mb-4">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tablo  Başlık</label>
                                                      <div class="col-sm-8">

                                                        <input type="text" class="form-control" name="tablo_baslik"   value="<?php echo $tablocek["tablo_baslik"]; ?>" placeholder=" tablo adı giriniz ">

                                                      </div>
                                                  </div>
                                                  <div class="row mb-4">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tablo  Seflink </label>
                                                      <div class="col-sm-8">

                                                        <input type="text" class="form-control" name="tablo_sef"   value="<?php echo seo($tablocek["tablo_sef"]); ?>" placeholder=" tablo adı giriniz ">

                                                      </div>
                                                  </div>
                                                  <div class="row mb-4">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Tablo  Şablon Kodu</label>
                                                      <div class="col-sm-8">
                                                        <input type="hidden" name="tablo_id" value="<?php echo $id; ?>">
                                                        <input type="text" class="form-control" name="tablo_sablon"   value="<?php echo $tablocek["tablo_sablon"]; ?>" placeholder=" tablo Şablon Kodu giriniz ">

                                                      </div>
                                                  </div>

                                                  <div class="row justify-content">
                                                      <div class="col-sm-10">



                                                          <div style="float:right">
                                                              <button type="submit" name="tablosetduzenle" class="btn btn-primary w-md">Kaydet</button>
                                                          </div>

                                                      </div>


                                                      </div>

                                              </form>

                                                                                            <div class="col-sm-10">
                                              <br>

                                                                                          <?php if (isset($_GET["durum"])) {
                                                                                        if ($_GET["durum"]=="ok") {?>
                                                                                          <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                                                                          Kayıt Başarıyla Düzenlendi :]
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <?php  }
                                                                                        if ($_GET["durum"]=="no") {
                                                                                        ?>
                                                                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                                                        <i class="fas fa-exclamation-triangle"></i> Kayıt Düzenlenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
                                                                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <?php
                                                                                        }
                                                                                        } ?>


                                                                                          </div>
  </div>




                                            <div class="tab-pane" id="settings-1" role="tabpanel">



  <br>  <div class="table-responsive">
                                            <div class="col-sm-12">

                                              <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                  <thead>
                                                  <tr>

                                                      <th>Değişken İd</th>
                                                        <th>Değişken Adı</th>
                                                      <th>Değişken Başlık</th>
                                                      <th>Değişken Tipi</th>

                                                      <th>İşlemler</th>

                                                  </tr>
                                                  </thead>


                                                  <tbody>
                                                    <?php


                                                    $degiskensor=$db->prepare("SELECT * FROM degiskenler where tablo_id=:id");
                                                                       $degiskensor->execute(array(
                                                                         'id'=>$tablocek["tablo_id"]
                                                                       ));

                                                    while($degiskencek=$degiskensor->fetch(PDO::FETCH_ASSOC)){

                                                     ?>
                                                  <tr>

                                                      <td><?php echo $degiskencek["degisken_id"]; ?></td>
                                                      <td><?php echo $degiskencek["degisken_adi"]; ?></td>
                                                      <td><?php echo $degiskencek["degiskenbaslik"]; ?></td>
                                                      <td><?php if($degiskencek["degiskentype"]==0)
                                                      {
                                                        echo "text";
                                                      }
                                                      elseif ($degiskencek["degiskentype"]==1) {
                                                        echo "textarea";
                                                      }
                                                      else{
                                                        echo "degisken türü kaydedilerken sorun oluştu";
                                                      }
                                                       ?></td>
                                                      <td>  <div class="col-md-12">


                                                         <div class="row">

                                                      <div class="col-md-2">
                                                        <form  action="settings/adminislem" method="post">


                                                          <input type="hidden" name="num" value="<?php echo $degiskencek["degisken_id"]; ?>">
                                                            <input type="hidden" name="no" value="<?php echo $_GET["num"]; ?>">
                                                          <button type="submit" class="btn btn-danger" name="degiskensil" > <i  class="fa fa-trash"></i> </button>
                                                            </form>
                                                            </div>
                                                           </div>
                                                            </div>
                                                       </td>

                                                  </tr>
                                              <?php

                                              } ?>

                                              </table>

                                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ekle">
                                              Değişken Ekle
                                          </button>

</div></div>
                      <form  action="settings/adminislem" method="post">


                                            <div class="modal fade" id="ekle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ekle" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Değişken Ekle</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="row mb-4">
                                                              <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Değişken  Başlık</label>
                                                              <div class="col-sm-8">

                                                                <input type="text" class="form-control" name="degiskenbaslik" required="required"   placeholder=" değişken adı giriniz ">

                                                              </div>
                                                          </div>
                                                          <div class="row mb-4">
                                                              <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Değişken  Adı</label>
                                                              <div class="col-sm-8">

                                                                <input type="text" class="form-control" name="degiskenadi" required="required"   placeholder=" değişken adı giriniz ">

                                                              </div>
                                                          </div>
                                                              <div class="row mb-4">
                                                          <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Değişken  Türü</label>
                                                          <div class="col-sm-8">
                                                        <select class="form-control" required="required"  name="degiskentur">
                                                          <option selected="selected" value="0">Text</option>
                                                            <option value="1">Textarea</option>
                                                        </select>
                                                        <input type="hidden" name="tablo_id" value="<?php echo $id; ?>">
                                                            </div>

                                                  </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                            <button type="submit" name="degiskenekle" class="btn btn-primary">Kaydet</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </form>
                                              </div>

<?php if ($yetki==6 or $yetki==5) {?>

<?php
$codecek=vericek("degiskenler","Where tablo_id='$id'","COK");
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



                          <!-- end col -->
                      </div>
                      <!-- end row -->





















<?php include '../inc/footer.php'; ?>
