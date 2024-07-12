<?php include 'aepanel/aelib.php';


 $sef=get("sef");
if (isset($sef)) {
$tablocek=vericek("tablolar","Where tablo_sef='$sef'","TEK");
if (isset($tablocek)) {
$baslik=$tablocek["tablo_baslik"];
$sekil_id=$tablocek["tablo_id"];
$sabloncode=$tablocek["tablo_sablon"];
?>
<!doctype html>


<html lang="tr">
<head>

  <?php   echo baslik($baslik); ?>
  <!-- meta -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="<?php echo $tablocek["keywords"]; ?>">
  <meta name="description" content="<?php echo $tablocek["description"]; ?>">
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
  <meta property="og:description" content="<?php echo $tablocek["description"]; ?>" />
  <meta property="og:url" content="<?php echo URL; ?>" />
  <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
  <meta property="og:image" content="<?php echo logocek(); ?>" />
<?php cagir("head"); ?>
</head>
<body>
<?php
cagir("header");


include 'icerikliste/'.$sabloncode.'.php';
cagir("footer");
?>


</body>
</html>
<?php

}
else {
  yonlendir(URL);

}
}
else {
  yonlendir(URL);
}




?>
