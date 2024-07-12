<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>

<?php
  $izinler=[6,5,4,3,2];
yetki($izinler,$yetki);


$tablo_id=$_GET["num"];

$tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);
  $tablo_baslik = tekvericek("tablolar", "tablo_baslik", "tablo_id", $tablo_id);
  // Sayfa numarasını belirle
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

  // Kaç veri gösterileceğini belirle
  $limit = 10;
  // Offset hesapla
  $offset = ($page - 1) * $limit;


  $iceriksayisi=verisay($tablo_adi,"","");
  $total_pages = ceil($iceriksayisi / $limit);
?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo $tablo_baslik; ?> Listele</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index">Anasayfa</a></li>

                                <li class="breadcrumb-item active"><a href="" ><?php echo $tablo_baslik; ?></a></li>
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

                                                        <?php echo $tablo_baslik; ?></h4>


                                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                                <thead>
                                                                <tr>

                                                                    <th>icerik id</th>

                                                                    <th>Başlık</th>
                                                                    <th>Tablo Adı</th>

                                                                    <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3 or $yetki==2){?>
                                                                    <th>İşlemler</th>
                                                                  <?php } ?>
                                                                </tr>
                                                                </thead>


                                                                <tbody>
                                                                  <?php
                                                                  $iceriksor=$db->prepare("SELECT * FROM $tablo_adi LIMIT $limit OFFSET $offset");
                                                                  $iceriksor->execute(array());
                                                                  while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC))
                                                                  {
                                                                        $id = $icerikcek["id"];

                                                                        $baslik = $icerikcek["sekilbaslik"];
                                                              ?>

                                                                    <tr>
                                                                        <td><?php echo $id; ?></td>
                                                                        <td><?php echo $baslik; ?></td>

                                                                        <td><?php echo $tablo_adi; ?></td>


                                                                        <td> <div class="col-md-12">

   <div class="row">

    <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3){?>
                                                                            <div class="col-md-2">


                                                                         <a href="icerikduzenle-<?php echo $id; ?>-<?php echo $tablo_id; ?>"> <button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                        </div>
    <?php } ?>
                                                                        <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3  or $yetki==2){?>


                                                                        <div class="col-md-3">

                                                                            <form class="" action="settings/adminislem" method="post">
                                                                              <input type="hidden" name="id" value="<?php echo $id ; ?>">
                                                                                <input type="hidden" name="num" value="<?php echo $tablo_id ; ?>">
                                                                            <button class="btn btn-danger btn-xs" name="iceriksil" type="submit"> <i  class="fa fa-trash"></i> </button>
                                                                          </form>



                                                                            <?php }?>

                                                                             </div>
                                                                             </div>  </div>
                                                                         </td>

                                                                    </tr>

                                                                  <?php
                                                                  }
                                                                  ?>


                                                            </table>

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
