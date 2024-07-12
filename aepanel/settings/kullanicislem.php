<?php include '../aelib.php'; ?>

<?php
if (isset($_POST["login"])) {
$kuladi = $_POST["username"];
$sifre = md5($_POST["sifre"]);


$kullanicisor=$db->prepare("SELECT*FROM uyeler WHERE uye_kuladi=:adi and uye_password=:password and uye_yetki=:yetki and uye_durum=:durum and admin_yetki=:ayetki");
$kullanicisor->execute(array(
  'adi'=>$kuladi,
  'password'=>$sifre,
  'yetki'=>0,
  'ayetki'=>0,
  'durum'=>"1"
));
echo $say=$kullanicisor->rowCount();
if ($say==1)
{
$_SESSION['user']=$kuladi;
header("Location:index?durum=girisbasarili");
exit;
}
else
{
  header("Location:index?durum=girisbasarisiz");
  exit;
}






}



if (isset($_POST["register"])) {
  $kullaniciadi=$_POST["username"];
  $mail=$_POST["email"];

  $uye_passwordone=md5($_POST["uye_passwordone"]);
  $uye_passwordtwo=md5($_POST["uye_passwordtwo"]);
  if ($uye_passwordone==$uye_passwordtwo) {


    $kullanicibul=$db->prepare("SELECT*FROM uyeler WHERE uye_kuladi=:adi or uye_mail=:mail");

    $kullanicibul->execute(array(
    'adi'=>$kullaniciadi,
    'mail'=>$mail
    ));
    $kullaniciarat=$kullanicibul->fetch(PDO::FETCH_ASSOC);

  $kullanici=$kullaniciarat["uye_kuladi"];
  $mailbul=$kullaniciarat["uye_mail"];
  if ($kullanici==$kullaniciadi or $mail==$mailbul) {
  header("Location:index?durum=tekraredilenkayit");
  }
        else {
          $kullaniciekle=$db->prepare("INSERT into uyeler set
                          uye_kuladi=:adi,
                          uye_password=:password,
                          uye_mail=:mail,
                          uye_yetki=:yetki,
                          admin_yetki=:ayetki,
                          uye_durum=:durum
                          ");
          	              $insert=$kullaniciekle->execute(array(
                          'adi' => $kullaniciadi,
                          'password' => $uye_passwordone,
                          'mail' => $mail,
                          'yetki' => 0,
                          'ayetki' => 0,
                          'durum' => "1"
          	                                   ));

        if ($insert){
                  Header("Location:index?durum=kayıtbasarili");

                    }
              else {
        Header("Location:index?durum=no");
                    }



        }
      }
      else {
        header("Location:login?durum=sifreleraynidegil");
      }


}



 ?>
