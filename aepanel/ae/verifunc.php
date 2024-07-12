<?php

/*
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
*/

function bilgi($bilgi,$icerik){
  global $db;
  $bilgibul=$db->prepare("SELECT * FROM bilgi where bilgiadi=:bilgiadi");
    $bilgibul->execute(array(
    "bilgiadi"=>$bilgi
      ));

  while($bilgicek=$bilgibul->fetch(PDO::FETCH_ASSOC)){
if ($icerik=="icerik") {
return $bilgicek["bilgi_icerik"];
}
if ($icerik=="baslik") {
return $bilgicek["bilgi_baslik"];
}
if ($icerik=="icon") {
return $bilgicek["bilgi_icon"];
}

  }
}

function dosya($file, $allowed_types = [], $destination) {
    $tmp_name = $file["tmp_name"];
    $file_type = $file["type"];
    $file_ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    // Dosya türü kontrolü
    if (!empty($allowed_types) && !in_array($file_type, $allowed_types)) {
        return false;
    }

    // Dosya adı oluşturma
    $file_name = 'aepanel' . uniqid() . '.' . $file_ext;

    // Dosya yükleme işlemi
    if (move_uploaded_file($tmp_name, $destination . '/' . $file_name)) {
        return $file_name;
    } else {
        return false;
    }
}


function tekvericek($tabloadi, $sutunadi, $kosul, $deger) {
  global $db;
  $tekverisor = $db->prepare("SELECT * FROM $tabloadi WHERE $kosul = :value");
  $tekverisor->execute(array(
      'value' => $deger
  ));
  $tekvericek = $tekverisor->fetch(PDO::FETCH_ASSOC);

  if ($tekvericek === false) {
      return false;  // Ensure function returns false if no result is found
  }

  $sonuc = $tekvericek["$sutunadi"];
  return $sonuc;
}



function ayarcek($deger){
global $db;


$ayarsor=$db->prepare("SELECT*FROM ayar WHERE ayar_id=:id");

$ayarsor->execute(array(
'id'=>0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
return $ayarcek["$deger"];



}




function verisay($tabloadı,$kosul,$deger){
if ($kosul!="" and $deger!="") {


global $db;

$verisor=$db->prepare("SELECT*FROM $tabloadı where $kosul=:kosul");

$verisor->execute(array(
'kosul'=>$deger
));
return $say=$verisor->rowCount();
}
else {
global $db;

$verisor=$db->prepare("SELECT * FROM $tabloadı");

$verisor->execute(array());

return $say=$verisor->rowCount();
}
}

function veritopla($tabloadi,$deger1,$kosul,$deger){
global $db;
$stok=0;



if ($kosul!=null and $deger!=null) {
$verisor=$db->prepare("SELECT*FROM $tabloadi where $kosul=:kosul");

$verisor->execute(array(
  'kosul'=>$deger
));
}
else {



$verisor=$db->prepare("SELECT*FROM $tabloadi");

$verisor->execute(array());

}
while ($vericek=$verisor->fetch(PDO::FETCH_ASSOC)) {
$stok+=$vericek["$deger1"];

}
return $stok;
}







function kategori($parent_id=0)
{


global $db;
  echo '<li>';
$kategoricek=$db->query("select *from kategori where parent_id=$parent_id");

if($kategoricek -> rowcount()){

foreach ($kategoricek as $kategori_sonuc) {

  echo ' <a href="urun-'.$kategori_sonuc["kategori_link"].'">'.$kategori_sonuc['kategori_adi'].'</a>';
  if ($kategori_sonuc["kategori_id"]) {
    echo '<ul>';
     kategori($kategori_sonuc['kategori_id']);
      echo '</ul>';

  }


      echo '</li>';
}

}

}




function  vericek($tablo,$sorgu,$sekil){
  global $db;
  $datasor=$db->prepare("SELECT * FROM {$tablo} {$sorgu}");
  $datasor->execute();
  switch ($sekil) {
    case 'TEK':
    while($datacek=$datasor->fetch(PDO::FETCH_ASSOC)) {
      return $datacek;
    }
    break;
    case 'ÇOK':
      return $datasor;
    break;
    case 'COK':
      return $datasor;
    break;
    default:
    while($datacek=$datasor->fetch(PDO::FETCH_ASSOC)) {
      return $datacek;
    }
      break;
  }
}


function veriekle($tabloAdi, $veri) {
  global $db; // Veritabanı bağlantısı

  $sorgu = "INSERT INTO $tabloAdi SET ";
  $params = array();

  foreach ($veri as $sutunAdi => $sutunDegeri) {
    $sorgu .= "$sutunAdi = ?, ";
    array_push($params, $sutunDegeri);
  }

  $sorgu = rtrim($sorgu, ", ");

  $ekle = $db->prepare($sorgu);
  $insert = $ekle->execute($params);

  if ($insert) {
    return true;
  } else {
    return false;
  }
}


function veriupdate($tabloAdi, $veri, $kosul) {
  global $db; // Veritabanı bağlantısı

  $sorgu = "UPDATE $tabloAdi SET ";
  $params = array();

  foreach ($veri as $sutunAdi => $sutunDegeri) {
    $sorgu .= "$sutunAdi = ?, ";
    array_push($params, $sutunDegeri);
  }

  $sorgu = rtrim($sorgu, ", ");
  $sorgu .= " WHERE $kosul";

  $guncelle = $db->prepare($sorgu);
  $update = $guncelle->execute($params);

  if ($update) {
    return true;
  } else {
    return false;
  }
}


function kullaniciarat()
{
  if (isset($_SESSION["user"])) {

  $kullanici=$_SESSION["user"];


 $kullaniciarat=vericek("uyeler","WHERE uye_kuladi='$kullanici'","TEK");
    return $kullaniciarat;
  }
}




function  kaldir($tablo,$id,$id_degisken){
  global $db;
  $query = $db->prepare("DELETE FROM $tablo where $id_degisken='$id'");
  $insert = $query->execute(array());
  if($insert){
    return "1";
  } else {
    return "0";
  }
}




function kategoriyeni($parent_id = 0, $ul_class, $li_class, $a_class, $submenu_class) {



    $kategori = vericek("kategori", "WHERE parent_id = '$parent_id'  ", "COK");


    if ($kategori->rowCount() > 0) {
        echo "<ul class='$ul_class'>";

        foreach ($kategori as $item) {
            $url = $item['kategori_link'];
            $label = $item['kategori_adi'];
            $id = $item['kategori_id '];
            $has_submenu = vericek("kategori", "WHERE parent_id = $id ", "COK")->rowCount() > 0;
            $active = $url === $_SERVER['REQUEST_URI'];

            $classes = [$li_class];
            if ($active) {
                $classes[] = 'active';
            }
            if ($has_submenu) {
                $classes[] = 'has-' . $submenu_class;
            }

            echo "<li class='" . implode(' ', $classes) . "'>";
              echo "<a href='".URL.'/'.$url."' class='$a_class'>$label</a>";

            if ($has_submenu) {
                echo "<ul class='$ul_class'>";
                kategoriyeni($id, $submenu_class, $li_class, $a_class, $submenu_class);

            }

            echo "</li>";
        }

        echo "</ul>";
    }
}










function menu($parent_id = 0, $ul_class, $li_class, $a_class, $submenu_class,$konumcode) {

  $katcek=vericek("menukategori", "WHERE kategori_adi = '$konumcode'", "TEK");
  $kat_id=$katcek["menukat_id"];

    $menu = vericek("menuler", "WHERE parent_id = '$parent_id' and menukat_id='$kat_id'  Order By menu_sira ", "COK");


    if ($menu->rowCount() > 0) {
        echo "<ul class='$ul_class'>";

        foreach ($menu as $item) {
            $url = $item['menu_link'];
            $label = '<i class="'.$item['menu_icon'].'"></i>&nbsp;'.$item['menu_adi'];
            $id = $item['menu_id'];
            $has_submenu = vericek("menuler", "WHERE parent_id = $id AND menukat_id='$kat_id' Order By menu_sira", "COK")->rowCount() > 0;
            $active = $url === $_SERVER['REQUEST_URI'];

            $classes = [$li_class];
            if ($active) {
                $classes[] = 'active';
            }
            if ($has_submenu) {
                $classes[] = 'has-' . $submenu_class;
            }

            echo "<li class='" . implode(' ', $classes) . "'>";

            echo "<a href='".URL.'/'.$url."' class='$a_class'>$label</a>";
            if ($has_submenu) {
                menu($id, $submenu_class, $li_class, $a_class, $submenu_class,$konumcode);
            }

            echo "</li>";
        }

        echo "</ul>";
    }
}


function icerikcek($icerik_id, $kosul) {
  // Fetch the table name using the provided ID
  $tablo_adi = tekvericek("tablolar", "tablo_adi", "tablo_id", $icerik_id);

  // Check if a valid table name was fetched
  if ($tablo_adi === false || empty($tablo_adi)) {
      // Handle the error: table name could not be fetched
      echo "Error: Invalid table name.";
      return [];
  }

  // Fetch the records from the table using the provided condition
  $verisor = vericek($tablo_adi, $kosul, "COK");

  // Check if the query returned valid results
  if ($verisor === false) {
      // Handle the error: query failed or returned no results
      echo "Error: No results found.";
      return [];
  }

  // Collect the fetched records into an array
  $veriler = array();
  foreach ($verisor as $veri) {
      $veriler[] = $veri;
  }

  // Return the records as a JSON-decoded array
  return json_decode(json_encode($veriler));
}



function kullaniciliste($yetki, $no) {
  switch ($no) {
    case 5:
      if ($yetki == 6) {
        $yetkiadi = "Developer";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    case 4:
      if ($yetki == 6 or $yetki == 5) {
        $yetkiadi = "Admin";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    case 3:
      if ($yetki == 6 or $yetki == 5 or $yetki == 4 or $yetki == 3) {
        $yetkiadi = "Yönetici";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    case 2:
      if ($yetki == 6 or $yetki == 5 or $yetki == 4 or $yetki == 3) {
        $yetkiadi = "Editör";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    case 1:
      if ($yetki == 6 or $yetki == 5 or $yetki == 4 or $yetki == 3) {
        $yetkiadi = "Panel Üye";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    case 0:
      if ($yetki == 6 or $yetki == 5 or $yetki == 4 or $yetki == 3) {
        $yetkiadi = "Üyeler";
      } else {
        header("Location:index?durum=yetkisizdeneme");
        exit();
      }
      break;
    default:
      header("Location:index?durum=yetkisizdeneme");
      exit();
  }
  return array("no" => $no, "yetkiadi" => $yetkiadi);
}




function icerikac($baslik,$id,$sekil_id)
{
	$sekil_adi= tekvericek("tablolar", "tablo_sef", "tablo_id", $sekil_id);
	$baslik=seo($baslik);
	$link=URL."/".$sekil_adi."/".$baslik."-".$id;
return $link;
}
 ?>
