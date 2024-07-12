<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>

<?php  $izinler=[6,5,4,3,2];
yetki($izinler,$yetki); ?>
<?php



$menu_id=get("no");
 ?>

<?php $veri=vericek("menuler","Where menu_id ='$menu_id'","TEK"); ?>

<?php
$kategori_id=$veri["menukat_id"];
 ?>

<?php $veriler=vericek("menukategori","Where menukat_id ='$kategori_id'","TEK"); ?>




<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Menü Düzenle</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="menulistele-<?php echo $veriler["menukat_id"];?>"><?php echo $veriler["kategori_adi"]; ?> Menü</a></li>
                <li class="breadcrumb-item active">Menü Düzenle</li>
                    <li class="breadcrumb-item active"><?php echo $veri["menu_adi"]; ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-4">Menu  Ekle</h4>

                  <form action="settings/adminislem" method="post">
                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  Link</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="menu_link" value="<?php echo $veri["menu_link"]; ?>"  placeholder="menu linki giriniz">
                          </div>
                      </div>

                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu Adı</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="menu_adi" value="<?php echo $veri["menu_adi"]; ?>"  placeholder="Menu icerik giriniz ">
                          </div>
                      </div>
                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  İcon</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="menuicon"  value="<?php echo $veri["menu_icon"]; ?>"  placeholder="Menu icon giriniz ">

                          </div>
                      </div>
                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Menu  Sıra</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="sira"  value="<?php echo $veri["menu_sira"]; ?>"  placeholder="Menu sıra giriniz ">
                            <input type="hidden" name="id" value="<?php echo $veri["menu_id"]; ?>">
                            <input type="hidden" name="katid" value="<?php echo $veriler["menukat_id"];?>">
                          </div>
                      </div>
                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Alt  Menu</label>
                          <div class="col-sm-8">

                            <select class="form-control" name="parent_id">
                              <option selected="" value="0">Hayır</option>

<?php $parent=vericek("menuler","Where menukat_id ='$kategori_id'","COK"); ?>
<?php foreach ($parent as $key){ ?>


                                <option <?php if ($veri["parent_id"]==$key["menu_id"]) {
                            echo "selected";
                                } ?> value="<?php echo $key["menu_id"]; ?>"><?php echo $key["menu_adi"]; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                      </div>
                      <div class="row justify-content">
                          <div class="col-sm-10">



                              <div style="float:right">
                                  <button type="submit" name="menuduzenle" class="btn btn-primary w-md">Düzenle</button>
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
        </div>




      </div>
    </div>
  </div>
</div>
<?php include '../inc/footer.php'; ?>
