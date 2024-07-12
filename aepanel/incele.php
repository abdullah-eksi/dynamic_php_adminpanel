<?php
include 'aelib.php';
$durum=  $durum = ayarcek("ayar_sitedurum");
if ($durum==2) {
yonlendir(URL);
}
else {


session_start();

$_SESSION["sure"] = time() + 1200;
$_SESSION["incele"] = "1";





if($_SESSION["sure"] < time()){

	unset($_SESSION["sure"]);
	unset($_SESSION["incele"]);
session_destroy();
yonlendir(URL);
}
else {

  $_SESSION["sure"] = time() + 1200;
  $_SESSION["incele"] = "1";

yonlendir(URL);
}

}
?>
