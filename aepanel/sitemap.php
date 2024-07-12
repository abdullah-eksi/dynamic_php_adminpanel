<?php include 'aelib.php'; ?>

<?php

// sitemap dosyasının başlığı
$header = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
$header .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

// anasayfa URL'sini ekleyin
$anasayfa_url = URL;
$sitemap .= '<url><loc>'.$anasayfa_url.'</loc><lastmod>'.date("Y-m-d\TH:i:s+00:00").'</lastmod></url>'."\n";

// sayfa ve içerik URL'lerini toplama
$sayfa = vericek("sayfalar","","COK");
foreach ($sayfa as $sayfalar) {
    $url = URL . '/' . $sayfalar["sayfa_url"];
    $sitemap .= '<url><loc>'.$url.'</loc><lastmod>'.date("Y-m-d\TH:i:s+00:00").'</lastmod></url>'."\n";
}

$tablo = vericek("tablolar","Where tablo_sef!=''","COK");
foreach ($tablo as $tablolar) {
    $tablo_adi = $tablolar["tablo_adi"];
    $sekil_id = $tablolar["tablo_id"];
    $url = URL . '/' . $tablolar["tablo_sef"];
    $sitemap .= '<url><loc>'.$url.'</loc><lastmod>'.date("Y-m-d\TH:i:s+00:00").'</lastmod></url>'."\n";
    $icerik = vericek($tablo_adi,"","COK");
    foreach ($icerik as $icerikler) {
        $no = $icerikler["id"];
        $baslik = seo($icerikler["baslik"]);
        $url = icerikac($baslik,$no,$sekil_id);
        $sitemap .= '<url><loc>'.$url.'</loc><lastmod>'.date("Y-m-d\TH:i:s+00:00").'</lastmod></url>'."\n";
    }
}

// sitemap dosyasının sonu
$footer = '</urlset>'."\n";

// sitemap dosyasını oluşturma
$sitemap_file = fopen('../sitemap.xml', 'w');
if ($sitemap_file !== false) {
    fwrite($sitemap_file, $header.$sitemap.$footer);
    fclose($sitemap_file);
  yonlendir("genelayar?sitemapupdate=ok");

} else {
    yonlendir("genelayar?sitemapupdate=no");
}

?>
