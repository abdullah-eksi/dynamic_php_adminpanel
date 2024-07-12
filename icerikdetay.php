

<?php
include 'aepanel/aelib.php';
 ?>

<?php sitekontrol(); ?>

<?php
$sef = get("sef");
$id = get("id");

if (isset($sef) && isset($id)) {
  $tablocek = vericek("tablolar","Where tablo_sef='$sef'","TEK");

  if (isset($tablocek)) {
    $baslik = $tablocek["tablo_baslik"];
    $sabloncode = $tablocek["tablo_sablon"];
      $sekil_id= $tablocek["tablo_id"];

    $sekiller = icerikcek($tablocek["tablo_id"], "Where id='$id'");

    foreach ($sekiller as $sekil) {

      $sekil_name = $sekil->sekilbaslik;
      $description = $sekil->description;
  $keywords = $sekil->keywords;
?>


 <!doctype html>


 <html lang="tr">
<head>
  <?php   echo baslik($sekil_name); ?>
  <!-- meta -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="author" content="<?php echo bilgi("author","icerik"); ?>">


  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="language" content="Turkish">
  <link rel="apple-touch-icon" href="<?php echo faviconcek(); ?>" />
  <link rel="canonical" href="<?php echo URL; ?>" />
  <meta property="og:image" content="<?php echo logocek(); ?>" />
  <meta property="og:locale" content="tr_TR" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo bilgi("site_title","icerik"); ?>" />
  <meta property="og:description" content="<?php echo $description; ?>" />
  <meta property="og:url" content="<?php echo URL; ?>" />
  <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
  <meta property="og:image" content="<?php echo logocek(); ?>" />

  <?php cagir("head"); ?>



</head>
<?php

    cagir("header");
      include 'icerikdetay/'.$sabloncode.'.php';
      cagir("footer");


      ?>



      </body>
    </html>
    <?php
    }
  }
  else {
    yonlendir(URL);
  }

}else {
yonlendir(URL);
}

if (!isset($tablocek) || empty($sekiller)) {
  yonlendir(URL);
}

?>
