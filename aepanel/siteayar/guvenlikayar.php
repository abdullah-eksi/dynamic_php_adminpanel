<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php
$izinler=[6,5,4,3];
yetki($izinler,$yetki);
?>



<div class="main-content">



            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Güvenlik Ayarları</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                        <li class="breadcrumb-item active">Güvenlik Ayarları</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">İp Engelle</h4>

                                    <form action="settings/adminislem" method="post" enctype="multipart/form-data">


                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">İp Adresi</label>
                                                <div class="col-sm-8">
                                                <input type="text" placeholder="xxx.xxx.xxx.xxx" class="form-control" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" name="ip_adresi">
                                                  </div>
                                                  </div>
                                                  <div class="row mb-4">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Uzaklaştırma Süresi</label>
                                                      <div class="col-sm-8">
                                                        <select class="form-control" name="banned_time">
                                                          <option value="180">30 Dakika</option>
                                                          <option value="3600">1 Saat</option>
                                                          <option value="7200">2 Saat</option>
                                                          <option value="18000">5 Saat</option>
                                                          <option value="86400">1 Gün</option>
                                                          <option value="259200">3 Gün</option>
                                                          <option value="604800">1 Hafta</option>
                                                          <option value="1209600">2 Hafta</option>
                                                          <option value="2592000">1 Ay</option>
                                                          <option value="15552000">6 Ay</option>
                                                          <option value="31536000">1 yıl</option>
                                                          <option value="157680000">5 yıl</option>
                                                          <option value="315360000">10 yıl</option>
                                                          <option value="0">Kalıcı</option>

                                                      </select>
                                                        </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Ban Sebebi</label>
                                                            <div class="col-sm-8">
                                                            <input type="text"  class="form-control"   name="ban_sebebi">
                                                              </div>
                                                              </div>
                                                  <div class="row mb-4">

                                                  <button type="submit" class="btn btn-info" name="ipengelle">Engelle</button>

                                                </div>
    </form>
                                                  </div>
                                                </div>
                                              </div>

  </div>

  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">


                <h4 class="card-title mb-4">Banlanan İp Adresleri</h4>
                <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                <thead class="table-dark">

                <tr>


                <th class="align-middle">Banlanan İp</th>
                <th class="align-middle">Banlanma  Tarihi</th>
                <th class="align-middle">Ban Sebebi</th>
                <th class="align-middle">Banned By</th>
                <th class="align-middle">İşlemler</th>

                </tr>
                </thead>
                <tbody>
<?php
$banlilar=vericek("banned_ips","","COK");
foreach ($banlilar as $banned) {
$userid=$banned["banned_by"];

$kadi = tekvericek("uyeler", "uye_kuladi", "uye_id", "$userid");

 ?>
                  <tr>
                    <td><?php echo $banned["banned_ip"]; ?></td>
                    <td><?php echo $banned["ban_date"]; ?></td>
                    <td><?php echo $banned["reason"]; ?></td>
                    <td><?php echo $kadi; ?></td>
                    <td> <form  action="settings/adminislem" method="post">
                      <input type="hidden" name="no" value="<?php echo $banned["id"]; ?>">
                     <button type="submit" name="bankaldir" class="btn btn-danger">  <i class="fas fa-trash"></i> </button> </form></td>
                  </tr>
<?php } ?>

                </tbody>
                </table>

                </div>

                </div>
                              </div>
                            </div>

</div>

</div>








  <div class="row">
      <div class="col-12">
          <div class="card">

                                                                                                  <div class="card-body">
                                                                                                    <div class="col-md-12">
                                                                                                    <div class="row">


                                                                                                      <div class="col-md-10">
                                                                                                  <h4 class="card-title mb-4">Son Ziyaretler</h4>


                                                                                                  </div>
                                                                                                  <div class="col-md-2">
                                                                                                      <form class="" action="settings/adminislem" method="post">
                                                                                                  <?php
                                                                                                  if ($yetki == 6 or $yetki==5  or $yetki==4) {?>
                                                                                                    <button type="button" class="btn btn-outline-danger  waves-effect waves-light  mb-4" data-bs-toggle="modal" data-bs-target=".transaction-detailModalsil">
                                                                                                  Kayıtları Sil
                                                                                                    </button>




                                                                                                    <div class="modal fade transaction-detailModalsil" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabelsil" aria-hidden="true">
                                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                    <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="transaction-detailModalLabelsil">Ziyaret Kayıtlarını Sil</h5>
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                      <p>Siteye Gelen Tüm Ziyaret Kayıtları Silincektir Onaylıyormusunuz ?</p>

                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="submit" name="ziyaretruncate" class="btn btn-danger" data-bs-dismiss="modal">Evet Onaylıyorum</button>
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hayır</button>
                                                                                                    </div>
                                                                                                    </form>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                              <?php    }

                                                                                                   ?>
                                                                                                      </form>
                                                                                                  </div>
                                                                                                      </div>
                                                                                                      </div>
                                                                                                  <div class="table-responsive">
                                                                                                  <table class="table align-middle table-nowrap mb-0">
                                                                                                  <thead class="table-dark">
                                                                                                  <tr>


                                                                                                  <th class="align-middle">İp Adresi</th>
                                                                                                  <th class="align-middle">Ziyaret Tarihi</th>
                                                                                                  <th class="align-middle">Ziyaret Cihaz</th>
                                                                                                  <th class="align-middle">Cihaz Türü</th>

                                                                                                  <th class="align-middle">Detaylı Görüntüle</th>
                                                                                                  </tr>
                                                                                                  </thead>
                                                                                                  <tbody>
                                                                                                  <?php


                                                                                                  // Sayfa numarasını belirle
                                                                                                  $page2 = isset($_GET['page2']) ? (int)$_GET['page2'] : 1;

                                                                                                  // Kaç veri gösterileceğini belirle
                                                                                                  $limit = 15;
                                                                                                  // Offset hesapla
                                                                                                  $offset = ($page2 - 1) * $limit;


                                                                                                  $iceriksayisi=verisay("ziyaretciler","","");

                                                                                                  $total_pages = ceil($iceriksayisi / $limit);

                                                                                                  $ziyaretci =vericek("ziyaretciler","ORDER BY ziyaret_tarihi DESC LIMIT $limit OFFSET $offset ","COK");
                                                                                                  $say=1;

                                                                                                  foreach($ziyaretci as $ziyaret ){ ?>

                                                                                                  <tr id="ziyaret">


                                                                                                  <td><?php echo $ziyaret["ziyaretci_ip"] ;?></td>
                                                                                                  <td>
                                                                                                  <?php echo $ziyaret["ziyaret_tarihi"];?>
                                                                                                  </td>
                                                                                                  <td>
                                                                                                  <?php echo $ziyaret["ziyaretci_cihaz_bilgisi"] ;?>
                                                                                                  </td>
                                                                                                  <td>
                                                                                                  <span class="badge badge-pill badge-soft-success font-size-11"><?php echo $ziyaret["ziyaretci_cihaz_turu"] ;?></span>
                                                                                                  </td>

                                                                                                  <td>

                                                                                                  <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal<?php echo $say; ?>">
                                                                                                  Detaylı Görüntüle
                                                                                                  </button>
                                                                                                  </td>
                                                                                                  </tr>

                                                                                                  <div class="modal fade transaction-detailModal<?php echo $say; ?>" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel<?php echo $say; ?>" aria-hidden="true">
                                                                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                  <div class="modal-content">
                                                                                                  <div class="modal-header">
                                                                                                  <h5 class="modal-title" id="transaction-detailModalLabel<?php echo $say; ?>">Ziyaret Detayı</h5>
                                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                  </div>
                                                                                                  <div class="modal-body">

                                                                                                  <p> <b> İp Adresi :</b> <?php echo $ziyaret["ziyaretci_ip"] ;?></p>
                                                                                                  <p>  <b> Ziyaret Tarhi :</b> <?php echo  $ziyaret["ziyaret_tarihi"];?></p>
                                                                                                  <p>  <b> User Agent :</b> <?php echo  $ziyaret["ziyaretci_useragent"];?></p>
                                                                                                  <p>  <b> Cihaz Bilgisi :</b> <?php echo  $ziyaret["ziyaretci_cihaz_bilgisi"];?></p>
                                                                                                  <p>  <b> Cihaz Türü :</b> <?php echo  $ziyaret["ziyaretci_cihaz_turu"];?></p>
                                                                                                    <p>  <b> Referer  Bilgisi :</b> <?php echo  $ziyaret["ziyaretci_referer"];?></p>
                                                                                                  <hr>
                                                                                                  <h6 class="modal-title">Kullanıcıyı Uzaklaştır</h6>
                                                                                                  <br>
                                                                                                  <form class="" action="settings/adminislem" method="post">


                                                                                                  <div class="row mb-4">
                                                                                                  <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ban Sebebi</label>
                                                                                                  <div class="col-sm-7">
                                                                                                  <input type="text" required class="form-control" name="ban_sebebi">
                                                                                                  <input type="hidden"  required class="form-control" name="ip_adresi" value="<?php echo $ziyaret["ziyaretci_ip"] ; ?>">
                                                                                                  </div>
                                                                                                  </div>
                                                                                                  <div class="row mb-4">
                                                                                                  <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Uzaklaştırma Süresi</label>
                                                                                                  <div class="col-sm-7">
                                                                                                  <select required class="form-control" name="banned_time">
                                                                                                  <option value="180">30 Dakika</option>
                                                                                                  <option value="3600">1 Saat</option>
                                                                                                  <option value="7200">2 Saat</option>
                                                                                                  <option value="18000">5 Saat</option>
                                                                                                  <option value="86400">1 Gün</option>
                                                                                                  <option value="259200">3 Gün</option>
                                                                                                  <option value="604800">1 Hafta</option>
                                                                                                  <option value="1209600">2 Hafta</option>
                                                                                                  <option value="2592000">1 Ay</option>
                                                                                                  <option value="15552000">6 Ay</option>
                                                                                                  <option value="31536000">1 yıl</option>
                                                                                                  <option value="157680000">5 yıl</option>
                                                                                                  <option value="315360000">10 yıl</option>
                                                                                                  <option value="0">Kalıcı</option>
                                                                                                  </select>
                                                                                                  </div>
                                                                                                  </div>

                                                                                                  </div>
                                                                                                  <div class="modal-footer">
                                                                                                  <button type="submit" name="ipengelle2" class="btn btn-danger">Kullanıcıyı Uzaklaştır</button>
                                                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                                                                                  </div>
                                                                                                  </form>
                                                                                                  </div>
                                                                                                  </div>
                                                                                                  </div>

                                                                                                  <?php
                                                                                                  $say++;
                                                                                                  } ?>

                                                                                                  </tbody>
                                                                                                  </table>

                                                                                                  </div>

                                                                                                  </div>
<div class="col-md-12">
<div class="row">
<div class="col-md-3">

</div>

<div class="col-md-6">
                                                                                                                                                                                                      <?php

                                                                                                                                                                                                      // Toplam sayfa sayısını hesapla
                                                                                                                                                                                                      $total_pages = ceil($iceriksayisi / $limit);

                                                                                                                                                                                                      // Sayfalama bağlantılarını oluştur
                                                                                                                                                                                                      echo '<ul class="pagination">';
                                                                                                                                                                                                      if ($page2 > 1) {
                                                                                                                                                                                                        echo '<li class="page-item"><a class="page-link" href="?page2=' . ($page2 - 1) . '">Önceki</a></li>';
                                                                                                                                                                                                      }
                                                                                                                                                                                                      for ($i = 1; $i <= $total_pages; $i++) {
                                                                                                                                                                                                        echo '<li class="page-item' . ($page2 == $i ? ' active' : '') . '"><a class="page-link" href="?page2=' . $i . '">' . $i . '</a></li>';
                                                                                                                                                                                                      }
                                                                                                                                                                                                      if ($page2 < $total_pages) {
                                                                                                                                                                                                        echo '<li class="page-item"><a class="page-link" href="?page2=' . ($page2 + 1) . '">Sonraki</a></li>';
                                                                                                                                                                                                      }
                                                                                                                                                                                                      echo '</ul>';



                                                                                                                                                                                                       ?>

                                                                                                                                                                                                     </div>
</div>

</div>









                                                </div>






                                              </div>

                                              </div>




</div>




</div>










<?php include '../inc/footer.php'; ?>
