<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php  $izinler=[6,5,4,3,2];
yetki($izinler,$yetki); ?>



<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Anasayfa</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                <li class="breadcrumb-item active">Mesaj Listele</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Mesaj Listele</h4>


                <div class="row mb-4">

<div class="col-sm-12">
  <div class="table-responsive">
                                                  <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                      <thead>
                                                      <tr>
                                                          <th>Mesaj Durum</th>
                                                          <th>Mesaj İd</th>
                                                          <th>Mesaj Konu</th>
                                                          <th>Mesaj Kullanıcı </th>
                                                          <th>Mesaj Tarih </th>

                                                          <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3 or $yetki==2) { ?>


                                                          <th>İşlemler </th>
                                                            <?php  } ?>
                                                      </tr>
                                                      </thead>


                                                      <tbody>
                                                        <?php


$mesajsor=vericek("mesajlar","ORDER BY mesaj_date ASC","COK");

$mesajsor=$db->prepare("SELECT * FROM mesajlar ORDER BY mesaj_date ASC");
$mesajsor->execute(array());
$say=0;

foreach ($mesajsor as $mesajcek) {
?>

                                                        <tr>
                                                          <td  style="width:90px" colspan="1" >
                                                            <?php if ($mesajcek["mesaj_durum"]==0) {?>
                                                              <div  style="background-color:#66ff00; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">Yeni Mesaj</b>
                                                            </div>
                                                            <?php  } ?>
                                                            <?php if ($mesajcek["mesaj_durum"]==1) {?>
                                                              <div  style="background-color:red; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">önemli</b>
                                                            </div>
                                                            <?php  } ?>
                                                            <?php if ($mesajcek["mesaj_durum"]==2) {?>
                                                              <div  style="background-color:orange; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">Acil</b>
                                                            </div>
                                                            <?php  } ?>
                                                            <?php if ($mesajcek["mesaj_durum"]==3) {?>
                                                              <div  style="background-color:aqua; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">İşlemde</b>
                                                            </div>
                                                            <?php  } ?>

                                                            <?php if ($mesajcek["mesaj_durum"]==4) {?>
                                                              <div  style="background-color:#001528; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">kapatıldı</b>
                                                            </div>
                                                            <?php  } ?>
                                                            <?php if ($mesajcek["mesaj_durum"]==5) {?>
                                                              <div  style="background-color:#65014f; width:90px; height:40px; border-radius: 10px;text-align:center; padding-top:10px">
                                                              <b style="color:white;">Cevaplandı</b>
                                                            </div>
                                                            <?php  } ?>
                                                         </td>
                                                          <td><?php echo $mesajcek["mesaj_id"]; ?></td>
                                                          <td><?php echo $mesajcek["mesaj_konu"]; ?></td>
                                                          <td><?php echo $mesajcek["mesaj_kuladi"]; ?></td>
                                                          <td><?php echo $mesajcek["mesaj_date"]; ?></td>

                                                          <td>
  <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3 or $yetki==2) { ?>
                                                             <button type="button" class="btn btn-success" name="button" data-bs-toggle="modal" data-bs-target="#goruntule<?php echo $say; ?>">Görüntüle</button>
                                                             <?php } ?>
                                                               <?php if ($yetki==6 or $yetki==5 or $yetki==4) { ?>
                                                             <button type="button" class="btn btn-danger" name="button" data-bs-toggle="modal" data-bs-target="#sil<?php echo $say; ?>">Mesajı Kaldır</button> </td>
<?php } ?>
                                                        </tr>



                                                          <div class="modal fade" id="sil<?php echo $say; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sil<?php echo $say; ?>" aria-hidden="true" style="display: none;">
<form  action="settings/adminislem" method="post">


                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="staticBackdropLabel">Mesaj Kaldır</h5>
                                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                        <input type="hidden" name="id" value="<?php echo $mesajcek["mesaj_id"]; ?>">
                                                                      <?php echo $mesajcek["mesaj_kuladi"]; ?>  isimli kullanıcının  <?php echo $mesajcek["mesaj_date"]; ?> tarihinde gönderdiği mesaj kaldırılacaktır onaylıyormusunuz

                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hayır</button>
                                                                          <button type="submit" name="mesajkaldir" class="btn btn-danger">Evet kaldır</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              </form>
                                                          </div>


                                                          <div class="modal fade" id="goruntule<?php echo $say; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="goruntule<?php echo $say; ?>" aria-hidden="true" style="display: none;">
                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="staticBackdropLabel">Mesaj Görüntüle</h5>
                                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                      </div>
                                                                      <div class="modal-body">


                                                                        <div class="col-xl-12">
                                                                          <div class="card">
                                                                            <div class="card-body">
                                                                              <h4 class="card-title mb-4"> Mesaj Konusu: <?php echo $mesajcek["mesaj_konu"]; ?></h4>
                                                                              <div class="row mb-4">

                                                                                <p>Mesaj İçerik : <?php echo $mesajcek["mesaj_icerik"]; ?></p>
<h5>Kullanıcı Bilgileri</h5>
                                                                                  <p> <b>Kullanıcı Adı</b> :<?php echo $mesajcek["mesaj_kuladi"]; ?><br>
                                                                                   <b>E-POSTA</b> : <a style="color:#97A1BE" href="mailto:<?php echo $mesajcek["mesaj_posta"]; ?>"> <?php echo $mesajcek["mesaj_posta"]; ?></a><br>
                                                                                   <b>Telefon No</b> :<a style="color:#97A1BE" href="tel:<?php echo $mesajcek["mesaj_tel"]; ?>"> <?php echo $mesajcek["mesaj_tel"]; ?></a><br>

                                                                                 </p>

                                                                              </div>
<form  action="settings/adminislem" method="post">
                                                                              <div class="row mb-4">
<input type="hidden" name="id" value="<?php echo $mesajcek["mesaj_id"]; ?>">
                                                                                <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Mesaj Durum</label>
                                                                                <div class="col-sm-8">
                                                                                  <div class="input-group auth-pass-inputgroup">

                                                                                  <select class="form-control" name="mesaj_durum">
                                                                                    <optgroup label="Mesaj Durumu Değiştir"></optgroup>

                                                                                    <option <?php if ($mesajcek["mesaj_durum"]==0) {?>selected="selected"

                                                                                  <?php    } ?> value="0">Yeni Mesaj</option>
                                                                                    <option <?php if ($mesajcek["mesaj_durum"]==1) {?>selected="selected"

                                                                                  <?php    } ?> value="1">önemli</option>
                                                                                    <option <?php if ($mesajcek["mesaj_durum"]==2) {?>selected="selected"

                                                                                  <?php    } ?> value="2">acil</option>

                                                                                    <option <?php if ($mesajcek["mesaj_durum"]==3) {?>selected="selected"

                                                                                  <?php    } ?> value="3">işlemde</option>
                                                                                    <option <?php if ($mesajcek["mesaj_durum"]==4) {?>selected="selected"

                                                                                  <?php    } ?> value="4">kapatıldı</option>
                                                                                      <option <?php if ($mesajcek["mesaj_durum"]==5) {?>selected="selected"

                                                                                    <?php    } ?> value="5">cevaplandı</option>
                                                                                  </select>

                                                                                  </div>
                                                                                </div>

                                                                              </div>

                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>


                                                                        <button type="submit" name="mesajdurum" class="btn btn-primary">Kaydet</button>



</form>

                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                      </div>
<?php
$say++;
} ?>
</div>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                      </tbody>
                                                    </table>
</div>
                </div>

            </div>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
