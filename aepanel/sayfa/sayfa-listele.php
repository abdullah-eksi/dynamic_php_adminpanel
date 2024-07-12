<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php  $izinler=[6,5,4,3,2];
yetki($izinler,$yetki); ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">sayfa Listele</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sayfalar</a></li>
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

                                                        sayfalar</h4>

                                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                            <thead>
                                                            <tr>

                                                                <th>sayfa İd</th>
                                                                <th>Sayfa Adı</th>
                                                                <th>Sayfa Başlık</th>

                                                                <th>işlemler</th>

                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                              <?php
$sayfasor=$db->prepare("SELECT * FROM sayfalar");
$sayfasor->execute(array());
while($sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
                                                                        <td><?php echo $sayfacek["sayfa_id"]; ?></td>
                                                                        <td><?php echo $sayfacek["sayfa_adi"]; ?></td>
                                                                        <td><?php echo $sayfacek["sayfa_baslik"]; ?></td>

                                                                        <td>
                                                                          <div class="row">


                                                                              <div class="col-md-2">
                                                                            <a target="_blank" href="<?php echo"https://". $_SERVER["SERVER_NAME"]."/". $sayfacek["sayfa_url"]; ?>"> <button type="button" class="btn btn-info" name="button"> <i class="fa fa-eye"></i></button> </a>
                                                                              </div>
                                                                                <div class="col-md-2">
                                                                          <a href="sayfaduzenle-<?php echo $sayfacek["sayfa_id"]; ?>"> <button type="button" class="btn btn-success" name="button"> <i class="fa fa-edit "></i></button> </a>
</div>

<?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>

  <div class="col-md-2">
<form class="" action="settings/adminislem" method="post">
  <input type="hidden" name="num" value="<?php echo $sayfacek["sayfa_id"]; ?>">
<button type="submit" class="btn btn-danger" name="sayfasil"><i class="fa fa-trash"></i></button>
</form>

<?php } ?>


</div>

  </div>    </td>
  </tr>

<?php } ?>
 </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

</div>












<?php include '../inc/footer.php'; ?>
