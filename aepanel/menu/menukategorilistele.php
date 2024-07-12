<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php  $izinler=[6,5];
yetki($izinler,$yetki); ?>
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
                            <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>/menukategorilistele">Menu Kategorileri</a></li>

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
                                                <h4 class="card-title">Menu Kategorileri</h4>


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



                                                      $menukatsor=vericek("menukategori","","COK");


                                                      foreach ($menukatsor as $menukatcek) {
                                                        $menukat_id=$menukatcek["menukat_id"];
                                                       ?>
                                                       <tr>

                                                        <td><?php echo $menukatcek["menukat_id"]; ?></td>
                                                        <td><?php echo $menukatcek["kategori_adi"];; ?></td>

                                                        <td>   <div class="col-md-12">


                                                           <div class="row">
                                                             <div class="col-md-2">


                                                         <a href="menukategoriduzenle-<?php echo $menukat_id; ?>"> <button type="button" class="btn btn-success" name="button"> <i class="fa fa-edit "></i></button></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                          <form  action="settings/adminislem" method="post">

                                                              <input type="hidden" name="num" value="<?php echo $menukat_id; ?>">


                                                            <button class="btn btn-danger" type="submit" name="menukategorisil">   <i class="fas fa-trash"></i>   </button>



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
