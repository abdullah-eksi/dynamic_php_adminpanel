<?php include '../aelib.php'; ?>

<?php include '../inc/header.php'; ?>

<?php  $izinler=[5,6];
yetki($izinler,$yetki); ?>









<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tablo listele</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>"> Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="tablolistele"> Tablolar</a></li>
                            <li class="breadcrumb-item active">Tablo Ekle</li>
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
                                                <h4 class="card-title">Tablolar</h4>


                                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                    <thead>
                                                    <tr>

                                                        <th>Tablo İd</th>
                                                        <th>Tablo Başlık</th>
                                                        <th>Tablo Code</th>
                                                        <th>Veri Adeti</th>
                                                        <th>Toplu Veri İşlemleri</th>
                                                        <th>İşlemler</th>

                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                      <?php
                                                      $tablosor=$db->prepare("SELECT * FROM tablolar");
                                                                         $tablosor->execute(array());

                                                      while($tablocek=$tablosor->fetch(PDO::FETCH_ASSOC)){
                                                        $Tabloid=$tablocek["tablo_id"];
                                                        $tablo_adi=seo($tablocek["tablo_adi"]);

                                                       ?>
                                                    <tr>

                                                        <td><?php echo $tablocek["tablo_id"]; ?></td>
                                                          <td><?php echo $tablocek["tablo_baslik"]; ?></td>
                                                        <td><?php echo $tablo_adi; ?></td>
                                                        <td> <?php echo verisay($tablo_adi,"",""); ?> </td>
                                                        <td style="width:200px"> <center> <form class="" action="settings/adminislem" method="post">
                                                        <input type="hidden" name="table" value="<?php echo $tablo_adi; ?>">
                                                    <button type="submit" class="btn btn-warning btn-xs" name="truncate">Tabloyu Boşalt</button>    </form>  </center> </td>
                                                        <td>   <div class="col-md-12">


                                                           <div class="row">
<div class="col-md-3">


                                                         <a href="tabloduzenle-<?php echo $Tabloid; ?>"> <button class="btn btn-success" type="button" name="button"> <i class="fa fa-edit "></i> </button></a>
                                                        </div>
                                                        <div class="col-md-3">

                                                          <form class="" action="settings/adminislem" method="post">
                                                            <input type="hidden" name="tablo_id" value="<?php echo $Tabloid; ?>">
                                                            <button class="btn btn-danger" type="submit" name="tabledelete"><i  class="fa fa-trash "></i> </button>
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
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

</div>














<?php include '../inc/footer.php'; ?>
