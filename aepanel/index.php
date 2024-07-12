<?php include  'aelib.php'; ?>
<?php include 'inc/header.php'; ?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo bilgi("site_title","icerik"); ?> Dashboard </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">AEPANEL</a></li>
                                            <li class="breadcrumb-item active"><?php echo bilgi("site_title","icerik"); ?> Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div style="min-height:200px;" class="card">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Panele Hoşgeldin</h5>
                                                    <p><?php echo bilgi("site_title","icerik"); ?> Dashboard</p>
                                                    <?php



                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div style="width:70px; height:70px;" class="avatar-md profile-user mb-4">
                                                    <img  src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo $kullanıcıarat["uye_adi"]; ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?php

      echo yetkiMetni($yetki);
?></p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-5">

                                                  <?php //kullanıcı  ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mini-stats">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium"> Yeni Mesaj</p>
                                                <h4 class="mb-4"><?php echo verisay("mesajlar","mesaj_durum","0"); ?></h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center ">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fas fa-comment fa-lg"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="card mini-stats">
                                          <div class="card-body">
                                              <div class="d-flex">
                                                  <div class="flex-grow-1">
                                                      <p class="text-muted fw-medium">Toplam Admin</p>
                                                      <h4 class="mb-4"><?php echo verisay("uyeler","admin_yetki","4"); ?></h4>
                                                  </div>

                                                  <div class="flex-shrink-0 align-self-center ">
                                                      <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                          <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fas fa-address-book fa-lg"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Yönetici</p>
                                                        <h4 class="mb-4"><?php echo verisay("uyeler","admin_yetki","3"); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fas fa-users-cog fa-lg"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Editör</p>
                                                        <h4 class="mb-4"><?php echo verisay("uyeler","admin_yetki","2"); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                              <i class="fas fa-feather-alt fa-lg"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium"> Yeni Ziyaret Eden Kişi</p>
                                                        <h4 class="mb-4"><?php echo verisay("ziyaretciler","",""); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fab fa-google fa-lg"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Telefon Ziyaret </p>
                                                        <h4 class="mb-4"><?php echo verisay("ziyaretciler","ziyaretci_cihaz_turu","Telefon"); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                          <i class="fas fa-mobile-alt fa-2x"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Bilgisayar Ziyaret </p>
                                                        <h4 class="mb-4"><?php echo verisay("ziyaretciler","ziyaretci_cihaz_turu","Bilgisayar"); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fas fa-laptop fa-lg"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mini-stats">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Tablet Ziyaret </p>
                                                        <h4 class="mb-4"><?php echo verisay("ziyaretciler","ziyaretci_cihaz_turu","Tablet"); ?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fas fa-tablet-alt fa-2x"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->

                    </div>
                    <?php if ($yetki==1 or $yetki==0) {?>
                    <!-- container-fluid -->
                    <div class="col-md-12">
                        <div class="card mini-stats">
                          <div class="card-body">
                              <div class="d-flex">
                                  <div class="flex-grow-1">


                    <center>  <span key="t-dashboards">Panelde Düzenleme Yetkiniz Bulunmamakta Yönetici İle İletişime Geçiniz !</span> </center>

                          </div>
                          </div>
                          </div>
                          </div>
                    </div>
                        <?php    } ?>
                </div>
                <!-- End Page-content -->


<?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) { ?>


                                                <div class="row">
                                                <div class="col-lg-12">
                                                <div class="card">
                                                <div class="card-body">
                                                <h4 class="card-title mb-4">Son Ziyaretler</h4>
                                                <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
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
                                          $ziyaretci =vericek("ziyaretciler"," LIMIT 15","COK");
$say=1;
foreach($ziyaretci as $ziyaret ){ ?>

  <tr>


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
                                  <p>  <b> Cihaz Türü :</b> <?php echo  $ziyaret["ziyaretci_referer"];?></p>

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

                                                <?php if (isset($say)) {
                                                  if ($say>1) {?>
                                                    <center>
<a href="guvenlikayar#ziyaret">
                                                      <button type="button" class="btn btn-primary" name="button"> Daha Fazla</button>
                                                      </a>
                                                    </center>
                                                      <br>
                                                <?php  }
                                                } ?>


                                                </div>
                                                </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- end row -->



                <!-- end modal -->
<?php include 'inc/footer.php'; ?>
