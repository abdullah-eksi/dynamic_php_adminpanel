<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>

<?php  $izinler=[6,5,4,3];
yetki($izinler,$yetki); ?>
<?php
$result = kullaniciliste($yetki, $_GET["no"]);
$no = $result["no"];
$yetkiadi = $result["yetkiadi"];

 ?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo $yetkiadi; ?> Listesi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><?php echo $yetkiadi; ?>ler</li>
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
                                                            <h4 class="card-title"><?php echo $yetkiadi; ?> Yetkisine Sahip Kullanıcı Listesi</h4>


                                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                                <thead>
                                                                <tr>

                                                                    <th>Kullanıcı İd</th>
                                                                    <th>Kullanıcı Kayıt Tarihi</th>
                                                                      <th>Kullanıcı Kayıt İp</th>
                                                                    <th>Kullanıcı Adı</th>
                                                                    <th>Kullanıcı Sosyal Bağlantılar</th>
                                                                    <th>Kullanıcı Mail</th>
                                                                    <th>Kullanıcı Telefon NO</th>
                                                                    <th>kullanıcı Yetki</th>
                                                                    <th>Kullanıcı Durum</th>
                                                                    <th>İşlemler</th>
                                                                </tr>
                                                                </thead>


                                                                <tbody>
                                                                  <?php
                                                                  $adminksor=$db->prepare("SELECT * FROM uyeler where admin_yetki=:yetki");
                                                                                     $adminksor->execute(array(
                                                                                       "yetki"=>$no
                                                                                     ));

                                                                  while($adminkcek=$adminksor->fetch(PDO::FETCH_ASSOC)){

                                                                   ?>
                                                                <tr>

                                                                      <td><?php echo $adminkcek["uye_id"]; ?></td>
                                                                      <td><?php echo $adminkcek["uye_tarih"]; ?></td>
                                                                        <td><?php echo $adminkcek["uye_ip"]; ?></td>
                                                                      <td><?php echo $adminkcek["uye_kuladi"]; ?></td>
                                                                      <td>
                                                                        <a style="color:purple"  href="<?php echo $adminkcek["uye_instagram"]; ?>" > <i class="fab fa-instagram fa-lg"></i> </a>
                                                                        <a style="color:#00acee" href="<?php echo $adminkcek["uye_twitter"]; ?>"><i class="fab fa-twitter fa-lg"></i> </a>
                                                                        <a style="color:#3b5998" href="<?php echo $adminkcek["uye_facebook"]; ?>"> <i  class="fab fa-facebook fa-lg" ></i></a>
                                                                        <a style="color:#0e76a8" href="<?php echo $adminkcek["uye_linkedin"]; ?>"><i class="fab fa-linkedin fa-lg"></i></a>
                                                                        <a style="color:#c4302b" href="<?php echo $adminkcek["uye_youtube"]; ?>"> <i class="fab fa-youtube fa-lg"></i> </td>
                                                                      <td><?php echo $adminkcek["uye_mail"]; ?></td>
                                                                      <td><?php echo $adminkcek["uye_tel"]; ?></td>
                                                                      <td>
                                                                        <?php
                                                                        if($adminkcek["admin_yetki"]==5)
                                                                        {
                                                                          echo "Developer";
                                                                        }
                                                                          if($adminkcek["admin_yetki"]==4)
                                                                          {
                                                                            echo "Admin";
                                                                          }
                                                                          elseif ($adminkcek["admin_yetki"]==3)
                                                                          {
                                                                            echo "Yönetici";
                                                                          }
                                                                          elseif ($adminkcek["admin_yetki"]==2)
                                                                          {
                                                                            echo "Editör";
                                                                          }
                                                                          elseif ($adminkcek["admin_yetki"]==1)
                                                                          {
                                                                            echo "Panel Üye";
                                                                          }
                                                                          elseif ($adminkcek["uye_yetki"]==0)
                                                                          {
                                                                            echo "Üyeler";
                                                                          }
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                         if($adminkcek["uye_durum"]==1)
                                                                         {
                                                                           echo "Aktif";
                                                                         }
                                                                         elseif ($adminkcek["uye_durum"]==0) {
                                                                           echo "Pasif";
                                                                         }
                                                                         ?>
                                                                      </td>
                                                                    <td>
                                                                      <div class="col-md-12">
                                                                          <div class="row">
<?php if ($no==5) {
if ($yetki==6) { ?>

  <?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                          <div class="col-md-6">


                                                                       <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"> <button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                      </div>
<?php  } }?>

<?php if ($no==4) {
if ($yetki==6 or $yetki==5) { ?>

  <?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                          <div class="col-md-6">


                                                                       <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"> <button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                      </div>
<?php  } }?>

<?php if ($no==3) {

if ($yetki==6 or $yetki==5 or $yetki==4) { ?>
  <?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                          <div class="col-md-6">


                                                                       <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"><button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                      </div>
<?php  } }?>

<?php if ($no==2) {

if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) { ?>
  <?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                          <div class="col-md-6">


                                                                       <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"> <button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                      </div>
<?php  } }?>

<?php if ($no==1) {

if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) { ?>
<?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                        <div class="col-md-6">


                                                                     <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"><button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                    </div>
<?php  } }?>
<?php if ($no==0) {

if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) { ?>
<?php $uyeidc=$adminkcek["uye_id"]; ?>

                                                                        <div class="col-md-6">


                                                                     <a href="kullaniciduzenle-<?php echo $uyeidc; ?>"> <button class="btn btn-success"> <i class="fa fa-edit "></i></button></a>
                                                                    </div>
<?php  } }?>





                                                                            </div>
                                                                         </div>
                                                                     </td>

                                                                </tr>
<?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

</div>








<?php include '../inc/footer.php'; ?>
