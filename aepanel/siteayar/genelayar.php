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
                                <h4 class="mb-sm-0 font-size-18">Site Ayarları</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                        <li class="breadcrumb-item active">Site Ayarları</li>
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

                                    <h4 class="card-title">Site Ayarları</h4>

                                    <form action="settings/adminislem" method="post" enctype="multipart/form-data">


                                            <div class="row mb-4">

                                                  <div class="input-group">
                                                      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Site Durum</label>
                                                        <div class="col-sm-8">
                                                          <select class="form-control" name="sitedurum">

                                                            <option <?php if(ayarcek("ayar_sitedurum")==0){ echo "selected"; } ?> value="0">Yapım Aşamasında</option>
                                                            <option <?php if(ayarcek("ayar_sitedurum")==1){ echo "selected"; } ?> value="1">Bakımda</option>
                                                            <option <?php if(ayarcek("ayar_sitedurum")==2){ echo "selected"; } ?> value="2">Yayında</option>
                                                          </select>
                                                           </div>

  </div>

                                      </div>
                                      <div class="row mb-4">

                                            <div class="input-group">
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Google Tag Manager İd</label>
                                                  <div class="col-sm-8">
                                                  <input type="text" name="gtag" class="form-control" value="<?php echo ayarcek("gtag"); ?>">
                                                     </div>

                                                   </div>

                                </div>
                                <div class="row mb-4">

                                      <div class="input-group">

                                            <div class="col-sm-8">
                                              <button type="submit" class="btn btn-primary" name="sitegayarkaydet">Kaydet</button>
                                             </div>


                          </div>
                          <?php if (isset($_GET["durum"])) {
                          if ($_GET["durum"]=="ok") {
                          ?>
                          </br>    </br>
                          </br>
                          <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                          Kayıt Başarıyla Güncellendi :]
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          </br>
                          <?php
                          }
                          else {
                             ?>
                           </br>
                           </br></br>
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            Kayıt  Güncellenirken Bir Sorun Oluştu ]:
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </br>
                            </div>
                            <?php
                          }
                          } ?>

    </div>
                                      </form>

<form  action="sitemap.php" method="post">
  <h4 class="card-title">Sitemap Güncelle</h4>
      <div class="row mb-4">
      <!--   <input type="file" id="input-file-now" class="dropify" data-default-file="" />-->



          <div class="col-sm-12">


<button type="submit" style="width:100%"  class="btn btn-outline-success" name="sitemapupdate"> <i class="fas fa-cogs"></i>  Sitemap Güncelle</button>


<?php if (isset($_GET["sitemapupdate"])) {
if ($_GET["sitemapupdate"]=="ok") {
?>
</br>
</br>
<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
Sitemap Başarıyla Güncellendi :]
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</br>
<?php
}
else {
   ?>
 </br>
 </br>
  <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  Sitemap  Güncellenirken Bir Sorun Oluştu ]:
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </br>
  </div>
  <?php
}
} ?>

          </div>

      </div>
</form>

                                    <form action="settings/adminislem" method="post" enctype="multipart/form-data">
                                      <h4 class="card-title">Görsel Ayarlar</h4>
                                          <div class="row mb-4">
                                          <!--   <input type="file" id="input-file-now" class="dropify" data-default-file="" />-->
                                              <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Site Logo</label>


                                              <div class="col-sm-12">
                                                <div class="input-group">
                                                         <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="" >
                                                            <input type="hidden" name="eski_yol" value="<?php echo ayarcek("ayar_logo"); ?>">

                                                         </div>

                                              </div>

                                          </div>
                                          <div class="row mb-4">
<div class="col-sm-4">
                                            <button class="btn btn-primary" type="submit" name="logokaydet" id="inputGroupFileAddon04">Logo Kaydet</button>
</div>
</div>
                                      </form>
</div>
<div class="card-body">


    <form action="settings/adminislem" method="post" enctype="multipart/form-data">

          <div class="row mb-4">
              <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Site Favicon</label>


              <div class="col-sm-12">
                <div class="input-group">
                           <input type="file" id="input-file-now" name="favicon" class="dropify" data-default-file="" />
                           <input type="hidden" name="eski_yol" value="<?php echo ayarcek("ayar_favicon"); ?>">

                         </div>
              </div>
          </div>

          <div class="row mb-4">

            <div class="col-md-6">
            <button class="btn btn-primary" type="submit" name="faviconkaydet" id="inputGroupFileAddon04">Favicon Kaydet</button>
            </div>
            </div>

      </form>


</div>
<?php if (isset($_GET["logo"])) {
  ?>
  <div class="container">
  <div class="col-sm-12 "> <?php
  if ($_GET["logo"]=="ok") {?>
	<div class="row justify-content">


<br>

<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
Logo Başarıyla Güncellendi :]
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</br>

<?php  }
if ($_GET["logo"]=="no") {
?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
<i class="fas fa-exclamation-triangle"></i> Logo Güncellenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
<?php
}
?>
<?php
if ($_GET["logo"]=="dosyauzantihatasi") {
?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
<i class="fas fa-exclamation-triangle"></i> Logo yüklenemedi Hatalı dosya uzantısı lütfen .jpeg .jpg veya .png uzantılı dosya kullanınız!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
<?php
}
?>
</div>
</div>
</div>
</br>
<?php } ?>

<?php if (isset($_GET["favicon"])) {
  ?><div class="container">
  <div class="col-sm-12">
    <?php
  if ($_GET["favicon"]=="ok") {?>
	<div class="row justify-content">



<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
favicon Başarıyla Güncellendi :]
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</br>
<?php  }
if ($_GET["favicon"]=="no") {
?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
<i class="fas fa-exclamation-triangle"></i> favicon Güncellenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</br>
<?php
}
?>
<?php
if ($_GET["favicon"]=="dosyauzantihatasi") {
?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
<i class="fas fa-exclamation-triangle"></i> Favicon yüklenemedi Hatalı dosya uzantısı lütfen .ico uzantılı dosya kullanınız!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</br>
<?php
}
?>
</div>
</div>
</div>
</br>
<?php } ?>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

                        <!-- end col -->
                    </div>
                    <!-- end row -->












<?php include '../inc/footer.php'; ?>
