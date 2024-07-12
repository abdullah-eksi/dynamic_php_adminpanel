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

session_start();
ob_start();


if (isset($_SESSION["sure"])) {
	if($_SESSION["sure"] < time()){

		unset($_SESSION["sure"]);
		unset($_SESSION["incele"]);
session_destroy();
	yonlendir(URL);
	}


}

function giriskontrol()
{
	if (isset($_SESSION["kullaniciadi"])) {
yonlendir(URL);
}
}

function yetkiMetni($yetki) {
  if($yetki==6) {
    return "Ana Developer";
  } elseif($yetki==5) {
    return "Developer";
  } elseif($yetki==4) {
    return "Admin";
  } elseif ($yetki==3) {
    return "Yönetici";
  } elseif ($yetki==2) {
    return "Editör";
  } elseif ($yetki==1) {
    return "Üye";
  } else {
    return "Belirtilmemiş yetki";
  }
}


function admingiriskontrol()
{
	if (isset($_SESSION["kuladi"])) {
yonlendir(AEURL);

	}
}
function url()
{

  $adres = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  return $adres;
}
function sayfaid($url){
	$sayfa_id=explode('-',$url);

	$sayfa_id=end($sayfa_id);
	return $sayfa_id;
}


function uruncode($baslangic,$bitis)
{
	$sayi=rand($baslangic,$bitis);
$ae="AE-".$sayi;
return $ae;
}

	function kisalt($kelime, $str = 10)
	{
		if (strlen($kelime) > $str)
		{
			if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
			else $kelime = substr($kelime, 0, $str).'..';
		}
		return $kelime;
	}



	function seo($text){
	    $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
	    $degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
	    $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
	    $text = preg_replace($find,$degis,$text);
	    $text = preg_replace("/ +/"," ",$text);
	    $text = preg_replace("/ /","-",$text);
	    $text = preg_replace("/\s/","",$text);
	    $text = strtolower($text);
	    $text = preg_replace("/^-/","",$text);
	    $text = preg_replace("/-$/","",$text);
	    return $text;
	  }



	 function urunac($seourl,$urun_id){
	  echo  "urun-".$seourl."-".$urun_id;
	  }

		function cagir($yol){
			?>
			<script type="text/javascript">
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
		require  "inc/$yol".".php";

		}





		function post($post){
		  return $_POST["$post"];
		}

		function get($get){
		  return $_GET["$get"];
		}
	function baslik($deger){

	  $sitetitle= bilgi("site_title","icerik");

	  if ($deger != "") {
	
		$newbaslik =  "<title>".
	 		$deger." - ".$sitetitle
		 ."</title> ";
	return $newbaslik;

	}else {
	  $baslik="<title>".$sitetitle."</title>";
	  return $baslik;
	}


	}
	function logocek()
	{
	  $logo=AEURL."/".ayarcek("ayar_logo");
	  return $logo;
	}
	function faviconcek()
	{
	  $icon=AEURL."/".ayarcek("ayar_favicon");
	  return $icon;
	}
	function resimcek($deger)
	{
	  $veri=AEURL."/".$deger;
	  return $veri;
	}




	function sayfagit($sayfa)
	{

	return $sayfam=URL."/sayfa-".$sayfa;

	}



function yonlendir($yonlendir)
{
header("location:$yonlendir");
}
function Refresh($time,$url=null)
{
	if ($url!=null) {
		header("Refresh:$time,url=$url");
	}else {
			header("Refresh:$time");
	}

}



function sitekontrol() {
global	$db;

  $ip_adresi = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
  $ip_adresi = filter_var($ip_adresi, FILTER_VALIDATE_IP);

  $veriler = vericek("banned_ips", "Where banned_ip = '$ip_adresi'", "TEK");

  if ($veriler) {
    $banned_time = $veriler["banned_time"];

    if ($banned_time != 0) {
      $ban_date = strtotime($veriler["ban_date"]);
      if ($ban_date + $banned_time < time()) {
        $sil = kaldir("banned_ips", $veriler["id"], "id");
      } else {
        yonlendir($url."/uyari/6");
      }
    }
  }



  $durum = ayarcek("ayar_sitedurum");
  if ($durum != 2) {
    if ($_SESSION["incele"] == "1") {
      // Do nothing
    } else {
      yonlendir($url."/uyari/$durum");
    }
  }
}


function useragent() {

global	$db;
  if (strpos($_SERVER['REQUEST_URI'], '/aepanel/') !== false) {
    return;
  } else {
    // Ziyaretçinin IP adresini al
    $ip = $_SERVER['REMOTE_ADDR'];

    // User agent bilgisini al
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Referer bilgisini al
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'https://' . $_SERVER['HTTP_HOST'];

    // Tarayıcı bilgisini ayrıştır
    $pattern = "/^Mozilla\/([0-9]+\.[0-9]+)\s\((.*?)\)\s(.*)$/";
    preg_match_all($pattern, $user_agent, $matches);
    $browser_version = $matches[1][0];
    $device_info = $matches[2][0];
    $browser_name = $matches[3][0];

    // Cihaz türünü belirle
    $device_type = '';
    if (preg_match('/(tablet|ipad)|(android(?!.*mobile))/i', $user_agent)) {
      $device_type = 'Tablet';
    } elseif (preg_match('/Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/i', $user_agent)) {
      $device_type = 'Telefon';
    } else {
      $device_type = 'Bilgisayar';
    }
 // Ziyaretçi bilgilerini veritabanına ekle

 $params=
 [
'ziyaretci_ip'=>$ip,
'ziyaretci_useragent'=>$user_agent,
'ziyaretci_referer'=>$referer,
'ziyaretci_browser'=>$browser_name,
'ziyaretci_browser_version'=>$browser_version,
'ziyaretci_cihaz_bilgisi'=>$device_info,
'ziyaretci_cihaz_turu'=>$device_type
];

veriekle("ziyaretciler",$params);
$delete = $db->prepare("DELETE FROM ziyaretciler WHERE ziyaret_tarihi < DATE_SUB(NOW(), INTERVAL 30 DAY)");
$delete->execute();
}



}

function yetki($izinler, $yetki) {
    if (in_array($yetki, $izinler)) {
        // Kullanıcının yetkisi var, burada istediğiniz işlemleri yapabilirsiniz
    } else {
        // Kullanıcının yetkisi yok, ana sayfaya yönlendirin
      yonlendir(AEURL);

    }
}


  ?>
