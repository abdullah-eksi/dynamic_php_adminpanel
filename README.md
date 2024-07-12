# Dynamic Php Admin Panel Corporate site


## What does this project do?
This project is a corporate website admin panel that makes the work of the developer and the customer easier. It is an advanced admin panel with multiple features.

## File structure


```
project/
├── index.php
├── sayfadetay.php
├── icerikdetay.php
├── icerikliste.php
├── icerikdetay/
│   ├── 1.php
│   ├── 2.php
│   └── 3.php
├── icerikliste/
│   ├── 1.php
│   ├── 2.php
│   └── 3.php
├── page/
│   ├── 1.php // Hakkında sayfası
│   ├── 2.php // İletişim sayfası
│   └── 3.php // Varsayılan sayfa
├── inc/
│   ├── head.php // Head kodları
│   ├── header.php // Header kodları
│   └── footer.php // Footer kodları
└── aepanel/
    └── ae/
        ├── verifunc.php // Veritabanı fonksiyonları
        ├── aefunc.php // Diğer fonksiyonlar
        ├── connect.php // Veritabanı bağlantısı
        ├── define.php // Tanımlar
        └── online.php // İstatistikler
```


## How To Run

First, place your design files (assets) in the root directory. Then add CSS and JavaScript files to your project by editing the inc/head.php file. For the header section, add the header part of your design to the header.php file, and for the footer section, add the footer part to the footer.php file. You can use the ready-made functions in the aepanel/ae/verifunc.php file for operations such as data extraction, deletion, editing and removal. The necessary configuration and connection function files are located under the aepanel/ae directory. You can access the web panel by typing the /aepanel path into your browser, and from here you can add or delete tables to the database. You can easily perform many operations with this method.
