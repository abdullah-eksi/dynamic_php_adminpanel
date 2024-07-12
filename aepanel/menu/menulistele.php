<?php include '../aelib.php'; ?>
<?php include '../inc/header.php'; ?>
<?php  $izinler=[6,5,4,3];
yetki($izinler,$yetki); ?>
<?php


$menukategori_id=get("num");

$menukategoricek=vericek("menukategori","WHERE menukat_id='$menukategori_id'","TEK");

?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> <?php echo $menukategoricek["kategori_adi"];?> Menu Listele</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo AEURL; ?>">Anasayfa</a></li>

                                <li class="breadcrumb-item active"><a href="menulistele-<?php echo $menukategori_id; ?>" ><?php echo $menukategoricek["kategori_adi"];?></a></li>
                                <li class="breadcrumb-item active">Menü Listele</li>
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

                                                          <?php echo $menukategoricek["kategori_adi"];?> menuler</h4>


                                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                                <thead>
                                                                <tr>

                                                                    <th>#</th>
                                                                    <th>menu Adı</th>
                                                                    <th>menu İcon</th>
                                                                    <th>menu Link</th>
                                                                      <th>menu Sıra</th>
                                                                    <th>menu Türü</th>
                                                                    <?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3){?>
                                                                    <th>İşlemler</th>
                                                                  <?php } ?>
                                                                </tr>
                                                                </thead>


                                                                <tbody>
                                                                  <?php
                                                                  $say=0;

                                                                    $menusor=vericek("menuler","WHERE menukat_id='$menukategori_id'","COK");
                                                              foreach ($menusor as $menucek) {


                                                                $menud=$menucek["menu_id"];
                                                                   ?>
                                                                <tr>
                                                                    <td><?php echo $say; ?></td>

                                                                    <td><?php echo $menucek["menu_adi"]; ?></td>
                                                                    <td><?php echo $menucek["menu_icon"]; ?></td>
                                                                    <td><?php echo $menucek["menu_link"]; ?></td>
                                                                    <td><?php echo $menucek["menu_sira"]; ?></td>
                                                                    <td><?php if($menucek["parent_id"]=="0")
                                                                    {
                                                                    echo "normal menü";
                                                                  } else {
                                                                    echo "alt menü";
                                                                  } ?> </td>

                                                                    <td> <div class="col-md-12">


                                                                       <div class="row">
<?php if($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3){?>
                                                                        <div class="col-md-4">


                                                                     <a href="menuduzenle-<?php echo $menukategori_id; ?>-<?php echo $menud; ?>"> <button type="button" class="btn btn-success" name="button"> <i class="fa fa-edit "></i></button></a>
                                                                    </div>
<?php } ?>
                                                                    <?php if($yetki==6 or $yetki==5 or $yetki==4){?>


                                                                    <div class="col-md-4">
                                                                      <div>
                                                                        <form class="" action="settings/adminislem" method="post">

                                                                            <input type="hidden" name="no" value="<?php echo $menud; ?>">

                                                                            <input type="hidden" name="num" value="<?php echo $_GET["num"]; ?>">
                                                                          <button class="btn btn-danger" type="submit" name="menusil">   <i class="fas fa-trash"></i>   </button>



                                                                        </form>


                                                                        <?php }?>

                                                                         </div>
                                                                     </td>

                                                                </tr>
<?php $say++; } ?>
                                                            </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

</div>












<?php include '../inc/footer.php'; ?>
