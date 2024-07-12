<?php include 'aelib.php'; ?>

<!doctype html>


<html lang="tr">


<?php $no=get("no"); ?>

<?php
if ($no=="6") {
  // code...

?>


<head>


        <?php echo baslik("Uzaklaştırma"); ?>
        <!-- meta -->

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="keywords" content="<?php echo bilgi("site_keyword","icerik"); ?>">
        <meta name="description" content="<?php echo bilgi("site_description","icerik"); ?>">
        <meta name="author" content="<?php echo bilgi("author","icerik"); ?>">


        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="language" content="Turkish">
        <link rel="apple-touch-icon" href="<?php echo faviconcek(); ?>" />
        <link rel="canonical" href="<?php echo URL; ?>" />
        <meta property="og:image" content="<?php echo logocek(); ?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo baslik(""); ?>" />
        <meta property="og:description" content="<?php bilgi("site_description","icerik"); ?>" />
        <meta property="og:url" content="<?php echo URL; ?>" />
        <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
        <meta property="og:image" content="<?php echo logocek(); ?>" />


      <?php include '../inc/head.php'; ?>

        <link rel="stylesheet" href="<?php echo AEURL; ?>/assets/css/uyariekrani.css">
</head>


<div class="cont_principal">
<div class="cont_error">
<img  style="width:130px;" src="https://ae1.abdullaheksi.com.tr/aepanel/assets/images/logo-light.svg" alt="">
<h1> Siteden <br> Uzaklaştırıldın</h1>



  <p >- Site Kurallarına Uymadığın İçin Uzaklaştırıldın - </p>

  </div>
<div class="cont_aura_1"></div>
<div class="cont_aura_2"></div>
</div>
<?php } else {


$durum = ayarcek("ayar_sitedurum");


if ($durum=="2") {

yonlendir($url);
}
else {



if($no==0) {



      ?>

      <head>


      <?php echo baslik("Yapımda"); ?>
      <!-- meta -->

      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <meta name="keywords" content="<?php echo bilgi("site_keyword","icerik"); ?>">
      <meta name="description" content="<?php echo bilgi("site_description","icerik"); ?>">
      <meta name="author" content="<?php echo bilgi("author","icerik"); ?>">


      <meta name="robots" content="index, follow">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="language" content="Turkish">
      <link rel="apple-touch-icon" href="<?php echo faviconcek(); ?>" />
      <link rel="canonical" href="<?php echo URL; ?>" />
      <meta property="og:image" content="<?php echo logocek(); ?>" />
      <meta property="og:locale" content="tr_TR" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo baslik(""); ?>" />
      <meta property="og:description" content="<?php bilgi("site_description","icerik"); ?>" />
      <meta property="og:url" content="<?php echo URL; ?>" />
      <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
      <meta property="og:image" content="<?php echo logocek(); ?>" />


    <?php include '../inc/head.php'; ?>

      <link rel="stylesheet" href="<?php echo AEURL; ?>/assets/css/uyariekrani.css">
      </head>

      <div class="cont_principal">
      <div class="cont_error">
    <img  style="width:130px;" src="https://ae1.abdullaheksi.com.tr/aepanel/assets/images/logo-light.svg" alt="">
      <h1> Yapım <br> Aşamasında</h1>



        <p >- Site henüz hazır değil en kısa sürede sizlerle olacaktır - </p>

        </div>
      <div class="cont_aura_1"></div>
      <div class="cont_aura_2"></div>
      </div>
        <?php
      }
  elseif ($no==1) {?>

    <head>
      <?php echo baslik("Bakımda"); ?>
      <!-- meta -->

      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <meta name="keywords" content="<?php echo bilgi("site_keyword","icerik"); ?>">
      <meta name="description" content="<?php echo bilgi("site_description","icerik"); ?>">
      <meta name="author" content="<?php echo bilgi("author","icerik"); ?>">


      <meta name="robots" content="index, follow">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="language" content="Turkish">
      <link rel="apple-touch-icon" href="<?php echo faviconcek(); ?>" />
      <link rel="canonical" href="<?php echo URL; ?>" />
      <meta property="og:image" content="<?php echo logocek(); ?>" />
      <meta property="og:locale" content="tr_TR" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo baslik(""); ?>" />
      <meta property="og:description" content="<?php bilgi("site_description","icerik"); ?>" />
      <meta property="og:url" content="<?php echo URL; ?>" />
      <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
      <meta property="og:image" content="<?php echo logocek(); ?>" />


    <?php include '../inc/head.php'; ?>

    <link rel="stylesheet" href="<?php echo AEURL; ?>/assets/css/uyariekrani.css">
    </head>

    <div class="cont_principal">
    <div class="cont_error">
  <img  style="width:130px;" src="https://ae1.abdullaheksi.com.tr/aepanel/assets/images/logo-light.svg" alt="">
    <h1> Site <br> Bakımda</h1>



      <p >- Site Bakımda En Kısa Sürede Tekrardan Sizlerle - </p>

      </div>
    <div class="cont_aura_1"></div>
    <div class="cont_aura_2"></div>
    </div>
    <?php }
    else {
      yonlendir($url);
    }



?>


        <?php



}

}


 ?>






















<script type="text/javascript">
window.onload = function(){
document.querySelector('.cont_principal').className= "cont_principal cont_error_active";

}
</script>


<!-- PANEL GİRİŞ KISAYOLU BAŞLANGIÇ -->
    <script src="<?php echo AEURL; ?>/assets/js/shortcut.js"></script>
    <script language="JavaScript">

  shortcut.add("Alt+A",function() {window.location = "<?php echo AEURL; ?>"});
  shortcut.add("Alt+E",function() {window.location = "<?php echo $url."/incele"; ?>"});
  </script>
<!-- PANELE GİRİŞ KISAYOLU BİTİŞ -->

<!--


⢠⡤⢺⣿⣿⣿⣿⣿⣶⣄
⠀⠀⠉⠀⠘⠛⠉⣽⣿⣿⣿⣿⡇
⠀⠀⠀⠀⠀⠀⠀⢉⣿⣿⣿⣿⡗
⢀⣀⡀⢀⣀⣤⣤⣽⣿⣼⣿⢇⡄
⠀⠀⠙⠗⢸⣿⠁⠈⠋⢨⣏⡉⣳
⠀⠀⠀⠀⢸⣿⡄⢠⣴⣿⣿⣿
⠀⠀⠀⠀⠉⣻⣿⣿⣿⣿⣿⡟⡀
⠀⠀⠀⠀⠐⠘⣿⣶⡿⠟⠁⣴⣿⣄
⠀⠀⠀⠀⠀⠘⠛⠉⣠⣴⣾⣿⣿⣿⡦
⠀⠀⢀⣴⣠⣄⠸⠿⣻⣿⣿⣿⣿⠏
⣠⣿⣿⠟⠁
-->

</body>

</html>

<!-- Devoloped by Abdullah ekşi -->
