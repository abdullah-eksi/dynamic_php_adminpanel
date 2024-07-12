<?php

include '../aelib.php';
include '../inc/header.php';



$sayfaid=get("num");
$izinler=[6,5,4,3,2];
yetki($izinler,$yetki);
$sayfacek=vericek("sayfalar","Where sayfa_id='$sayfaid'","TEK");

?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">

                         Sayfa duzenle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sayfalar</a></li>

                                <li class="breadcrumb-item active">Sayfa duzenle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"> Sayfa  duzenle</h4>

                                    <form action="settings/adminislem" method="post">

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Sayfa Url</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="seourl" required="" disabled="" value=" <?php echo $_SERVER["SERVER_NAME"]."/sayfa-". substr($sayfacek["sayfa_url"],6); ?>"  placeholder="olusturulcak url girin">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Sayfa  Adi</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="sayfaadi" required="" value="<?php echo $sayfacek["sayfa_adi"]; ?>"  placeholder="sayfa adı giriniz">
                                              <input type="hidden" class="form-control" name="id" required="" value="<?php echo $sayfacek["sayfa_id"]; ?>" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Sayfa  Başlık</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="sayfabaslik" required="" value="<?php echo $sayfacek["sayfa_baslik"]; ?>" placeholder="sayfa  icerik başlığı giriniz ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"  class="col-sm-2 col-form-label">Sayfa  İcerik</label>
                                            <div class="col-sm-8">

                                              <textarea  name="sayfaicerik" id="editor"  class="ck_editor">  <?php echo $sayfacek["sayfa_icerik"]; ?> </textarea>

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"  class="col-sm-2 col-form-label">Sayfa  Meta keywords</label>
                                            <div class="col-sm-8">

                                                <input type="text" class="form-control" name="keywords" value="<?php echo $sayfacek["keywords"]; ?>" placeholder="sayfa  meta keywords ">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"  class="col-sm-2 col-form-label">Sayfa Meta Description</label>
                                            <div class="col-sm-8">

                                              <textarea  name="description" rows="6"  class="form-control">  <?php echo $sayfacek["description"]; ?> </textarea>

                                            </div>
                                        </div>

                                        <div class="row justify-content">
                                            <div class="col-sm-10">



                                                <div style="float:right">
                                                    <button type="submit" name="sayfaduzenle" class="btn btn-primary w-md"> duzenle</button>
                                                </div>

                                            </div>

                                            <div class="col-sm-10">
        <br>

        <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"]=="ok") {?>
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        Kayıt Başarıyla duzenlendi :]
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  }
        if ($_GET["durum"]=="no") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Kayıt duzenlenirken bir sorun oluştu lütfen Tekrar Deneyiniz !
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
