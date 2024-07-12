<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php $izinler=[6,5,4,3];
yetki($izinler,$yetki);
?>
<?php
$uyeid=$_GET["num"];
$uyesor=$db->prepare("SELECT*FROM uyeler WHERE uye_id=:id");

$uyesor->execute(array(
'id'=>$uyeid
));
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);
$uyeyetkisi=$uyecek["admin_yetki"];




if ($uyeyetkisi==6) {
  if ($yetki==6) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
if ($uyeyetkisi==5) {
  if ($yetki==6) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
if ($uyeyetkisi==4) {
  if ($yetki==6 or $yetki==5) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
if ($uyeyetkisi==3) {
  if ($yetki==6 or $yetki==5 or $yetki==4) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
if ($uyeyetkisi==2) {
  if ($yetki==6 or $yetki==5 or $yetki==4  or $yetki==3) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
if ($uyeyetkisi==1) {
  if ($yetki==6 or $yetki==5 or $yetki==4  or $yetki==3) {

  }
  else {
      header("Location:index?durum=yetkisizdeneme");
  }
}
 ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">

                           Kullanıcı Düzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Kullanıcı Düzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
<?php

$uyesor=$db->prepare("SELECT*FROM uyeler WHERE uye_id=:id");

$uyesor->execute(array(
'id'=>$uyeid
));
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);
 ?>
            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Kullanıcı  Düzenle</h4>

                                    <form action="settings/adminislem" method="post">
                                      <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">  Adı Soyadı</label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $uyecek["uye_adi"]; ?>" name="uye_adsoyad"  placeholder="Üye  ad soyad giriniz">
                                          </div>
                                      </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı  Adı</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" <?php if ($yetki==6 or $yetki==5) {  }else { ?> disabled="disabled" <?php } ?>

                                              required="required"  value="<?php echo $uyecek["uye_kuladi"]; ?>" name="uye_kuladi"  placeholder="kullanıcı adı">

                                              <input type="hidden" value="<?php echo $yetki; ?>" class="form-control" required="required"  name="yi">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Mail</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" value="<?php echo $uyecek["uye_mail"]; ?>" name="uye_mail"  placeholder="mail adresi giriniz">
                                                <input type="hidden" class="form-control" value="<?php echo $uyecek["uye_id"]; ?>" name="uye_id"  placeholder="mail adresi giriniz">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Telefon</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" value="<?php echo $uyecek["uye_tel"]; ?>" name="uye_tel"  placeholder="telefon no giriniz  ">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kullanıcı Durumu</label>
                                            <div class="col-sm-8">
                                              <select class="form-select" name="durum" id="floatingSelectGrid" aria-label="Floating label select example">
<?php  $durum = $uyecek["uye_durum"];  ?>
                                                            <option <?php if($durum==1){ ?> selected=""<?php } ?> value="1">Aktif</option>
                                                            <option <?php if($durum==0){ ?> selected=""<?php } ?> value="0">Pasif</option>

                                                        </select>

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Yetkisi</label>
                                            <div class="col-sm-8">
                                              <select required="required" class="form-select" name="admin_yetki" id="floatingSelectGrid" aria-label="Floating label select example">

<?php  $ayetki = $uyecek["admin_yetki"];  ?>
                                                            <?php if ($yetki==5 or $yetki==6){ ?>
                                                          <option <?php if($ayetki==5){ ?> selected=""<?php } ?> value="5"> Developer</option>
                                                          <option <?php if($ayetki==4){ ?> selected=""<?php } ?> value="4"> Admin</option>
                                                          <option <?php if($ayetki==3){ ?> selected=""<?php } ?> value="3">Yönetici</option>
                                                          <option <?php if($ayetki==2){ ?> selected=""<?php } ?> value="2">editör</option>
                                                          <option <?php if($ayetki==1){ ?> selected=""<?php } ?> value="1">Panel Üyesi</option>
                                                            <option <?php if($ayetki==0){ ?> selected=""<?php } ?> value="0">Üye</option>
                                                          <?php } ?>

                                                        <?php if($yetki==4){ ?>
                                                            <option <?php if($ayetki==3){ ?> selected=""<?php } ?> value="3">Yönetici</option>
                                                            <option <?php if($ayetki==2){ ?> selected=""<?php } ?> value="2">editör</option>
                                                            <option <?php if($ayetki==1){ ?> selected=""<?php } ?> value="1">Panel Üyesi</option>
                                                              <option <?php if($ayetki==0){ ?> selected=""<?php } ?> value="0">Üye</option>
                                                        <?php } ?>

                                                        <?php if($yetki==3){?>
                                                          <option <?php if($ayetki==2){ ?> selected=""<?php } ?> value="2">editör</option>
                                                          <option <?php if($ayetki==1){ ?> selected=""<?php } ?> value="1">Panel Üyesi</option>
                                                          <option <?php if($ayetki==0){ ?> selected=""<?php } ?> value="0">Üye</option>
                                                        <?php } ?>

                                                        </select>

                                            </div>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">







  <button type="submit" name="pkullaniciduzenle" class="btn btn-primary w-md">Kullanıcı Düzenle</button>
</div>
</form>

<form  action="settings/adminislem" method="post">

<div class="col-sm-5">


  <input type="hidden" class="form-control" value="<?php echo $uyecek["uye_id"]; ?>" name="uye_id"  placeholder="mail adresi giriniz">


                            <?php if ($ayetki==5) { if($yetki==6) { ?>
                         <button type="submit" name="panelgirisyetkial" class="btn btn-danger w-md">Panele Giriş Yetkisini Al</button>
                          <?php  } } ?>
                            <?php if ($ayetki==4) { if($yetki==6 or $yetki==5) { ?>
                            <button type="submit" name="panelgirisyetkial" class="btn btn-danger w-md">Panele Giriş Yetkisini Al</button>
                          <?php  } } ?>
                          <?php if ($ayetki==3) { if($yetki==6 or $yetki==5 or $yetki==4) { ?>
                            <button type="submit" name="panelgirisyetkial" class="btn btn-danger w-md">Panele Giriş Yetkisini Al</button>
                        <?php  } }?>
                        <?php if ($ayetki==2) { if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) { ?>
                           <button type="submit" name="panelgirisyetkial" class="btn btn-danger w-md">Panele Giriş Yetkisini Al</button>
                        <?php  } } ?>
                        <?php if ($ayetki==1) { if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                          <button type="submit" name="panelgirisyetkial" class="btn btn-danger w-md">Panele Giriş Yetkisini Al</button>
                      <?php  } }?>
                        <?php if ($ayetki==0) { if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                          <button type="submit" name="panelgirisyetkiver" class="btn btn-success w-md">Panele Giriş Yetkisi ver</button>
                      <?php  } } ?>
</div>

</form>




                                    <div class="col-sm-12">
        <br>

        <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"]=="ok") {?>
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        Kayıt Başarıyla Güncellendi :]
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  }
        if ($_GET["durum"]=="no") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Kayıt Güncellenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        } ?>


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
