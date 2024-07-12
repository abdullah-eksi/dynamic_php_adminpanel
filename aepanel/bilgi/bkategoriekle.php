<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php
$izinler=[5,6];
yetki($izinler,$yetki);
?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Kategori Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>/bilgikategorilistele">Bilgi Kategorileri</a></li>

                                <li class="breadcrumb-item active">Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>




              <div class="col-xl-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="card-title mb-4">Bilgiler Kategori Ekle</h4>

                                      <form action="settings/adminislem" method="post">
                                          <div class="row mb-4">
                                              <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Bilgi Kategori Adı</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kategori"  placeholder="Kategori adı giriniz ">
                                              </div>
                                          </div>



                                          <div class="row justify-content">
                                              <div class="col-sm-10">



                                                  <div style="float:right">
                                                      <button type="submit" name="bkategoriekle" class="btn btn-primary w-md">Yeni Ekle</button>
                                                  </div>

                                              </div>

                                              <div class="col-sm-10">
<br>

<?php if (isset($_GET["durum"])) {
if ($_GET["durum"]=="ok") {?>
  <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  Kayıt Başarıyla Eklendi :]
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php  }
if ($_GET["durum"]=="no") {
?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
<i class="fas fa-exclamation-triangle"></i> Kayıt eklenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
} ?>


                                            </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- end card body -->
                              </div>
                              <!-- end card -->
                          </div>
                          <!-- end col -->
                      </div>
                      <!-- end row -->







<?php include '../inc/footer.php'; ?>
