-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 28 Mar 2023, 13:50:23
-- Sunucu sürümü: 5.5.68-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `aepanel1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `ayar_favicon` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ayar_sitedurum` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gtag` varchar(550) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_favicon`, `ayar_sitedurum`, `gtag`) VALUES
(0, 'upload/img/23927sitelogo.png', 'upload/img/20259sitefavicon.ico', '0', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banned_ips`
--

CREATE TABLE `banned_ips` (
  `id` int(11) UNSIGNED NOT NULL,
  `banned_by` int(11) UNSIGNED NOT NULL,
  `banned_ip` varchar(50) NOT NULL,
  `banned_time` int(250) UNSIGNED NOT NULL,
  `ban_date` varchar(500) DEFAULT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgi`
--

CREATE TABLE `bilgi` (
  `bilgi_id` int(11) NOT NULL,
  `bilgiadi` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `bilgi_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bilgi_baslik` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bilgi_icerik` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bilgi_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bilgi`
--

INSERT INTO `bilgi` (`bilgi_id`, `bilgiadi`, `bilgi_title`, `bilgi_baslik`, `bilgi_icerik`, `bilgi_icon`, `kategori_id`) VALUES
(3, 'social2', 'youtube link', '', 'https://www.youtube.com', 'fab fa-youtube', 4),
(5, 'social3 ', 'facebook link', '', 'https://www.facebook.com', 'fab fa-facebook', 4),
(20, 'site_title', 'Site başlık', '', 'Abdullah Ekşi', '', 1),
(27, 'ayar_tel', 'telefon', 'Hemen Ara', '0216 444 44 44', 'fa fa-phone', 5),
(36, 'social4', 'Linkedin url', '', 'https://www.linkedin.com', 'fab fa-linkedin', 4),
(37, 'footer', 'site footer', '', '<p class=\"col-md-auto mb-0 text-muted\"> Devoloped By <font size=\"3\" color=\"#008AA3\"><b> <a style=\"text-decoration:none; color: #008AA3 \"href=\"http://www.abdullaheksi.com.tr\">Abdullah Ekşi</a></b></p>', '', 6),
(38, 'ayar_posta', 'E-Posta', 'E-Posta', 'deneme@denememail.com', '', 5),
(39, 'footerbaslik1', 'footer başlık 1', '', 'Daha Fazla', '', 6),
(40, 'footerbaslik2', 'footer başlık 2	', '', 'İletişim Bilgileri', '', 6),
(42, 'ayar_adres', 'Adres', 'Adres', 'istanbul / çekmeköy', '', 5),
(43, 'ayar_mesai', 'Destek ekibi Mesai:', '', '8:00/22:00', '', 5),
(44, 'site_keyword', 'site anahtar kelime', '', 'site anahtar kelime', '', 1),
(45, 'site_description', 'Site Açıklama', '', 'Site Açıklama', '', 1),
(46, 'author', 'Site Author', '', 'abdullah ekşi', '', 1),
(57, 'liste_1', 'liste_1', '', 'Hizmetler', '', 11),
(59, 'social1', 'İnstagram', '', 'https://www.instagram.com', 'fab fa-instagram', 4),
(60, 'liste_2', 'Liste 2', '', 'Blog', '', 11),
(61, 'bannerslogan', 'Banner Slogan', '', 'Birlikte kodlayarak, fikirleri gerçeğe dönüştürüyoruz.', '', 13),
(62, 'bannerbutton', '', 'Hemen Keşfet', 'hizmet', '', 11),
(63, 'basari1', 'istatistik 1', 'Proje Tamamlandı', '5', 'flaticon-checking', 13),
(64, 'basari2', 'istatistik 2', 'Mutlu Müşteri', '50', 'flaticon-recommend', 13),
(65, 'basari3', 'istatistik 3', 'Yazılım Mödülü', '2', 'fa fa-desktop', 13),
(66, 'basari4', 'istatistik 4', 'Deneyim', '10', 'fa fa-book', 13),
(67, 'logoaltislogan', 'Logo Altı Slogan', '', 'Birlikte kodlayarak, fikirleri gerçeğe dönüştürüyoruz.', '', 6),
(68, 'googlemap', 'Google Map', 'Google Map', '!1m18!1m12!1m3!1d96250.23189438818!2d29.19954061968607!3d41.07293260661456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cad2e51ddddf97%3A0xee27abe63246e12a!2zw4dla21la8O2eS_EsHN0YW5idWw!5e0!3m2!1str!2str!4v1679163170903!5m2!1str!2str', '', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgikategori`
--

CREATE TABLE `bilgikategori` (
  `bilgikategori_id` int(11) NOT NULL,
  `bilgikategori_adi` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bilgikategori`
--

INSERT INTO `bilgikategori` (`bilgikategori_id`, `bilgikategori_adi`) VALUES
(1, 'Genel Bilgiler'),
(2, 'Anasayfa'),
(4, 'Sosyal Medya'),
(5, 'İletişim'),
(6, 'Site Altı'),
(11, 'İçerik Liste Başlıkları'),
(13, 'Banner  Ve istatistikler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `sekilbaslik` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `resim` varchar(500) DEFAULT NULL,
  `baslik` varchar(250) DEFAULT NULL,
  `İcerik` text,
  `tarih` varchar(250) DEFAULT NULL,
  `Yazar` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `sekilbaslik`, `description`, `keywords`, `resim`, `baslik`, `İcerik`, `tarih`, `Yazar`) VALUES
(2, 'Kurumsal Web Tasarım Nedir ?', '   Kurumsal web tasarımı, işletmenizin dijital varlığınızı güçlendirmek için önemli bir araçtır. Bu blog yazısında, kurumsal web tasarımının faydalarını ve işletmeniz için neden önemli olduğunu öğrenebilirsiniz. İyi bir kurumsal web tasarımı, işletmenizin online görünürlüğünü artırır, müşterilerinizin ihtiyaçlarına cevap verir ve marka imajınızı güçlendirir. Profesyonel bir ekip tarafından tasarlanması önerilir.   ', 'web tasarım, web yazılım, kurumsal web tasarım', 'aepanel/upload/icerik/31162ae.jpg', 'Kurumsal Web Tasarım Nedir ?', '<p>G&uuml;n&uuml;m&uuml;zde, kurumsal web siteleri işletmelerin başarılı olmaları i&ccedil;in vazge&ccedil;ilmez bir ara&ccedil; haline gelmiştir. Kurumsal web tasarımı, işletmenin online varlığına uygun bir şekilde web sitesi tasarımı ve geliştirilmesidir. Kurumsal web siteleri, genellikle bir şirketin &uuml;r&uuml;n ve hizmetleri hakkında bilgi verirken, işletmenin dijital kimliğini de yansıtır. Kurumsal web tasarımı, m&uuml;şterilerinize ulaşmak i&ccedil;in en etkili yollardan biridir.</p>\r\n\r\n<p>Kurumsal web tasarımı, m&uuml;şterilerinizin web sitenizdeki deneyimlerini etkileyen bir&ccedil;ok fakt&ouml;r&uuml; i&ccedil;erir. Web sitesinin tasarımı, renkleri, yazı karakteri, g&ouml;rsel i&ccedil;erik, kullanıcı aray&uuml;z&uuml;, navigasyon ve i&ccedil;erik yapısı gibi bir&ccedil;ok etken m&uuml;şterilerinizi etkiler. Kurumsal web tasarımı, m&uuml;şterilerinizin sitenizi ziyaret etme ve sitenizde vakit ge&ccedil;irme konusunda motivasyonlarını da etkiler.</p>\r\n\r\n<p>Kurumsal web tasarımı, işletmenizin dijital varlığı i&ccedil;in &ccedil;ok &ouml;nemlidir. İyi tasarlanmış bir kurumsal web sitesi, işletmenizin online varlığını artırabilir ve potansiyel m&uuml;şterilerinizin g&uuml;venini kazanmanıza yardımcı olabilir. Kurumsal web sitesi, işletmenizin hedef kitlesine, &uuml;r&uuml;n ve hizmetlerinizi tanıtmanız i&ccedil;in bir platform sağlar. Ayrıca, kurumsal web tasarımı, m&uuml;şteri sadakatini artırabilir, marka imajını g&uuml;&ccedil;lendirebilir ve daha fazla iş fırsatı yaratabilir.</p>\r\n\r\n<p>İyi bir kurumsal web tasarımı, işletmenizin hedef kitlesine en doğru şekilde hitap eder. M&uuml;şterilerinizin ihtiya&ccedil;larına uygun bir şekilde tasarlanmış bir web sitesi, m&uuml;şterilerinizin ihtiya&ccedil;larına daha iyi cevap verebilir ve onların ilgisini &ccedil;ekebilir. Ayrıca, kurumsal web tasarımı, işletmenizin hedef kitlesini tanımlamak i&ccedil;in de kullanılabilir. İyi bir kurumsal web tasarımı, işletmenizin hedef kitlesinin yaşam tarzları, ilgi alanları, beklentileri ve ihtiya&ccedil;ları hakkında fikir sahibi olmanıza yardımcı olabilir.</p>\r\n\r\n<p>Sonu&ccedil; olarak, kurumsal web tasarımı işletmenizin dijital varlığı i&ccedil;in &ouml;nemli bir fakt&ouml;rd&uuml;r. İyi tasarlanmış bir kurumsal web sitesi, m&uuml;şterilerinizin işletmeniz hakkında daha fazla bilgi edinmelerini sağlar, hizmet ve &uuml;r&uuml;nlerinizi tanıtır, marka imajınızı g&uuml;&ccedil;lendirir ve m&uuml;şterilerinizi elde tutmanıza yardımcı olur. Kurumsal web tasarımı, işletmenizin dijital d&uuml;nyadaki varlığınızı g&uuml;&ccedil;lendirmenize ve rekabet avantajı sağlamanıza yardımcı olur.</p>\r\n\r\n<p>İyi bir kurumsal web tasarımı, işletmeniz i&ccedil;in bir&ccedil;ok fayda sağlayabilir. İlk olarak, m&uuml;şterilerinize en iyi deneyimi sunar. İşletmeniz hakkında bilgi almak isteyen m&uuml;şterileriniz, web sitenizde kolayca gezinebilmeli ve ihtiya&ccedil; duydukları bilgileri hızlıca bulabilmelidirler. İkinci olarak, kurumsal web tasarımı, işletmenizin online g&ouml;r&uuml;n&uuml;rl&uuml;ğ&uuml;n&uuml; artırır. Arama motorlarında &uuml;st sıralara &ccedil;ıkmak i&ccedil;in optimize edilmiş bir web sitesi, işletmenizin potansiyel m&uuml;şterileri tarafından daha kolay bulunmasını sağlar. Son olarak, kurumsal web tasarımı, m&uuml;şterilerinizin sitenizde daha fazla zaman ge&ccedil;irmesini sağlar ve marka sadakati oluşturmanıza yardımcı olur.</p>\r\n\r\n<p>Kurumsal web tasarımı, profesyonel bir yaklaşım gerektirir. Web sitenizin tasarımı, markanızı ve işletmenizi yansıtmalı ve m&uuml;şterilerinizin ihtiya&ccedil;larına cevap verebilmelidir. Ayrıca, web sitenizin g&uuml;ncel olması ve teknolojik olarak gelişmeye a&ccedil;ık olması &ouml;nemlidir. Bu nedenle, kurumsal web tasarımı i&ccedil;in uzman bir ekip tarafından tasarlanması &ouml;nerilir.</p>\r\n', '18.03.2023', 'AE SOFTWARE'),
(3, 'Özel Yazılım Nedir ?', '   Bu blog yazısında özel yazılımın ne olduğu, nasıl geliştirildiği ve farklı sektörlerde nasıl kullanıldığı hakkında detaylı bilgi bulabilirsiniz. Özel yazılım, belirli bir işletmenin veya kuruluşun ihtiyaçlarına özel olarak tasarlanan bir yazılımdır. Yazılımın özellikleri, işletmenin iş süreçleri, hedefleri ve beklentileri doğrultusunda şekillenir. Bu yazılım türü, işletmelerin verimliliğini artırmak, maliyetleri azaltmak ve iş süreçlerini otomatikleştirmek için kullanılır. Yazılım geliştirme süreci, uzman bir ekip tarafından gerçekleştirilir ve işletmenin ihtiyaçlarına uygun özel bir çözüm sunulur. Bu yazılım türü, farklı sektörlerde kullanılabildiği gibi, işletmelerin özellikle belirli zorluklarla karşılaştığı durumlarda büyük fayda sağlayabilir. Eğer özel yazılımın avantajları ve kullanım alanları hakkında daha fazla bilgi edinmek istiyorsanız, bu yazıyı okuyabilirsiniz.\r\n\r\n\r\n\r\n', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'aepanel/upload/icerik/27406ae.jpg', 'Özel Yazılım Nedir ?', '<p>&Ouml;zel yazılım, bir işletmenin ihtiya&ccedil;larına &ouml;zel olarak tasarlanmış bir yazılım &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Bu yazılım, işletmenin belirli iş s&uuml;re&ccedil;lerini veya işlevleri daha etkili ve verimli hale getirmek i&ccedil;in &ouml;zelleştirilir. &Ouml;zel yazılımlar, genellikle mevcut piyasa &ccedil;&ouml;z&uuml;mlerinin ihtiya&ccedil;ları tam olarak karşılamadığı durumlarda kullanılır.</p>\r\n\r\n<p>&Ouml;zel yazılımın avantajlarından biri, işletmelerin ihtiya&ccedil;larını tam olarak karşılayacak &ouml;zelliklere sahip olmasıdır. Bu, işletmelerin zaman ve paradan tasarruf etmesine, iş s&uuml;re&ccedil;lerini optimize etmesine ve m&uuml;şteri memnuniyetini artırmasına yardımcı olur. &Ouml;zel yazılım ayrıca işletmelere, veri analizi, raporlama ve izleme gibi işlevleri ger&ccedil;ekleştirmelerine yardımcı olan &ouml;zellikler sağlayabilir.</p>\r\n\r\n<p>Bununla birlikte, &ouml;zel yazılımın geliştirilmesi biraz daha uzun s&uuml;rebilir ve maliyetli olabilir. Ancak, işletmelerin ihtiya&ccedil;larını tam olarak karşılamak i&ccedil;in &ouml;zel yazılımın kullanılması genellikle uzun vadede daha verimli olabilir. Ayrıca, &ouml;zel yazılım, işletmelerin rekabet avantajı elde etmelerine, daha iyi m&uuml;şteri deneyimi sağlamalarına ve daha iyi iş sonu&ccedil;ları elde etmelerine yardımcı olabilir.</p>\r\n\r\n<p>&Ouml;zetle, &ouml;zel yazılım, işletmelerin belirli ihtiya&ccedil;larına &ouml;zel olarak tasarlanmış bir yazılım &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Bu yazılım, işletmelerin iş s&uuml;re&ccedil;lerini optimize etmesine, verimliliği artırmasına ve m&uuml;şteri memnuniyetini sağlamasına yardımcı olabilir. &Ouml;zel yazılımın maliyeti biraz daha y&uuml;ksek olabilir, ancak uzun vadede işletmeler i&ccedil;in daha verimli olabilir.</p>\r\n', '18.03.2023', 'AE SOFTWARE'),
(4, 'E ticaret yazılımı nedir ?', '   Bu blog yazısı, e-ticaret yazılımının ne olduğu ve türleri hakkında kapsamlı bir inceleme sunmaktadır. E-ticaret yazılımı, online satış işlemlerini yönetmek için kullanılan bir yazılımdır. Bu yazılımın farklı türleri vardır, örneğin açık kaynaklı, hazır yazılım, özel yazılım ve daha birçok seçenek. Bu yazıda, farklı e-ticaret yazılımı türlerinin avantajları ve dezavantajları ayrıntılı olarak ele alınmaktadır.   ', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'aepanel/upload/icerik/23797ae.png', 'E ticaret yazılımı nedir ?', '<p>E-ticaret yazılımı, bir işletmenin online mağaza işletmesini y&ouml;netmesine ve m&uuml;şterilere &uuml;r&uuml;nlerini &ccedil;evrimi&ccedil;i olarak sunmasına olanak tanıyan bir yazılım &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Bu yazılım, işletmelerin &uuml;r&uuml;nleri listelemesine, &ouml;deme işlemlerini kabul etmesine, envanteri y&ouml;netmesine ve m&uuml;şteri siparişlerini işlemesine yardımcı olur.</p>\r\n\r\n<p>E-ticaret yazılımı farklı t&uuml;rlerde mevcuttur. Bazıları şunlardır:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Kendi Kendine Barındırılan E-Ticaret Yazılımı: Bu yazılım, bir işletmenin kendi sunucusunda barındırılabilir. Bu yazılımın avantajı, tam kontrol sağlaması ve &ouml;zelleştirme se&ccedil;eneklerinin bol olmasıdır.</p>\r\n	</li>\r\n	<li>\r\n	<p>Bulut Tabanlı E-Ticaret Yazılımı: Bu yazılım, bulut tabanlı bir hizmet olarak sunulur ve &uuml;&ccedil;&uuml;nc&uuml; taraf bir sağlayıcının sunucularında barındırılır. Bu, işletmelerin yazılımın bakımı ve y&uuml;kseltmeleri ile ilgilenmelerine gerek kalmadan g&uuml;ncel ve kullanıma hazır bir yazılımı kullanmalarını sağlar.</p>\r\n	</li>\r\n	<li>\r\n	<p>A&ccedil;ık Kaynak E-Ticaret Yazılımı: Bu yazılım, kodunun a&ccedil;ık kaynak olması nedeniyle işletmelerin yazılımı &ouml;zelleştirmesi i&ccedil;in geniş bir esneklik sağlar. İşletmelerin ihtiya&ccedil;larına g&ouml;re &ouml;zelleştirilebilir ve genellikle d&uuml;ş&uuml;k maliyetlidir.</p>\r\n	</li>\r\n	<li>\r\n	<p>Hazır E-Ticaret Platformları: Bu yazılım, bir&ccedil;ok pop&uuml;ler e-ticaret platformu tarafından sunulur. Platformlar, kullanımı kolay bir aray&uuml;z ve &ccedil;eşitli &ouml;zellikler sunar. Ancak, &ouml;zelleştirme se&ccedil;enekleri sınırlı olabilir ve bazı durumlarda ek maliyetler doğurabilir.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>E-ticaret yazılımı, bir işletmenin &ccedil;evrimi&ccedil;i olarak faaliyet g&ouml;stermesi i&ccedil;in vazge&ccedil;ilmez bir ara&ccedil;tır. İşletmelerin ihtiya&ccedil;larına uygun bir e-ticaret yazılımı se&ccedil;meleri ve doğru t&uuml;r&uuml; se&ccedil;meleri, işletmenin b&uuml;y&uuml;mesi ve m&uuml;şteri tabanını artırması i&ccedil;in &ouml;nemlidir.</p>\r\n', '18.03.2023', 'AE SOFTWARE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degiskenler`
--

CREATE TABLE `degiskenler` (
  `degisken_id` int(11) NOT NULL,
  `degisken_adi` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `degiskenbaslik` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `degiskentype` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `tablo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `degiskenler`
--

INSERT INTO `degiskenler` (`degisken_id`, `degisken_adi`, `degiskenbaslik`, `degiskentype`, `tablo_id`) VALUES
(67, 'baslik', 'Hizmetler Başlık', '0', 24),
(70, 'icerik', 'Hizmetler İçerik', '1', 24),
(78, 'baslik', 'Blog Başlık', '0', 26),
(79, 'İcerik', 'Blog İçerik', '1', 26),
(80, 'tarih', 'Blog Tarih', '0', 26),
(81, 'Yazar', 'Blog Yazar', '0', 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `sekilbaslik` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baslik` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icerik` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `sekilbaslik`, `description`, `keywords`, `resim`, `baslik`, `icerik`) VALUES
(1, 'Web Tasarım', '  Web tasarım, bir web sitesi için görsel arayüz ve kullanıcı deneyiminin tasarlanmasıdır. Bu, sitenin görünümünün ve işlevselliğinin nasıl olması gerektiğine karar vermek için kullanılır. Web tasarım, birçok faktörü içerebilir, ancak önemli olanlar    ', 'web tasarım, web yazılım, kurumsal web tasarım', 'aepanel/upload/icerik/27457ae.png', 'Web Tasarım', '<p>Web tasarım, bir web sitesi i&ccedil;in g&ouml;rsel aray&uuml;z ve kullanıcı deneyiminin tasarlanmasıdır. Bu, sitenin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml;n ve işlevselliğinin nasıl olması gerektiğine karar vermek i&ccedil;in kullanılır. Web tasarım, bir&ccedil;ok fakt&ouml;r&uuml; i&ccedil;erebilir, ancak &ouml;nemli olanlar arasında: Kullanıcı deneyimi: Kullanıcıların sitenizi nasıl kullandıklarını ve ne beklediklerini anlamak &ouml;nemlidir. Bu, sitenizin kullanımını kolaylaştırmak i&ccedil;in gerekli olan t&uuml;m işlevsellikleri i&ccedil;erecek şekilde tasarlanmasını sağlar. G&ouml;rsel aray&uuml;z: Sitenizin g&ouml;rsel aray&uuml;z&uuml;, kullanıcıların sitenizi nasıl algıladığını etkiler. Renkler, tipografi ve g&ouml;rsel elemanlar, sitenizin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; ve işlevselliğini belirler. Optimizasyon: Sitenizin hızlı y&uuml;klenmesi ve cep telefonları ve tabletler gibi farklı cihazlar &uuml;zerinde d&uuml;zg&uuml;n &ccedil;alışması &ouml;nemlidir. Aynı zamanda arama motorları i&ccedil;in oluşturulmuş metinler ve etiketler de sitenizin arama sonu&ccedil;larında y&uuml;kselmesini sağlar. Erişilebilirlik: Sitenizin herkese a&ccedil;ık olması &ouml;nemlidir. Bu, engelli kullanıcılar i&ccedil;in erişilebilirliği sağlamak i&ccedil;in gerekli olan t&uuml;m &ouml;zellikleri i&ccedil;erecek şekilde tasarlanmasını sağlar. Web tasarım, bir web sitesi i&ccedil;in g&ouml;rsel aray&uuml;z ve kullanıcı deneyiminin tasarlanmasıdır. Bu, sitenin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml;n ve işlevselliğinin nasıl olması gerektiğine karar vermek i&ccedil;in kullanılır. &Ouml;nemli olan fakt&ouml;rler arasında kullanıcı deneyimi, g&ouml;rsel aray&uuml;z, optimizasyon ve erişilebilirlik.</p>\r\n'),
(10, 'Özel Yazılım', '   Özel yazılım hizmetleri, işletmelerin özel ihtiyaçlarına uygun olarak tasarlanmış yazılımlardır. Bu hizmetler, işletmelerin iş süreçlerini otomatikleştirmelerine, verimliliklerini artırmalarına ve daha rekabetçi olmalarına yardımcı olabilir. Özel yazılım hizmetleri hakkında daha fazla bilgi almak için okumaya devam edin.', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'aepanel/upload/icerik/31835ae.png', 'Özel Yazılım', '<p>&Ouml;zel yazılım hizmetleri, işletmelerin &ouml;zel ihtiya&ccedil;larına &ouml;zel olarak tasarlanmış yazılımlardır. Bu hizmetler, bir işletmenin &ouml;zel ihtiya&ccedil;larını karşılamak i&ccedil;in geliştirilir ve genellikle mevcut yazılım &ccedil;&ouml;z&uuml;mlerinin yetersiz olduğu durumlarda tercih edilir. &Ouml;zel yazılım hizmetleri, işletmelerin iş s&uuml;re&ccedil;lerini otomatikleştirmelerine, verimliliklerini artırmalarına ve işletmelerinin daha rekabet&ccedil;i olmalarına yardımcı olabilir.</p>\r\n\r\n<p>&Ouml;zel yazılım hizmetleri, bir işletmenin belirli bir ihtiyacını karşılamak &uuml;zere tasarlanmıştır. Bu nedenle, mevcut yazılım &ccedil;&ouml;z&uuml;mleri bu ihtiyacı karşılamakta yetersiz kalabilir. &Ouml;zel yazılım hizmetleri, bir işletmenin ihtiyacı olan &ouml;zellikleri i&ccedil;erecek şekilde tasarlanır ve geliştirilir. Bu, işletmenin verimliliğini artırabilir ve işletmenin &ouml;zel ihtiya&ccedil;larına uygun bir &ccedil;&ouml;z&uuml;m sunar.</p>\r\n\r\n<p>&Ouml;zel yazılım hizmetleri, bir işletmenin belirli bir iş s&uuml;recini otomatikleştirmelerine yardımcı olabilir. &Ouml;rneğin, bir işletmenin envanter y&ouml;netim s&uuml;reci, m&uuml;şteri ilişkileri y&ouml;netimi veya finans y&ouml;netimi işlemleri, &ouml;zel yazılım hizmetleri ile otomatikleştirilebilir. Bu, işletmenin verimliliğini artırır ve insan hatası riskini azaltır.</p>\r\n\r\n<p>&Ouml;zel yazılım hizmetleri, işletmelere daha rekabet&ccedil;i olmaları i&ccedil;in bir fırsat sunar. Bir işletme, &ouml;zel yazılım hizmetleri kullanarak iş s&uuml;re&ccedil;lerini daha hızlı ve verimli hale getirerek, rakiplerine g&ouml;re avantaj sağlayabilir. &Ouml;zel yazılım hizmetleri, işletmelerin m&uuml;şterilerine daha iyi hizmet vermesine, m&uuml;şteri memnuniyetini artırmasına ve dolayısıyla daha fazla m&uuml;şteri kazanmasına yardımcı olabilir.</p>\r\n\r\n<p>Sonu&ccedil; olarak, &ouml;zel yazılım hizmetleri, işletmelerin &ouml;zel ihtiya&ccedil;larına uygun &ccedil;&ouml;z&uuml;mler sunar. İşletmeler, &ouml;zel yazılım hizmetleri kullanarak iş s&uuml;re&ccedil;lerini otomatikleştirerek, verimliliklerini artırabilirler. Ayrıca, &ouml;zel yazılım hizmetleri, işletmelerin daha rekabet&ccedil;i olmalarına yardımcı olur ve m&uuml;şteri memnuniyetini artırarak, işletmenin b&uuml;y&uuml;mesine katkı sağlar.</p>\r\n'),
(11, 'Kurumsal Web Tasarım', '   Kurumsal web tasarımı hizmeti, işletmelerin dijital varlıklarını oluşturmasına, hedef kitlelerine ulaşmasına, marka bilinirliğini artırmasına ve daha fazla müşteri kazanmasına yardımcı olan bir hizmettir. İyi tasarlanmış bir web sitesi, müşterilerin güvenini kazanır, işletmelerin rekabet gücünü artırır ve müşteri sadakatini artırabilir. Detayları öğrenin!', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'aepanel/upload/icerik/26446ae.jpg', 'Kurumsal Web Tasarım', '<p>Kurumsal web tasarım hizmeti, bir işletmenin profesyonel bir &ccedil;evrimi&ccedil;i varlık oluşturmasına yardımcı olan bir hizmettir. Kurumsal web tasarımı, işletmelerin hedef kitlesine ulaşmasına, marka bilinirliğini artırmasına ve daha fazla m&uuml;şteri kazanmasına yardımcı olur. Bu yazıda, kurumsal web tasarım hizmetinin detaylarını ele alacağız. Bir işletmenin web sitesi, işletmenin dijital kimliğinin bir par&ccedil;asıdır. İşletmenin web sitesi, potansiyel m&uuml;şterilerle etkileşim kurabileceği, hizmetlerini tanıtabileceği ve markasını g&uuml;&ccedil;lendirebileceği bir platformdur. İyi tasarlanmış bir kurumsal web sitesi, m&uuml;şterilerin g&uuml;venini kazanır ve işletmeyi daha profesyonel bir şekilde temsil eder. Kurumsal web tasarımı, işletmelerin hedef kitlesine ulaşmasına yardımcı olur. İyi tasarlanmış bir web sitesi, potansiyel m&uuml;şterilerin dikkatini &ccedil;ekebilir ve onları işletmenin m&uuml;şterisi olmaya ikna edebilir. Web sitesi tasarımı, işletmenin hedef kitlesi ve sekt&ouml;r&uuml;ne g&ouml;re &ouml;zelleştirilir ve bu da web sitesinin hedef kitleye daha &ccedil;ekici gelmesini sağlar. Kurumsal web tasarımı, işletmelerin marka bilinirliğini artırır. İyi tasarlanmış bir web sitesi, işletmenin markasını g&uuml;&ccedil;lendirebilir ve potansiyel m&uuml;şterilerin aklında kalıcı bir etki bırakabilir. Web sitesi, işletmenin renklerini, logosunu ve mesajını yansıtmalıdır. Bu, işletmenin marka bilinirliğini artırarak, daha fazla m&uuml;şteri &ccedil;ekmesine yardımcı olur. Kurumsal web tasarım hizmeti, işletmelerin daha fazla m&uuml;şteri kazanmasına yardımcı olur. İyi tasarlanmış bir web sitesi, potansiyel m&uuml;şterilerin işletme hakkında bilgi edinmesine ve hizmetlerini satın almalarına yardımcı olur. Web sitesi, işletmenin hizmetlerinin detaylarını a&ccedil;ık&ccedil;a sunmalı ve potansiyel m&uuml;şterilerin site &uuml;zerinden kolayca sipariş verebilmelerini sağlamalıdır. Ayrıca, bir işletmenin web sitesi, m&uuml;şteri sadakatini artırmak i&ccedil;in de kullanılabilir. M&uuml;şteriler, işletmenin web sitesinden kolayca iletişim kurabilir, m&uuml;şteri hizmetleriyle konuşabilir ve geri bildirimde bulunabilirler.</p>\r\n\r\n<p>Kurumsal web tasarımı hizmeti, işletmenin rekabet g&uuml;c&uuml;n&uuml; artırır. G&uuml;n&uuml;m&uuml;zde, hemen hemen t&uuml;m işletmelerin bir web sitesi vardır. İyi tasarlanmış bir web sitesi, işletmelerin rekabet ettiği diğer işletmelere g&ouml;re avantaj sağlar. Bir işletmenin web sitesi, potansiyel m&uuml;şterilerin işletme hakkında daha fazla bilgi edinmesine, hizmetleri hakkında daha fazla bilgi edinmesine ve sipariş vermesine olanak sağlar.</p>\r\n\r\n<p>Sonu&ccedil; olarak, kurumsal web tasarım hizmeti, bir işletmenin dijital varlığını oluşturmasına, hedef kitlesine ulaşmasına, marka bilinirliğini artırmasına ve daha fazla m&uuml;şteri kazanmasına yardımcı olan &ouml;nemli bir hizmettir. İşletmeler, iyi tasarlanmış bir web sitesi ile m&uuml;şteri sadakatini artırabilir, rekabet g&uuml;c&uuml;n&uuml; artırabilir ve işlerini daha profesyonel bir şekilde temsil edebilirler.</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menukategori`
--

CREATE TABLE `menukategori` (
  `menukat_id` int(11) NOT NULL,
  `kat_adi` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_adi` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `menukategori`
--

INSERT INTO `menukategori` (`menukat_id`, `kat_adi`, `kategori_adi`) VALUES
(1, '', 'Header'),
(2, '', 'Footer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `menu_id` int(15) NOT NULL,
  `menu_adi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `menu_icon` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `menu_sira` int(25) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menukat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`menu_id`, `menu_adi`, `menu_icon`, `menu_link`, `menu_sira`, `parent_id`, `menukat_id`) VALUES
(32, 'Anasayfa', 'fas fa-home', '', 1, 0, 1),
(33, 'Hakkımızda', 'fa fa-user', 'sayfa-hakkimizda-124', 2, 0, 1),
(34, 'Hizmetler', 'fa fa-blog', 'hizmet', 3, 0, 1),
(35, 'Blog', 'fa fa-blog', 'blog', 4, 0, 1),
(36, 'İletişim', 'fa fa-phone', 'sayfa-iletisim-129', 5, 0, 1),
(37, 'Hakkımızda', '', 'sayfa-hakkimizda-124', 3, 0, 2),
(38, 'İletişim', '', 'sayfa-iletisim-129', 4, 0, 2),
(39, 'Hizmetler', '', 'hizmet', 1, 0, 2),
(40, 'Blog', '', 'blog', 2, 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_kuladi` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_posta` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesaj_konu` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_icerik` text COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_durum` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(20) NOT NULL,
  `sayfa_adi` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sayfa_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sayfa_baslik` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `sayfa_icerik` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_adi`, `description`, `keywords`, `sayfa_url`, `sayfa_baslik`, `sayfa_icerik`) VALUES
(124, 'Hakkımızda', 'AE Software, özel web yazılımları ve özel yazılım çözümleri konusunda uzmanlaşmış bir ekip tarafından kurulan bir yazılım firmasıdır. Gelişmiş kurumsal web yazılımları ve özel yazılım çözümleri sunan AE Software, müşterilerinin ihtiyaçlarını anlamak ve en uygun çözümleri sunmak için birlikte çalışır. Deneyimli ve başarılı ekibi ile müşterilerine kaliteli yazılım çözümleri sunan AE Software, işlerini büyütmek isteyenlere özel çözümler sunar.', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'sayfa-hakkimizda-124', 'Hakkımızda', '<p>AE Software, &ouml;zel web yazılımları ve &ouml;zel yazılım &ccedil;&ouml;z&uuml;mleri konusunda uzmanlaşmış bir yazılım ekibi olarak faaliyet g&ouml;stermektedir. Gen&ccedil; ve dinamik bir ekip tarafından kurulmuş olan şirket, m&uuml;şterilerine gelişmiş kurumsal web yazılımları ve &ouml;zel yazılım &ccedil;&ouml;z&uuml;mleri sunmaktadır.</p>\r\n\r\n<p>AE Software ekibi, teknolojik gelişmelere her zaman a&ccedil;ık olan, s&uuml;rekli &ouml;ğrenmeye istekli ve m&uuml;şterilerine en iyi hizmeti sunmak i&ccedil;in &ccedil;aba g&ouml;steren uzmanlardan oluşmaktadır. Ekip, m&uuml;şterilerinin ihtiya&ccedil;larını anlamak i&ccedil;in &ouml;ncelikle onlarla yakından &ccedil;alışır ve m&uuml;şterilerinin beklentilerini karşılayacak &ouml;zel yazılım &ccedil;&ouml;z&uuml;mleri sunar.</p>\r\n\r\n<p>AE Software, m&uuml;şterilerine gelişmiş admin panelli kurumsal web yazılımları sunar. Bu yazılımlar, m&uuml;şterilerin işlerini daha verimli hale getirmelerine ve işlerini daha iyi y&ouml;netmelerine yardımcı olur. Ekip, m&uuml;şterilerinin ihtiya&ccedil;larını anlamak ve en uygun &ccedil;&ouml;z&uuml;m&uuml; sunmak i&ccedil;in s&uuml;rekli olarak kendini yenilemektedir.</p>\r\n\r\n<p>AE Software, bir ekip olarak &ccedil;alışır ve m&uuml;şterilerine kaliteli yazılım &ccedil;&ouml;z&uuml;mleri sunmak i&ccedil;in birlikte &ccedil;alışır. Ekip, m&uuml;şterilerinin işlerini b&uuml;y&uuml;tmelerine yardımcı olmak i&ccedil;in &ccedil;alışır ve m&uuml;şterilerine uygun fiyatlarla kaliteli yazılım &ccedil;&ouml;z&uuml;mleri sunar. &Ouml;zel web yazılımları ve &ouml;zel yazılım &ccedil;&ouml;z&uuml;mleri konusunda deneyimli ve başarılı olan AE Software ekibi, m&uuml;şterilerine ihtiya&ccedil;larına g&ouml;re &ouml;zel &ccedil;&ouml;z&uuml;mler sunar.</p>\r\n'),
(129, 'İletişim', '      AE Software, özel web yazılımları ve özel yazılım çözümleri konusunda uzmanlaşmış bir ekip tarafından kurulan bir yazılım firmasıdır. Gelişmiş kurumsal web yazılımları ve özel yazılım çözümleri sunan AE Software, müşterilerinin ihtiyaçlarını anlamak ve en uygun çözümleri sunmak için birlikte çalışır. Deneyimli ve başarılı ekibi ile müşterilerine kaliteli yazılım çözümleri sunan AE Software, işlerini büyütmek isteyenlere özel çözümler sunar.    ', 'AE Software, web yazılım, özel yazılım, kurumsal web yazılımı, özel yazılım çözümleri, admin paneli, müşteri ihtiyaçları, uygun fiyatlı yazılım çözümleri, deneyimli yazılım ekibi', 'sayfa-iletisim-129', 'İletişime Geç', '<p>İletişim</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tablolar`
--

CREATE TABLE `tablolar` (
  `tablo_id` int(11) NOT NULL,
  `tablo_baslik` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tablo_adi` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tablo_sef` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tablo_sablon` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `tablolar`
--

INSERT INTO `tablolar` (`tablo_id`, `tablo_baslik`, `tablo_adi`, `keywords`, `description`, `tablo_sef`, `tablo_sablon`) VALUES
(24, 'Hizmetler', 'hizmetler', 'web tasarım, web yazılım, kurumsal web tasarım', ' AE Software, özel web yazılımları ve özel yazılım çözümleri konusunda uzmanlaşmış bir ekip tarafından kurulan bir yazılım firmasıdır. Gelişmiş kurumsal web yazılımları ve özel yazılım çözümleri sunan AE Software, müşterilerinin ihtiyaçlarını anlamak ve en uygun çözümleri sunmak için birlikte çalışır. Deneyimli ve başarılı ekibi ile müşterilerine kaliteli yazılım çözümleri sunan AE Software, işlerini büyütmek isteyenlere özel çözümler sunar.', 'hizmet', '1'),
(26, 'Bloglar', 'blog', 'web tasarım, web yazılım, kurumsal web tasarım', '    AE Software, özel web yazılımları ve özel yazılım çözümleri konusunda uzmanlaşmış bir ekip tarafından kurulan bir yazılım firmasıdır. Gelişmiş kurumsal web yazılımları ve özel yazılım çözümleri sunan AE Software, müşterilerinin ihtiyaçlarını anlamak ve en uygun çözümleri sunmak için birlikte çalışır. Deneyimli ve başarılı ekibi ile müşterilerine kaliteli yazılım çözümleri sunan AE Software, işlerini büyütmek isteyenlere özel çözümler sunar.', 'blog', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uye_resim` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uye_adi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uye_kuladi` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `uye_password` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `uye_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uye_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uye_linkedin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uye_instagram` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uye_facebook` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uye_twitter` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uye_youtube` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uye_yetki` int(11) NOT NULL DEFAULT '0',
  `admin_yetki` int(11) NOT NULL DEFAULT '0',
  `uye_durum` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_tarih`, `uye_ip`, `uye_resim`, `uye_adi`, `uye_kuladi`, `uye_password`, `uye_mail`, `uye_tel`, `uye_linkedin`, `uye_instagram`, `uye_facebook`, `uye_twitter`, `uye_youtube`, `uye_yetki`, `admin_yetki`, `uye_durum`) VALUES
(1, '2022-10-20 10:09:10', '', '', 'Abdullah Ekşi', 'abdullah34', '6f24cfc67b3249ffcd94973167329d1f', 'abdullah.eksi14@gmail.com', '5343970453', '', 'https://www.instagram.com', 'https://www.facebook.com', '', '', 10, 6, '1'),
(18, '2023-02-19 19:06:20', '', '', 'Admin', 'admin', '6f24cfc67b3249ffcd94973167329d1f', 'admin@admin.com', '', '', '', '', '', '', 10, 4, '1'),
(19, '2023-02-27 06:47:51', '172.70.51.152', '', 'Test hesap', 'Deneme', 'e10adc3949ba59abbe56e057f20f883e', 'zetatr34@gmail.com', '', '', '', '', '', '', 10, 2, '1'),
(20, '2023-03-01 08:30:26', '172.69.182.209', '', 'Admin', 'admin2', '6f24cfc67b3249ffcd94973167329d1f', 'D', '', '', '', '', '', '', 10, 4, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

CREATE TABLE `ziyaretciler` (
  `ziyaretci_id` int(11) UNSIGNED NOT NULL,
  `ziyaretci_ip` varchar(50) NOT NULL,
  `ziyaretci_useragent` text NOT NULL,
  `ziyaretci_referer` text,
  `ziyaretci_browser` text NOT NULL,
  `ziyaretci_browser_version` text NOT NULL,
  `ziyaretci_cihaz_bilgisi` text NOT NULL,
  `ziyaretci_cihaz_turu` text NOT NULL,
  `ziyaret_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ziyaretciler`
--

INSERT INTO `ziyaretciler` (`ziyaretci_id`, `ziyaretci_ip`, `ziyaretci_useragent`, `ziyaretci_referer`, `ziyaretci_browser`, `ziyaretci_browser_version`, `ziyaretci_cihaz_bilgisi`, `ziyaretci_cihaz_turu`, `ziyaret_tarihi`) VALUES
(8531, '162.158.239.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', 'http://abdullaheksi.com.tr/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-26 16:38:13'),
(8532, '162.158.239.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', 'https://abdullaheksi.com.tr/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-26 16:38:14'),
(8533, '172.69.65.20', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-27 01:00:25'),
(8534, '162.158.174.44', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-27 01:00:25'),
(8535, '172.71.182.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '5.0', 'Macintosh; Intel Mac OS X 10_10_1', 'Bilgisayar', '2023-03-27 06:31:21'),
(8536, '172.71.182.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '5.0', 'Macintosh; Intel Mac OS X 10_10_1', 'Bilgisayar', '2023-03-27 06:31:21'),
(8537, '162.158.190.65', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30', 'https://abdullaheksi.com.tr', 'AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30', '5.0', 'Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H', 'Telefon', '2023-03-27 07:50:02'),
(8538, '172.70.189.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-27 08:27:55'),
(8539, '172.70.189.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-27 08:27:56'),
(8540, '162.158.251.195', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:46:11'),
(8541, '162.158.251.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:46:40'),
(8542, '162.158.251.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:46:47'),
(8543, '162.158.251.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:46:48'),
(8544, '162.158.251.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:46:51'),
(8545, '162.158.251.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:47:17'),
(8546, '162.158.251.195', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:49:15'),
(8547, '162.158.251.22', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:49:17'),
(8548, '162.158.251.22', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:49:19'),
(8549, '162.158.251.22', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:49:19'),
(8550, '162.158.251.22', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:49:20'),
(8551, '162.158.251.195', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:50:04'),
(8552, '162.158.251.195', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:51:04'),
(8553, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:51:04'),
(8554, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:51:05'),
(8555, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:51:13'),
(8556, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:51:13'),
(8557, '172.69.182.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:55:58'),
(8558, '172.69.182.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 13:55:58'),
(8559, '172.69.182.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 14:02:08'),
(8560, '172.69.182.162', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 14:02:08'),
(8561, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 16:14:19'),
(8562, '162.158.251.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-27 16:14:19'),
(8563, '162.158.78.131', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-27 17:41:40'),
(8564, '162.158.79.191', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.64 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-27 17:41:40'),
(8565, '172.71.150.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', 'https://abdullaheksi.com.tr', 'Gecko/20100101 Firefox/109.0', '5.0', 'Windows NT 10.0; Win64; x64; rv:109.0', 'Bilgisayar', '2023-03-27 23:40:23'),
(8566, '172.71.150.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', 'https://abdullaheksi.com.tr', 'Gecko/20100101 Firefox/109.0', '5.0', 'Windows NT 10.0; Win64; x64; rv:109.0', 'Bilgisayar', '2023-03-27 23:40:24'),
(8567, '162.158.238.221', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-27 23:42:21'),
(8568, '162.158.239.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-27 23:42:21'),
(8569, '172.69.182.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-28 01:38:56'),
(8570, '172.69.182.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-28 01:38:56'),
(8571, '172.69.182.163', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-28 01:39:19'),
(8572, '162.158.251.117', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-28 06:24:52'),
(8573, '162.158.251.117', 'Mozilla/5.0 (Linux; Android 12; TECNO CH7n) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'https://www.google.com/', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '5.0', 'Linux; Android 12; TECNO CH7n', 'Telefon', '2023-03-28 06:24:52'),
(8574, '172.70.38.124', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-28 09:49:24'),
(8575, '172.70.134.187', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-28 09:49:24'),
(8576, '172.70.38.109', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-28 09:49:25'),
(8577, '172.70.134.187', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.110 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '5.0', 'Linux; Android 6.0.1; Nexus 5X Build/MMB29P', 'Telefon', '2023-03-28 09:49:25'),
(8578, '172.69.182.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-28 10:30:29'),
(8579, '172.69.182.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', 'https://abdullaheksi.com.tr', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-28 10:30:29'),
(8580, '172.69.182.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', 'https://abdullaheksi.com.tr/uyari/0', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-28 10:30:34'),
(8581, '172.69.182.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', 'https://abdullaheksi.com.tr/uyari/0', 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0', '5.0', 'Windows NT 10.0; Win64; x64', 'Bilgisayar', '2023-03-28 10:30:34');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banned_ips`
--
ALTER TABLE `banned_ips`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bilgi`
--
ALTER TABLE `bilgi`
  ADD PRIMARY KEY (`bilgi_id`);

--
-- Tablo için indeksler `bilgikategori`
--
ALTER TABLE `bilgikategori`
  ADD PRIMARY KEY (`bilgikategori_id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `degiskenler`
--
ALTER TABLE `degiskenler`
  ADD PRIMARY KEY (`degisken_id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menukategori`
--
ALTER TABLE `menukategori`
  ADD PRIMARY KEY (`menukat_id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD UNIQUE KEY `sayfa_id` (`sayfa_id`);

--
-- Tablo için indeksler `tablolar`
--
ALTER TABLE `tablolar`
  ADD PRIMARY KEY (`tablo_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Tablo için indeksler `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  ADD PRIMARY KEY (`ziyaretci_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `banned_ips`
--
ALTER TABLE `banned_ips`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `bilgi`
--
ALTER TABLE `bilgi`
  MODIFY `bilgi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `bilgikategori`
--
ALTER TABLE `bilgikategori`
  MODIFY `bilgikategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `degiskenler`
--
ALTER TABLE `degiskenler`
  MODIFY `degisken_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `menukategori`
--
ALTER TABLE `menukategori`
  MODIFY `menukat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `menu_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tablolar`
--
ALTER TABLE `tablolar`
  MODIFY `tablo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  MODIFY `ziyaretci_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8582;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
