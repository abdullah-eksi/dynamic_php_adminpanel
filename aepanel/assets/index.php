<?php include '../inc/connect.php'; ?>
<?php include '../inc/fonksiyon.php'; ?>

<?php
if (isset($_SESSION["kuladi"])) {

$kullanıcı=$_SESSION["kuladi"];


$kullanıcıbul=$db->prepare("SELECT*FROM uyeler WHERE uye_kuladi=:adi");

$kullanıcıbul->execute(array(
'adi'=>$kullanıcı
));
$kullanıcıarat=$kullanıcıbul->fetch(PDO::FETCH_ASSOC);
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
  header("Location:../login.php?durum=girisyap");
}


 ?>
