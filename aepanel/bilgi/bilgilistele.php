<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php
$izinler=[6,5,4,3,2];
yetki($izinler,$yetki);


$bilgikategori_id=$_GET["num"];


$tablo_adi = tekvericek("bilgikategori", "bilgikategori_adi", "bilgikategori_id", $bilgikategori_id);



// Sayfa numarasını belirle
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Kaç veri gösterileceğini belirle
$limit = 10;
// Offset hesapla
$offset = ($page - 1) * $limit;


$iceriksayisi=verisay("bilgi","kategori_id",$bilgikategori_id);

$total_pages = ceil($iceriksayisi / $limit);
?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Bilgi Listele</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>

                                <li class="breadcrumb-item active"><a href="bilgilistele-<?php echo $bilgikategori_id; ?>" ><?php echo $tablo_adi;?></a></li>
                                <li class="breadcrumb-item active">Listele</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <div class="table-responsive">
                                                          <h4 class="card-title">

                                                      <?php echo $tablo_adi;?> </h4>


                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                                                <thead>
                                                                <tr>

                                                                    <th>#</th>
                                                                    <th>Bilgi kodu(kaynak kodu)</th>
                                                                    <th>Bilgi Adı</th>

                                                                    <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3 or $yetki==2){?>
                                                                    <th>İşlemler</th>
                                                                  <?php } ?>
                                                                </tr>
                                                                </thead>


                                                                <tbody>
                                                                  <?php
                                                                  $say=0;

                                                                $bilgisor=vericek("bilgi","Where kategori_id='$bilgikategori_id' LIMIT $limit OFFSET $offset","COK");



                                                                    foreach ($bilgisor as $bilgicek) {

                                                                    $bilgid=$bilgicek["bilgi_id"];
                                                                   ?>
                                                                <tr>
                                                                    <td><?php echo $say; ?></td>

                                                                    <td><?php echo $bilgicek["bilgiadi"]; ?></td>
                                                                    <td><?php echo $bilgicek["bilgi_title"]; ?></td>


                                                                    <td> <div class="col-md-12">


                                                                       <div class="row">
                                                                         <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3  or $yetki==2){?>
                                                                        <div class="col-md-2">


                                                                     <a href="bilgiduzenle-<?php echo $bilgikategori_id; ?>-<?php echo $bilgid; ?>"> <button class="btn btn-success" type="button" name="button"> <i class="fa fa-edit"></i></button></a>
                                                                    </div>
                                                                  <?php } ?>
                                                                    <?php if($yetki==6 or $yetki==5){?>

                                                              <div class="col-md-2">
                                                                  <button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?php echo $say; ?>"> <i class="fa fa-eye "></i> </button>
                                                              </div>
                                                                    <div class="col-md-2">
                                                                      <div>




                                                                        <form class="" action="settings/adminislem" method="post">
                                                                          <input type="hidden" name="no" value="<?php echo $bilgid; ?>">
                                                                          <input type="hidden" name="yetki" value="<?php echo $yetki; ?>">
                                                                        <button class="btn btn-danger" type="submit" name="bilgisil"><i  class="fa fa-trash"></i></button>
                                                                      </form>
                                                                        <div class="modal fade" id="exampleModalCenter<?php echo $say; ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
                                                                          <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Nasıl Kullanılır</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                              <div class="col-xl-12">
                                                                                <div class="card">
                                                                                  <div class="card-body">
                                                                                    <h4 class="card-title mb-4"></h4>
                                                                                    <div  class="row mb-4">
                                                                                      <div style="background-color:black; color:green; border-radius:5px;">
                                                                                        <br>
                                                                                    <p>Başlığı çekmek için < ?php  echo bilgi("<?php echo $bilgicek["bilgiadi"];?>","baslik");   ?>  </p>
                                                                                    <p>İçeriği çekmek için < ?php  echo bilgi("<?php echo $bilgicek["bilgiadi"];?>","icerik");   ?></p>
                                                                                    <p>İconu çekmek için < ?php  echo bilgi("<?php echo $bilgicek["bilgiadi"];?>","icon");   ?> </p>
                                                                                      <p>Kodun Çalışması İçin php taglarındaki boşlukları silmeyi unutma !!! </p>
                                                                                          <br>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>

                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>

                                                                        <?php }?>

                                                                         </div>
                                                                     </td>

                                                                </tr>
<?php $say++; } ?>
                                                            </table>
                                                        </div>


                                                        </div>
                                                        <div class="row">


<div class="col-md-5">

</div>
<div class="col-md-4">


                                                          <?php

                                                          // Toplam sayfa sayısını hesapla
                                                          $total_pages = ceil($iceriksayisi / $limit);

                                                          // Sayfalama bağlantılarını oluştur
                                                          echo '<ul class="pagination">';
                                                          if ($page > 1) {
                                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Önceki</a></li>';
                                                          }
                                                          for ($i = 1; $i <= $total_pages; $i++) {
                                                            echo '<li class="page-item' . ($page == $i ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                                          }
                                                          if ($page < $total_pages) {
                                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Sonraki</a></li>';
                                                          }
                                                          echo '</ul>';



                                                           ?>

</div>        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

</div>












<?php include '../inc/footer.php'; ?>
