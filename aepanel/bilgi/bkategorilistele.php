<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php
$izinler=[5,6];
yetki($izinler,$yetki);


// Sayfa numarasını belirle
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Kaç veri gösterileceğini belirle
$limit = 10;
// Offset hesapla
$offset = ($page - 1) * $limit;


$iceriksayisi=verisay("bilgikategori","","");

$total_pages = ceil($iceriksayisi / $limit);
?>
<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Kategori listele</h4>


                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                              <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>/bilgikategorilistele">Bilgi Kategorileri</a></li>

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
                                                <h4 class="card-title">Bilgi Kategorileri</h4>


                                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                    <thead>
                                                    <tr>

                                                        <th>Kategori İd</th>
                                                        <th>Kategori Adı</th>
                                                        <th>İşlemler</th>

                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                      <?php
                                                      $bkategorisor=vericek("bilgikategori","LIMIT $limit OFFSET $offset","COK");



                                                          foreach ($bkategorisor as $bkategoricek) {


                                                        $bkategoriid=$bkategoricek["bilgikategori_id"];
                                                       ?>
                                                    <tr>

                                                        <td><?php echo $bkategoricek["bilgikategori_id"]; ?></td>
                                                        <td><?php echo $bkategoricek["bilgikategori_adi"];; ?></td>

                                                        <td>   <div class="col-md-12">


                                                           <div class="row">
<div class="col-md-2">


                                                         <a href="bkategoriduzenle-<?php echo $bkategoriid; ?>">  <button class="btn btn-success" name="button"> <i class="fa fa-edit"></i></button></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                          <form  action="settings/adminislem" method="post">


                                                          <input type="hidden" name="bkategorid" value="<?php echo $bkategoriid; ?>">
                                                           <button class="btn btn-danger" type="submit" name="bkategorisil">   <i  class="fa fa-trash"></i> </button>
                                                             </form>
                                                              </div>
                                                             </div>
                                                              </div>
                                                         </td>

                                                    </tr>
<?php

} ?>

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
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

</div>






<?php include '../inc/footer.php'; ?>
