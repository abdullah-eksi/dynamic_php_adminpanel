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


if (strpos($_SERVER['REQUEST_URI'], '/aepanel/') !== false) {

}
else {


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
$ekle = $db->prepare("INSERT INTO ziyaretciler SET
    ziyaretci_ip = :ip,
    ziyaretci_useragent = :user_agent,
    ziyaretci_referer = :referer,
    ziyaretci_browser = :browser_name,
    ziyaretci_browser_version = :browser_version,
    ziyaretci_cihaz_bilgisi = :device_info,
    ziyaretci_cihaz_turu = :device_type");
$insert = $ekle->execute(array(
    'ip' => $ip,
    'user_agent' => $user_agent,
    'referer' => $referer,
    'browser_name' => $browser_name,
    'browser_version' => $browser_version,
    'device_info' => $device_info,
    'device_type' => $device_type
));
// Silinecek kayıtları temizle
$delete = $db->prepare("DELETE FROM ziyaretciler WHERE ziyaret_tarihi < DATE_SUB(NOW(), INTERVAL 30 DAY)");
$delete->execute();

}
?>
