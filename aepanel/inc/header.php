<?php


if (isset($_SESSION["kuladi"])) {

$kullanici=$_SESSION["kuladi"];


$kullanıcıarat=vericek("uyeler","WHERE uye_kuladi='$kullanici'","TEK");

$yetki=$kullanıcıarat["admin_yetki"];
/*
5=developer
4=admin
3=Yönetici
2=editör
1=üye

*/

}
else {
  header("Location:login?durum=girisyap");
}

 ?>

<!doctype html>
<html lang="tr">

    <head>

        <?php include 'head.php'; ?>

    </head>

    <body data-sidebar="dark" data-layout-mode="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
               <div id="layout-wrapper">


                <header id="page-topbar">
                <div class="navbar-header">
                <div class="d-flex">
                        <!-- LOGO -->
                  <div class="navbar-brand-box">


                  <a href="index" class="logo logo-light">
                  <span class="logo-sm">
                  <img src="<?php echo AEURL; ?>/assets/images/logo-light.svg" alt="" height="35">
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo AEURL; ?>/assets/images/logo-light.png" alt="" height="40">
                  </span>
                  </a>
                  </div>

                  <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                  <i class="fa fa-fw fa-bars"></i>
                  </button>
                  </div>
                  <div class="d-flex">
                  <div class="dropdown d-inline-block">
                    <a target="_blank" href="<?php echo URL?>"><button type="button" class="btn btn-outline-info" name="button">Siteye Dön</button></a>

                    <!--
                    <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="assets/images/flags/tr.jpg" alt="Header Language" height="16">
                            </button>

                            <div class="dropdown-menu dropdown-menu-end">


                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="tr">
                                    <img src="assets/images/flags/tr.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Türkçe</span>
                                </a>



                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>
                            </div>
                        </div>
-->
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>
<?php if ($yetki==1 or $yetki==0) { ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>

                                <?php $mesajcount= verisay("mesajlar","mesaj_durum","0"); ?>
                                <?php if ($mesajcount>0): ?>


                                <span class="badge bg-danger rounded-pill"><?php echo $mesajcount; ?></span>
                                <?php endif; ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Yeni Mesajlar </h6>
                                        </div>

                                    </div>
                                </div>

                                <?php $headermesaj=vericek("mesajlar","Where mesaj_durum='0' Order By mesaj_date LIMIT 5 ","COK"); ?>

                                <?php foreach ($headermesaj as $mesajlarr) {?>

                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">

                                                    <i style="color:aqua" class="fa fa-comment fa-2x"></i>

                                            </div>


                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order"><?php echo $mesajlarr["mesaj_konu"]; ?></h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer"> <?php echo kisalt($mesajlarr["mesaj_icerik"],15); ?></p>
                                                    <p class="mb-0"><i class="fa fa-user"></i> <span key="t-min-ago"><?php echo $mesajlarr["mesaj_kuladi"]; ?></span></p>
                                                </div>
                                            </div>


                                        </div>
                                    </a>

                                </div>

      <?php  } ?>

                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="<?php echo AEURL."/mesajlistele"; ?>">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">Daha Fazla</span>
                                    </a>
                                </div>
                            </div>
                        </div>
<?php } ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo $kullanıcıarat["uye_adi"]; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="profil"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profil</span></a>

                                <a class="dropdown-item d-block" href="sifreayar"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Şifre Ayarları</span></a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Çıkış Yap</span></a>
                            </div>
                        </div>



                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

<li class="menu-title" key="t-menu"><?php echo bilgi("site_title","icerik"); ?> Dashboard</li>
  <?php if ($yetki==1 or $yetki==0) {?>
<li>
    <a href="genelayar" class="waves-effect">
        <i class="fas fa-lock"></i>


        <span key="t-dashboards">Yetkiniz Bulunmamakta</span>

    </a>


</li>  <?php    } ?>
                            <?php

                            if ($yetki==6 or $yetki==5 or $yetki==4) {
                             ?>

                            <li>
                                <a href="genelayar" class="waves-effect">
                                    <i class="fa fa-cogs"></i>
                                    <span key="t-dashboards">Genel Ayarlar</span>
                                </a>


                            </li>
                            <li>
                                <a href="guvenlikayar" class="waves-effect">
                                <i class="fas fa-fingerprint"></i>
                                    <span key="t-dashboards">Site Güvenlik Ayarları</span>
                                </a>


                            </li>
                            <?php } ?>

       <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>


                                                       <li>
                                                           <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                               <i class="bx bx-user-circle"></i>
                                                               <span key="t-authentication">Kullanıcı Yönetimi</span>
                                                           </a>

                                                           <ul class="sub-menu" aria-expanded="false">

                                                             <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                                                                     <li><a href="kullaniciekle" key="t-light-sidebar">Yeni Kullanıcı Ekle</a></li>
                                                                   <?php } ?>
                                                                   <?php if ($yetki==6) {?>
                                                                   <li><a href="kullanicilistele-5" key="t-light-sidebar">Developerlar</a></li>
                                                                 <?php  } ?>
                                                                     <?php if ($yetki==6 or $yetki==5) {?>
                                                                     <li><a href="kullanicilistele-4" key="t-light-sidebar">Adminler</a></li>
                                                                   <?php  } ?>



                                                                   <?php if ($yetki==6 or $yetki==5 or $yetki==4) {?>
                                                                      <li><a href="kullanicilistele-3" key="t-light-sidebar">Yöneticiler</a></li>
                                                                    <?php  } ?>
                                                                    <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                                                                      <li><a href="kullanicilistele-2" key="t-light-sidebar">Editörler</a></li>
                                                                       <?php  } ?>

                                                                       <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                                                                      <li><a href="kullanicilistele-1" key="t-light-sidebar"> Panel Üyeleri</a></li>
                                                                    <?php } ?>
                                                                    <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {?>
                                                                   <li><a href="kullanicilistele-0" key="t-light-sidebar"> Üyeler</a></li>
                                                                 <?php } ?>
                                                           </ul>
                                                       </li>
                                                         <li class="menu-title" key="t-apps">İçerik Ayarları</li>
<?php } ?>


    <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3  or $yetki==2) { ?>
                            <li>

                                                           <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                               &nbsp;&nbsp;<i class="fa fa-info"></i>
                                                               <span key="t-layouts">Bilgiler</span>
                                                           </a>
                                                           <ul class="sub-menu" aria-expanded="true">
                                            <?php if ($yetki==6 or $yetki==5) { ?>
                                                              <li><a href="bilgikategoriekle" key="t-default">Kategori Ekle </a></li>
                                                                <li><a href="bilgikategorilistele" key="t-default">Kategori Listele</a></li>
                                                <?php } ?>


                                                <?php
                                                $bkategorisor=$db->prepare("SELECT * FROM bilgikategori ORDER BY bilgikategori_id asc");
                                                                   $bkategorisor->execute(array());
                                                while($bkategoricek=$bkategorisor->fetch(PDO::FETCH_ASSOC)){

                                                 ?>
                                                 <?php if ($bkategoricek==null) {
                                                   // code...
                                                 } else {

                                                  ?>

                                                               <li>
                                                                   <a href="javascript:void(0)" class="has-arrow" key="t-vertical"><?php echo $bkategoricek['bilgikategori_adi']; ?></a>
                                                                   <ul class="sub-menu" aria-expanded="true">
                                                                       <?php if ($yetki==6 or $yetki==5) { ?>
                                                                       <li><a href="bilgiekle-<?php echo $bkategoricek['bilgikategori_id']; ?>" key="t-light-sidebar">Ekle</a></li>
                                                                         <?php } ?>
                                                                        <li><a href="bilgilistele-<?php echo $bkategoricek['bilgikategori_id']; ?>" key="t-light-sidebar">Listele</a></li>

                                                                   </ul>
                                                               </li>

                        <?php }} ?>

                                                           </ul>
                                                       </li>
     <?php } ?>

<?php if ($yetki==6 or $yetki==5) { ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-table"></i>
                                    <span key="t-blog">Tablolar</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="tabloekle" key="t-blog-list">Yeni Tablo Ekle</a></li>
                                    <li><a href="tablolistele" key="t-blog-grid">Listele</a></li>

                                </ul>
                            </li>
                          <?php } ?>
                          <?php
                          $tablosor=$db->prepare("SELECT * FROM tablolar ORDER BY tablo_id asc");
                                             $tablosor->execute(array());
                          while($tablocek=$tablosor->fetch(PDO::FETCH_ASSOC)){
if ($tablocek==null) {
  // code...
}
else {


                           ?>
                               <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3  or $yetki==2) { ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-star"></i>
                                    <span key="t-blog"><?php echo $tablocek["tablo_baslik"]; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="icerikekle-<?php echo $tablocek["tablo_id"]; ?>" key="t-blog-list">Yeni Ekle</a></li>
                                    <li><a href="iceriklistele-<?php echo $tablocek["tablo_id"]; ?>" key="t-blog-grid">Listele</a></li>
                                    <li><a href="metaduzenle-<?php echo $tablocek["tablo_id"]; ?>" key="t-blog-grid"><?php echo $tablocek["tablo_baslik"]; ?> Meta Düzenle</a></li>
<?php
if($yetki==6 or $yetki==5){?>
                                    <li><a href="tabloduzenle-<?php echo $tablocek["tablo_id"]; ?>" key="t-blog-details"><?php echo $tablocek["tablo_baslik"]; ?> Tablosunu Düzenle</a></li><?php } ?>
                                </ul>
                            </li>
                          <?php } ?>

<?php }} ?>
   <?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3  or $yetki==2) { ?>
<li class="menu-title" key="t-apps">Sayfa Ayarları</li>
<li>  <a href="javascript: void(0);" class="has-arrow waves-effect">
<i class="far fa-file"></i>
      <span key="t-ui-elements">Sayfa yönetimi</span>
  </a>
  <ul class="sub-menu" aria-expanded="false">
      <li><a href="sayfaekle" key="t-alerts">Sayfa Ekle</a></li>
      <li><a href="sayfalistele" key="t-alerts">Sayfa listele</a></li>

  </ul>
  </li>

  <?php
  $sayfasor=$db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_id asc");
                     $sayfasor->execute(array());
  while($sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC)){?>
  <li>  <a href="javascript: void(0);" class="has-arrow waves-effect">
<i class="fas fa-bookmark"></i>
        <span key="t-ui-elements"><?php echo $sayfacek["sayfa_adi"]; ?></span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="sayfaduzenle-<?php echo $sayfacek["sayfa_id"]; ?>" key="t-alerts">Sayfa düzenle</a></li>


    </ul>
    </li>
    <?php } ?>
  <?php } ?>






<?php if ($yetki==6 or $yetki==5 or $yetki==4) { ?>
                            <li class="menu-title" key="t-components">Menü Ayarları</li>

<?php
if($yetki==6 or $yetki==5){?>
                            <li>


                                <a href="#" class="has-arrow waves-effect">
                                    <i class="fas fa-bars"></i>
                                    <span key="t-ui-elements">Menü Yönetimi</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="menukategoriekle" key="t-alerts">Menü Kategori Ekle</a></li>
                                    <li><a href="menukategorilistele" key="t-alerts">Menu Kategori Listele</a></li>

                                </ul>
                            </li>
                            <?php
                           } $menukatsor=$db->prepare("SELECT * FROM menukategori ORDER BY menukat_id asc");
                                               $menukatsor->execute(array());
                            while($menukatcek=$menukatsor->fetch(PDO::FETCH_ASSOC)){?>
                            <li>


                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="far fa-caret-square-down"></i>
                                    <span key="t-ui-elements"><?php echo $menukatcek["kategori_adi"]; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="menuekle-<?php echo $menukatcek["menukat_id"]; ?>" key="t-alerts">Yeni Menü  Ekle</a></li>
                                    <li><a href="menulistele-<?php echo $menukatcek["menukat_id"]; ?>" key="t-alerts">Menüleri  Listele</a></li>

                                </ul>
                            </li>
                          <?php } ?>
                          <?php } ?>
<?php if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3 or $yetki==2) {?>
                            <li class="menu-title" key="t-components">İletişim</li>


                            <li>


                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                  <i class="fas fa-comments"></i>
                                    <span key="t-ui-elements">İletişim Formu </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="mesajlistele" key="t-alerts">Mesajları listele</a></li>

                                </ul>
                            </li>
                          <?php } ?>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
