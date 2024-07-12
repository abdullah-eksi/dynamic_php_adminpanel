


<?php include '../aelib.php';?>

<script name="aepanel" type="text/javascript">
console.log(`

###########################################################################################################################################
###########################################################################################################################################
###########################################################################################################################################
.----------------.  .----------------.    .----------------.  .----------------.  .-----------------. .----------------.  .----------------.
| .--------------. || .--------------. |  | .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
| |      __      | || |  _________   | |  | |   ______     | || |      __      | || | ____  _____  | || |  _________   | || |   _____      | |
| |     /  \     | || | |_   ___  |  | |  | |  |_   __ \   | || |     /  \     | || ||_   \|_   _| | || | |_   ___  |  | || |  |_   _|     | |
| |    / /\ \    | || |   | |_  \_|  | |  | |    | |__) |  | || |    / /\ \    | || |  |   \ | |   | || |   | |_  \_|  | || |    | |       | |
| |   / ____ \   | || |   |  _|  _   | |  | |    |  ___/   | || |   / ____ \   | || |  | |\ \| |   | || |   |  _|  _   | || |    | |   _   | |
| | _/ /    \ \_ | || |  _| |___/ |  | |  | |   _| |_      | || | _/ /    \ \_ | || | _| |_\   |_  | || |  _| |___/ |  | || |   _| |__/ |  | |
| ||____|  |____|| || | |_________|  | |  | |  |_____|     | || ||____|  |____|| || ||_____|\____| | || | |_________|  | || |  |________|  | |
| |              | || |              | |  | |              | || |              | || |              | || |              | || |              | |
| '--------------' || '--------------' |  | '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
'----------------'  '----------------'    '----------------'  '----------------'  '----------------'  '----------------'  '----------------'
###########################################################################################################################################
###########################################################################################################################################
###########################################################################################################################################

`);

</script>

<?php


if (isset($_SESSION["kuladi"])) {

$kuladi=$_SESSION["kuladi"];
$yetki = tekvericek("uyeler", "admin_yetki", "uye_kuladi", $kuladi);
$kullanici_id = tekvericek("uyeler", "uye_id", "uye_kuladi", $kuladi);
}
else {
  yonlendir("../login");
}


 ?>

<?php
if (isset($_POST["bankaldir"])) {

if ($yetki == 6 or $yetki==5 or $yetki==4 or $yetki==3) {


  $id=post("no");
  $process=kaldir("banned_ips",$id,"id");
if ($process) {
  yonlendir("../guvenlikayar?durum=OK");
}
else {
  yonlendir("../guvenlikayar?durum=NO");
}
// code...
}
else {
  yonlendir("../index?durum=yetkisizislem");
}
}



if (isset($_POST['bkategoriekle'])) {
$params=
[
'bilgikategori_adi' => post("kategori")
 ];
$process=veriekle("bilgikategori",$params);


  if ($process){
yonlendir("../bilgikategoriekle?durum=ok");
            }
      else {
yonlendir("../bilgikategoriekle?durum=no");
            }
}



if (isset($_POST['bkategorisil'])) {

$getid=post("bkategorid");

 $bilgicek=vericek("bilgi","kategori_id=$getid","TEK");

  $katid=$bilgicek["kategori_id"];

$sil=kaldir("bilgi",$katid,"kategori_id");


$sil2=kaldir("bilgikategori",$getid,"bilgikategori_id");

if ($sil and $sil2){
          yonlendir("../bilgikategorilistele?durum=ok");
            }
      else {
yonlendir("../bilgikategorilistele?durum=no");
            }


}


if (isset($_POST['bilgisil'])) {




$katid=post('no');

    $kategorid = tekvericek("bilgi", "kategori_id", "bilgi_id", $katid);
  if (post('yetki')==5 or post('yetki')==6) {

$process=kaldir("bilgi",$katid,"bilgi_id");
  if ($process)
  {
yonlendir("../bilgilistele-$kategorid?durum=ok");
  }
else {
  yonlendir("../bilgilistele-$kategorid?durum=no");
      }
}

    else {
          yonlendir("../bilgilistele-$kategorid?durum=yetkisizislem");
         }


}



if (isset($_POST['bkategoriduzenle'])) {


$bilgikategori_id=post("bilgikategori_id");
$id=post("bilgikategori_id");
$params=
 [
'bilgikategori_adi' => post('kategori')
 ];

$process=veriupdate("bilgikategori",$params," bilgikategori_id = '$id'");


    if($process){

      yonlendir("../bkategoriduzenle-$bilgikategori_id?durum=ok");
    }
    else {
      yonlendir("../bkategoriduzenle-$bilgikategori_id?durum=no");
    }



}




if (isset($_POST['bilgiekle'])) {
  $kategorid=post("kategori_id");

$params=
[
'bilgiadi' => post('bilgiadi'),
'bilgi_baslik' => post('bilgi_baslik'),
'bilgi_icerik' => post('bilgi_icerik'),
'bilgi_icon'=>post("bilgi_icon"),
'bilgi_title' => post('bilgi_title'),
'kategori_id' => post('kategori_id')
];

$process=veriekle("bilgi",$params);

if ($process){
          yonlendir("../bilgiekle-$kategorid?durum=ok");

            }
      else {
yonlendir("../bilgiekle-$kategorid?durum=no");
            }
}




if (isset($_POST["bilgiupdate"])) {
$bilgid=post("bilgid");
$bilgikategori_id=post("kategori_id");
$params=  [
  'bilgiadi' => post('bilgiadi'),
  'bilgi_baslik' => post('bilgi_baslik'),
  'bilgi_icerik' => post('bilgi_icerik'),
  'bilgi_icon'=>post("bilgi_icon"),
  'bilgi_title' => post('bilgi_title')
];

$process=veriupdate("bilgi",$params,"bilgi_id = '$bilgid'");

if($process){
yonlendir("../bilgiduzenle-$bilgikategori_id-$bilgid?durum=ok");
}
else {
yonlendir("../bilgiduzenle-$bilgikategori_id-$bilgid?durum=no");
}
}




if(isset($_POST['loginadmin']))
{
  $kullaniciadi=post('username');
  $password=md5(post('password'));



$kullanicisor=vericek("uyeler","Where uye_kuladi = '$kullaniciadi' and uye_password = '$password' and uye_yetki ='10' and uye_durum='1'","TEK");


  if ($kullanicisor!=null)
  {
  $_SESSION['kuladi']=$kullaniciadi;
  yonlendir("../index?durum=girisbasarili");
  exit;
  }
  else
  {
    yonlendir("../login?durum=girisbasarisiz");
    exit;
  }
}





//logo favicon yukleme

if (isset($_POST["logokaydet"])){

  if (!empty($_FILES['logo']["name"])) {
    $uploads_dir = '../upload/img';
    @$tmp_name = $_FILES['logo']["tmp_name"];

    if ($_FILES["logo"]["type"]=="image/jpeg" or $_FILES["logo"]["type"]=="image/jpg" or $_FILES["logo"]["type"]=="image/png"){
      $dosya		=	$_FILES["logo"]['name']; // dosya ismini aldık
      $uzanti		=	end(explode(".",$dosya)); // noktadan sonralarını alır
    @$name = "sitelogo".".".$uzanti;

  $random=rand(20000,32000);
  $refimgyol=substr($uploads_dir, 3)."/".$random.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$random$name");

$params=
[
  'ayar_logo'=>$refimgyol
];

$process=veriupdate("ayar",$params,"ayar_id = '0'");

    if($process){
      $resimsilunlink=post("eski_yol");
      unlink("../$resimsilunlink");
      yonlendir("../genelayar?logo=ok");
    }
    else {
      yonlendir("../genelayar?logo=no");
    }
}
else {
yonlendir("../genelayar?logo=dosyauzantihatasi");
}
}

}





if (isset($_POST["faviconkaydet"])) {
  if (!empty($_FILES['favicon']["name"])) {



    $uploads_dir = '../upload/img';
    @$tmp_name = $_FILES['favicon']["tmp_name"];

     if ($_FILES["favicon"]["type"]=="image/x-icon"){

       $dosya		=	$_FILES["favicon"]['name']; // dosya ismini aldık
       $uzanti		=	end(explode(".",$dosya)); // noktadan sonralarını alır
    @$name = "sitefavicon".".".$uzanti;

  $random=rand(20000,32000);
  $refimgyol=substr($uploads_dir, 3)."/".$random.$name;

  @move_uploaded_file($tmp_name,"$uploads_dir/$random$name");

  $params=
  [
    'ayar_favicon'=>$refimgyol
  ];
$process=veriupdate("ayar",$params,"ayar_id = '0'");

    if($process){
      $resimsilunlink=post('eski_yol');
      unlink("../$resimsilunlink");
      yonlendir("../genelayar?favicon=ok");
    }
    else {
      yonlendir("../genelayar?favicon=no");
    }
}
else {
  yonlendir("../genelayar?favicon=dosyauzantihatasi");
}

  }

  }


//logo favicon yukleme



if (isset($_POST["panelkullanıcıekle"])) {

if ($yetki==6 or $yetki==5 or $yetki==4  or $yetki==3) {
        $uye_adi = post("uye_adsoyad");
        $kullaniciadi = post("uye_kuladi");
        $mail = post("uye_mail");
        $tel = post("uye_tel");
        $admin_yetki = post("admin_yetki");
        $durum = post("durum");
        $uye_passwordone = md5(post("uye_passwordone"));
        $uye_passwordtwo = md5(post("uye_passwordtwo"));
        $ip_adresi = $_SERVER['REMOTE_ADDR']; // IP adresini al

        if ($uye_passwordone == $uye_passwordtwo) {


        $kullaniciarat=vericek("uyeler","WHERE uye_kuladi='$kullaniciadi' OR uye_mail='$mail' ","TEK");

        $kullanici = $kullaniciarat["uye_kuladi"];
        $mailbul = $kullaniciarat["uye_mail"];

            if ($kullanici == $kullaniciadi or $mail == $mailbul) {
                yonlendir("../kullaniciekle?durum=tekraredilenkayit");
            } else {
              $params=
              [
                'uye_adi'=>$uye_adi,
                'uye_kuladi'=> $kullaniciadi,
                'uye_password'=> $uye_passwordone ,
                'uye_mail'=> $mail,
                'uye_tel'=>$tel ,
                'uye_yetki'=> 10,
                'admin_yetki'=> $admin_yetki,
                'uye_durum'=>$durum ,
                'uye_ip'=> $ip_adresi
              ];
              $process=veriekle("uyeler",$params);


                if ($process) {
                    yonlendir("../kullaniciekle?durum=ok");
                } else {
                    yonlendir("../kullaniciekle?durum=no");
                }
            }
        } else {
            yonlendir("../kullaniciekle?durum=sifreleraynidegil");
        }
    } else {
        yonlendir("../kullaniciekle?durum=yetkisizislem");
    }
}



if (isset($_POST["pkullaniciduzenle"])) {


if ($yetki==6 or $yetki==5 or $yetki==4  or $yetki==3) {

  $uye_adi = post("uye_adsoyad");
  $kullaniciadi = post("uye_kuladi");
  $mail = post("uye_mail");
  $tel = post("uye_tel");
  $admin_yetki = post("admin_yetki");
  $durum = post("durum");
  $uyeid = post("uye_id");


  $uyeid=post("uye_id");


$params=
[
  'uye_adi'=>$uye_adi,
  'uye_kuladi'=> $kullaniciadi,
  'uye_mail'=> $mail ,
  'uye_tel'=> $tel ,
  'admin_yetki'=> $admin_yetki,
  'uye_durum'=>$durum
];

$process=veriupdate("uyeler",$params," uye_id = '$uyeid'");


  if ($process){
          yonlendir("../kullaniciduzenle-$uyeid?durum=ok");

            }
      else {
  yonlendir("../kullaniciduzenle-$uyeid?durum=no");
            }
}
else {
  yonlendir("../kullaniciduzenle-$uyeid?durum=yetkisizislem");
}

}



if (isset($_POST["panelgirisyetkial"])) {

  $uyeid=post("uye_id");

 $params=
 [
   'uye_yetki'=>0,
   'admin_yetki'=>0
 ];
$process=veriupdate("uyeler",$params,"uye_id ='$uyeid'");


  if ($process){
          yonlendir("../kullaniciduzenle-$uyeid?durum=ok");

            }
      else {
  yonlendir("../kullaniciduzenle-$uyeid?durum=no");
            }
}





if (isset($_POST["panelgirisyetkiver"])) {
$uyeid=post("uye_id");

  $params=
  [
    'uye_yetki'=>10,
    'admin_yetki'=>1
  ];
 $process=veriupdate("uyeler",$params,"uye_id ='$uyeid'");


  if ($process){
          yonlendir("../kullaniciduzenle-$uyeid?durum=ok");

            }
      else {
  yonlendir("../kullaniciduzenle-$uyeid?durum=no");
            }
}



//tablo oluşturma

if (isset($_POST["Tabloekle"])) {
if ($yetki==6 or $yetki==5) {

  $tabloadi=post("tablo");
  $tablo_baslik=post("baslik");
  $tablo_sef=post("seflink");
  $tablo_sablon=post("sablon");

$params=
[
  'tablo_adi'=>$tabloadi,
  'tablo_baslik'=>$tablo_baslik,
  'tablo_sef'=>$tablo_sef,
  'tablo_sablon'=>$tablo_sablon
];


  $process=veriekle("tablolar",$params);

             if ($process){


               try {
                 $sql = "CREATE TABLE IF NOT EXISTS $tabloadi (
                         id INT(11) AUTO_INCREMENT PRIMARY KEY,
                         sekilbaslik varchar(100),
                          description text,
                           keywords varchar(250),
                         resim varchar(500)
                         )";

                         //sql sorgusunu çalıştır
                        $tabloac=$db->exec($sql);



                   yonlendir("../tabloekle?durum=ok");
               }
               catch (Exception $e)
               {
echo $e->getMessage();
                 yonlendir("../tabloekle?durum=no");

               }

                         }
                   else {
   yonlendir("../tabloekle?durum=no");
                         }

}
else {
  yonlendir("../index?durum=yetkisizislem");
}
}


//oluşturdun tabloya değişken ekleme
    if (isset($_POST["degiskenekle"])) {
if ($yetki==6 or $yetki==5) {

    $degiskenbaslik=post("degiskenbaslik");
    $degiskenadi=post("degiskenadi");
    $degiskentur=post("degiskentur");
    if (post("degiskentur")==0) {
    $degiskentype="varchar(250)";

    }
    elseif(post("degiskentur")==1) {
      $degiskentype="textarea";
    }

    $tablo_id=post("tablo_id");


$params=
[
  'degiskenbaslik'=>$degiskenbaslik,
  'degisken_adi'=>$degiskenadi,
  'degiskentype'=>$degiskentur,
  'tablo_id'=>$tablo_id
];
  $process=veriekle("degiskenler",$params);


     if ($process){
        $tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);

    try {
      if ($degiskentype=="varchar(250)") {
      $sorgu=$db->query("ALTER TABLE $tablo_adi Add $degiskenadi varchar(250)");
    }
    if ($degiskentype=="textarea"){
      $sorgu=$db->query("ALTER TABLE $tablo_adi Add $degiskenadi text");
    }
    yonlendir("../tabloduzenle-$tablo_id?durum=ok");

    }
     catch (Exception $e)
    {
    echo $e->getMessage();
    yonlendir("../tabloduzenle-$tablo_id?durum=no");

    }

     }

    else {
  yonlendir("../tabloduzenle-$tablo_id?durum=no");
    }

}
else {
  yonlendir("../index?durum=yetkisizislem");
}

    }




if (isset($_POST["icerikekle"])) {
        $tablo_id = post("tabloid");
        $tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);
        $degiskenler = vericek("degiskenler", "where tablo_id='$tablo_id' order by degiskentype", "ÇOK");

        $veriler = array();
        foreach ($degiskenler as $degisken) {
            $degiskenadi = $degisken["degisken_adi"];
            $degiskentype = $degisken["degiskentype"];
            $veriler[$degiskenadi] = post($degiskenadi);

        }

        // Yeni değişkenleri ekleyin
        $veriler['sekilbaslik'] = post('sekilbaslik');
          $veriler['description'] = post('description');
          $veriler['keywords'] = post('keywords');
        if ($_FILES["resim"]['name'] != '') {
            $uploads_dir = '../upload/icerik';
            $tmp_name = $_FILES["resim"]["tmp_name"];
            $dosya = $_FILES["resim"]['name'];
            $uzanti = end(explode(".", $dosya));
            $name = "ae".".".$uzanti;
            $random = rand(20000, 32000);
            $refimgyol = "aepanel/" . substr($uploads_dir, 3) . "/" . $random . $name;

            move_uploaded_file($tmp_name, $uploads_dir."/".$random.$name);
            $veriler['resim'] = $refimgyol;
        } else {
            $veriler['resim'] = '';
        }
$process = veriekle($tablo_adi, $veriler);


        if ($process) {


            header("Location:../icerikekle-$tablo_id?durum=ok");
        } else {
            header("Location:../icerikekle-$tablo_id?durum=no");
        }
    }


    if (isset($_POST["icerikduzenle"])) {
        $tablo_id = $_POST["tabloid"];
        $tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);
        $degiskenler = vericek("degiskenler", "where tablo_id='$tablo_id' order by degiskentype", "ÇOK");
        $eski_yol = post("yol");
        $veriler = array();

        // Döngü içindeki işlemler
        foreach ($degiskenler as $degisken) {
            $degiskenadi = $degisken["degisken_adi"];
            $degiskentype = $degisken["degiskentype"];
            $veriler[$degiskenadi] = post($degiskenadi);
        }

        if (!empty($_FILES["resim"]['name'])) {
            // Resim yüklenmiş
            $uploads_dir = '../upload/icerik';
            $tmp_name = $_FILES["resim"]["tmp_name"];
            $dosya = $_FILES["resim"]['name'];
            $uzanti = end(explode(".", $dosya));
            $name = "ae".".".$uzanti;
            $random = rand(20000, 32000);
            $refimgyol = "aepanel/" . substr($uploads_dir, 3) . "/" . $random . $name;

            move_uploaded_file($tmp_name, $uploads_dir."/".$random.$name);
            $veriler["resim"] = $refimgyol;

            unlink('../../' . $eski_yol);
            // Eski yol değişkeni artık kullanılmayacak

        } else {
            // Resim yüklenmemiş, eski resim yolunu kullan
            if (!empty($eski_yol)) {
                $veriler["resim"] = $eski_yol;
            }
        }

        // Döngü dışındaki işlemler
        $veriler["sekilbaslik"] = post("sekilbaslik");
        $veriler['description'] = post('description');
        $veriler['keywords'] = post('keywords');
        $id = post("icerik_id");
        $kosul = "id = '$id'";
        $process = veriupdate($tablo_adi, $veriler, $kosul);
    if ($process) {
        header("Location:../icerikduzenle-$id-$tablo_id?durum=ok");
    } else {
        header("Location:../icerikduzenle-$id-$tablo_id?durum=no");
      }

}


if (isset($_POST["icerikmetaupdate"])) {

$table_id=post("no");

$params=
[
  'description'=>post("description"),
  'keywords'=>post("keywords")
];

$process=veriupdate("tablolar",$params,"tablo_id = '$table_id'");

if ($process) {
  yonlendir("../metaduzenle-$table_id?durum=ok");
}else {
    yonlendir("../metaduzenle-$table_id?durum=no");
}

}



if (isset($_POST["iceriksil"])) {



$icerik_id=post("id");

$tablo_id=post("num");

$tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);

$icerikcek=vericek($tablo_adi,"WHERE id='$icerik_id'","TEK");
$resim=$icerikcek["resim"];

  $sil2=kaldir($tablo_adi,$icerik_id,"id");

  if ($sil2) {
    unlink("../../$resim");
       yonlendir("../iceriklistele-$tablo_id?durum=ok");
  }
else {
    yonlendir("../iceriklistele-$tablo_id?durum=no");
}

}




if (isset($_POST["profilkaydet"])) {

$uye_id=post("uye_id");
$uye_adsoyad=post("uye_adsoyad");
$uye_mail=post("uye_mail");
$uye_tel=post("uye_tel");
$uye_facebook=post("uye_facebook");
$uye_instagram=post("uye_instagram");
$uye_linkedin=post("uye_linkedin");
$uye_youtube=post("uye_youtube");
$uye_twitter=post("uye_twitter");




$params=[
  'uye_adi'=>$uye_adsoyad,
  'uye_mail'=>$uye_mail,
  'uye_tel'=>$uye_tel,
  'uye_linkedin'=>$uye_linkedin,
  'uye_instagram'=>$uye_instagram,
  'uye_facebook'=>$uye_facebook,
  'uye_twitter'=>$uye_twitter,
  'uye_youtube'=>$uye_youtube
];

$process=veriupdate("uyeler",$params,"uye_id ='$uye_id'");



if ($process){
        yonlendir("../profil?durum=ok");

          }
    else {
yonlendir("../profil?durum=no");
          }

}






if (isset($_POST["asifreupdate"])) {
$id=post("uye_id");
$eski_sifre=md5(post("eski_sifre"));
$yeni_sifre=md5(post("yeni_sifre"));
$yeni_sifre2=md5(post("yeni_sifre2"));



$eskisifre = tekvericek("uyeler", "uye_password", "uye_id", $id);



if ($eski_sifre==$eskisifre) {

if ($yeni_sifre==$yeni_sifre2) {


$params=
[
  'uye_password'=>$yeni_sifre
];
$process=veriupdate("uyeler",$params,"uye_id ='$id'");

  if ($process){
          yonlendir("../sifreayar?durum=ok");

            }
      else {
  yonlendir("../sifreayar?durum=no");
            }
}
else {
  yonlendir("../sifreayar?durum=sifreleresitdegil");
}

}else {
  yonlendir("../sifreayar?durum=ilksifreyanlis");
}

}








if (isset($_POST["sayfaekle"])) {
  $sayfaurl=post("seourl");
   $sayfaadi=post("sayfaadi");
  $sayfabaslik=post("sayfabaslik");
  $sayfaicerik=post("sayfaicerik");
  $description=post("description");
  $keywords=post("keywords");
  $random=rand(100,250);

$seo="sayfa-".seo($sayfaurl)."-".$random;

$params=
[
  'sayfa_id'=>$random,
  'sayfa_adi'=>$sayfaadi,
  'sayfa_url'=>$seo,
  'sayfa_baslik'=>$sayfabaslik,
  'sayfa_icerik'=>$sayfaicerik,
  'description'=>$description,
  'keywords'=>$keywords
];

$process=veriekle("sayfalar",$params);



   if ($process){

 yonlendir("../sayfaekle?durum=ok");
        }
   else {
  yonlendir("../sayfaekle?durum=no");
        }

 }







if (isset($_POST["sayfaduzenle"])) {

$sayfa_id=post("id");


$params=
[
  'sayfa_adi'=>post("sayfaadi"),
  'sayfa_baslik'=>post("sayfabaslik"),
  'sayfa_icerik'=>post("sayfaicerik"),
  'description'=>post("description"),
  'keywords'=>post("keywords")
];
$process=veriupdate("sayfalar",$params,"sayfa_id = '$sayfa_id'");

if ($process){
        yonlendir("../sayfaduzenle-$sayfa_id?durum=ok");

          }
    else {
yonlendir("../sayfaduzenle-$sayfa_id?durum=no");
          }


}






if (isset($_POST["sayfasil"])) {



  $getid=post("num");
$sil=kaldir("sayfalar",$getid,"sayfa_id");
    if ($sil){
              yonlendir("../sayfalistele?durum=ok");
                }
          else {
    yonlendir("../bilgilistele?durum=no");
                }

}





if (isset($_POST["degiskensil"])) {


$tablo_id=post("no");
$degiskenid=post("num");

$tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);
$degiskenadi = tekvericek("degiskenler", "degisken_adi", "degisken_id", $degiskenid);


$kontrol=kaldir("degiskenler",$degiskenid,"degisken_id");

  if ($kontrol){

  $sorgu=$db->query("ALTER TABLE $tablo_adi DROP $degiskenadi");
  if ($sorgu) {
  yonlendir("../tabloduzenle-$tablo_id?durum=ok");
  }
  else {
yonlendir("../tabloduzenle-$tablo_id?durum=no");
  }
              }
        else {
    yonlendir("../tabloduzenle-$tablo_id?durum=no");
              }

}









if (isset($_POST["menukatekle"])) {


$params=
[
  'kategori_adi'=>post("kategori")
];
$process=veriekle("menukategori",$params);
  if ($process){
yonlendir("../menukategoriekle?durum=ok");
    }
  else {
  yonlendir("../menukategoriekle?durum=no");
    }
}






if (isset($_POST["menukatupdate"])) {

$id=post("id");

  $params=
  [
    'kategori_adi'=>post("kategori")
  ];

  $process=veriupdate("menukategori",$params,"menukat_id = '$id'");


if ($process){
        yonlendir("../menukategoriduzenle-$id?durum=ok");

          }
    else {
yonlendir("../menukategoriduzenle-$id?durum=no");
          }
        }





        if (isset($_POST["menuekle"])) {


          $katid=post("kategori_id");

          $params=
          [
            'menu_adi'=>post("menu_adi"),
            'menu_icon'=>post("menuicon"),
            'menu_link'=>post("menu_link"),
            'menu_sira'=>post("sira"),
            'parent_id'=>post("parent_id"),
            'menukat_id'=>post("kategori_id")
          ];

    $process = veriekle("menuler",$params);
    if ($process){
    yonlendir("../menuekle-$katid?durum=ok");
        }
          else {
  yonlendir("../menuekle-$katid?durum=no");
            }

        }






if (isset($_POST["contactform"])) {

$url=post("url");

$params=
[
  'mesaj_kuladi'=>post("adi"),
  'mesaj_konu'=>post("mesajkonu"),
  'mesaj_posta'=>post("posta"),
  'mesaj_tel'=>post("tel"),
  'mesaj_icerik'=>post("mesaj")
];

$process=veriekle("mesajlar",$params);
if ($process) {
yonlendir("".$url."?durum=ok");
}
else {
yonlendir("".$url."?durum=no");
}
}





if (isset($_POST["mesajdurum"])) {
$durum=post("mesaj_durum");

 $params=
 [
   'mesaj_durum'=>$durum
 ];

$id=post("id");
$process=veriupdate("mesajlar",$params,"mesaj_id = '$id'");

if ($process) {
yonlendir("../mesajlistele?durum=ok");
}
else {
  yonlendir("../mesajlistele?durum=no");
}
}






if (isset($_POST["mesajkaldir"])) {

  $iddegiskeni=post("id");

$sil=kaldir("mesajlar",$iddegiskeni,"mesaj_id");
if ($sil) {
  yonlendir("../mesajlistele?durum=ok");
}
else {
  yonlendir("../mesajlistele?durum=no");
}
}








if (isset($_POST["sitegayarkaydet"])) {

$params=
[
  'ayar_sitedurum'=>post("sitedurum"),
  'gtag'=>post("gtag")
];
$process=veriupdate("ayar",$params,"ayar_id = '0'");
if ($process) {
yonlendir("../genelayar?durum=ok");
}
else {
yonlendir("../genelayar?durum=no");
}

}




if (isset($_POST["truncate"])) {
if ($yetki==6 or $yetki==5) {
  $tablo_adi=seo(post("table"));


  $sil=$db->prepare("DELETE from $tablo_adi");
  $kontrol=$sil->execute();
  if ($kontrol) {
  yonlendir("../tablolistele?durum=ok");
  }
  else {
    yonlendir("../tablolistele?durum=no");
  }
}
else {


  yonlendir("../tablolistele?durum=yetkisizislem");

}

}




if (isset($_POST["menusil"])) {
$id=post("no");
$katid=post("num");
$sil=kaldir("menuler",$id,"menu_id");
if ($sil) {
yonlendir("../menulistele-$katid?durum=ok");
}
else {
yonlendir("../menulistele-$katid?durum=no");
}

}



if (isset($_POST["menukategorisil"])) {
$id=post("num");


$sil1=kaldir("menukategori",$id,"menukat_id");


if ($sil1) {
$sil2=kaldir("menuler",$id,"menukat_id");
if ($sil2) {
    yonlendir("../menukategorilistele?durum=ok");
}
else {
  yonlendir("../menukategorilistele?durum=no");
}
}
else {
  yonlendir("../menukategorilistele?durum=no");
}

}


if (isset($_POST["menuduzenle"])) {
$id=post("id");
$katid=post("katid");

$params=
[
  'menu_adi'=>post("menu_adi"),
  'menu_icon'=>post("menuicon"),
  'menu_link'=>post("menu_link"),
  'menu_sira'=>post("sira"),
  'parent_id'=>post("parent_id")
];
$process=veriupdate("menuler",$params,"menu_id = '$id'");
  if ($process) {
      yonlendir("../menuduzenle-".$katid."-".$id."?durum=ok");

  }
  else {
yonlendir("../menuduzenle-".$katid."-".$id."?durum=no");
  }

}


if (isset($_POST['tablosetduzenle'])) {
if ($yetki==6 or $yetki==5 ) {
$tablo_id=post("tablo_id");
$sef=seo(post('tablo_sef'));

$params=
[
'tablo_baslik'  => post("tablo_baslik"),
'tablo_sef'  => $sef,
'tablo_sablon'  => post("tablo_sablon")
];

$process=veriupdate("tablolar",$params,"tablo_id = '$tablo_id'");

if ($process) {
  yonlendir("../tabloduzenle-$tablo_id");
}
else {
  yonlendir("../tabloduzenle-$tablo_id");
}
}
else {
    yonlendir("../index?durum=yetkisizislem");
}
}



if (isset($_POST["tabledelete"])) {
if ($yetki==6 or $yetki==5 ) {

$tablo_id=post("tablo_id");
$tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $tablo_id);


$sql = "DROP TABLE $tablo_adi";
try {
    $tablosil = $db->prepare($sql);
    $tablosil->execute();


    $sil1=kaldir("degiskenler",$tablo_id,"tablo_id");
    if ($sil1) {
    $sil2=kaldir("tablolar",$tablo_id,"tablo_id");
    if ($sil2) {
      yonlendir("../tablolistele?durum=ok");
    }
    else {
        yonlendir("../tablolistele?durum=no");
    }
    }
    else {
            yonlendir("../tablolistele?durum=no");
    }

} catch(PDOException $e) {
  yonlendir("../tablolistele?durum=no");
}
}
else {
  yonlendir("../index?durum=yetkisizislem");
}

}


if (isset($_POST["ipengelle"])) {
if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {
  $ip_adresi = post("ip_adresi");
  $banned_time = post("banned_time");
  $reason = post("ban_sebebi");

  if ($banned_time=="0") {
    $ban_date1="0";
  }
  else {
      $ban_date1=date('Y-m-d H:i:s');
  }

$params = [
    'banned_by' => $kullanici_id,
    'banned_ip' => $ip_adresi,
    'banned_time' => $banned_time,
    'ban_date' => $ban_date1,
    'reason' => $reason
];

$process = veriekle("banned_ips", $params);


if ($process) {
  yonlendir("../guvenlikayar?durum=ok");
}
else {
  yonlendir("../guvenlikayar?durum=no");
}

}
else {
  yonlendir("../index?durum=yetkisizislem");
}
}

if (isset($_POST["ipengelle2"])) {
if ($yetki==6 or $yetki==5 or $yetki==4 or $yetki==3) {
  $ip_adresi = post("ip_adresi");
  $banned_time = post("banned_time");
  $reason = post("ban_sebebi");

  if ($banned_time=="0") {
    $ban_date1="0";
  }
  else {
      $ban_date1=date('Y-m-d H:i:s');
  }

$params = [
    'banned_by' => $kullanici_id,
    'banned_ip' => $ip_adresi,
    'banned_time' => $banned_time,
    'ban_date' => $ban_date1,
    'reason' => $reason
];

$process = veriekle("banned_ips", $params);


if ($process) {
  yonlendir("../index?durum=ok");
}
else {
  yonlendir("../index?durum=no");
}
}
else {
    yonlendir("../index?durum=yetkisizislem");
}

}

if (isset($_POST["ziyaretruncate"])) {
if ($yetki==6 or $yetki==5 or $yetki==4) {
  $sil=$db->prepare("DELETE from ziyaretciler");
  $kontrol=$sil->execute();
  if ($kontrol) {
  yonlendir("../guvenlikayar?durum=ok");
  }
  else {
    yonlendir("../guvenlikayar?durum=no");
  }
}
else {
  yonlendir("../guvenlikayar?durum=yetkisizislem");
}
}




 ?>
