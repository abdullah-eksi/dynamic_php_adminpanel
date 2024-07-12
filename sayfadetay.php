<?php include 'aepanel/aelib.php'; ?>
<?php sitekontrol(); ?>


<?php
$url=get("sef");
$sayfa_id=sayfaid($url);


$title= tekvericek("sayfalar","sayfa_baslik","sayfa_id","$sayfa_id");
$description= tekvericek("sayfalar","description","sayfa_id","$sayfa_id");
$keywords= tekvericek("sayfalar","keywords","sayfa_id","$sayfa_id");
?>
<!doctype html>


<html lang="tr">
<head>


  <?php echo baslik($title); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="description" content="<?php echo $description ?>">
  <meta name="author" content="<?php echo bilgi("author","icerik"); ?>">


  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="language" content="Turkish">
  <link rel="apple-touch-icon" href="<?php echo faviconcek(); ?>" />
  <link rel="canonical" href="<?php echo URL; ?>" />
  <meta property="og:image" content="<?php echo logocek(); ?>" />
  <meta property="og:locale" content="tr_TR" />
  <meta property="og:type" content="website" />
  <meta name="geo.region" content="TR">
  <meta property="og:title" content="<?php echo bilgi("site_title","icerik"); ?>" />
  <meta property="og:description" content="<?php echo $description ?>" />
  <meta property="og:url" content="<?php echo URL; ?>" />
  <meta property="og:site_name" content="<?php echo bilgi("site_title","icerik"); ?>" />
  <meta property="og:image" content="<?php echo logocek(); ?>" />
    <?php cagir("head"); ?>
</head>
<body>


<?php

 cagir("header");
   ?>

<?php switch ($_GET["sef"]) {

/*Hakkımızda */
    case 'hakkimizda-124':
    include 'page/1.php';
    break;
/*Hakkımızda */

/*İletişim */
    case 'iletisim-129':
    include 'page/2.php';
    break;
/*İletişim */

/*Bunlar dışındaki sayfalar için (kullanıcı oluşturdu sayfalar)*/
  default:
  include 'page/default.php';
  break;

    /*Bunlar dışındaki sayfalar için (kullanıcı oluşturdu sayfalar)*/
}

?>

<!-- Devoloped by Abdullah ekşi -->

  <?php cagir("footer"); ?>
</body>

</html>
