# Dynamic Php Admin Panel Corporate site


## What does this project do?
This project is a corporate website admin panel that makes the work of the developer and the customer easier. It is an advanced admin panel with multiple features.

## File structure
project<br>
├── index.php <br>
├── sayfadetay.php <br>

├── icerikdetay/ <br> // content detail pages
│   ├── 1.php 
│   ├── 2.php 
│   └── 3.php 
├── icerikliste/ <br> // content list pages
│   ├── 1.php 
│   ├── 2.php 
│   └── 3.php 
├── page/ <br> // page detail pages
│   ├── 1.php //about page
│   ├── 2.php  //contact page
│   └── 3.php //default page
├── inc/ <br>
│   ├── head.php // head code <br>
│   ├── header.php // header code <br>
│   └── footer.php // footer code <br>
└── aepanel/ // admin panel files <br>
    └── ae/ <br>
        ├── verifunc.php <br>
        ├── config.php <br>
        ├── baglanti.php <br>
        ├── fonksiyonlar.php <br>
        └── ... <br>

## How To Run

First, place your design files (assets) in the root directory. Then add CSS and JavaScript files to your project by editing the inc/head.php file. For the header section, add the header part of your design to the header.php file, and for the footer section, add the footer part to the footer.php file. You can use the ready-made functions in the aepanel/ae/verifunc.php file for operations such as data extraction, deletion, editing and removal. The necessary configuration and connection function files are located under the aepanel/ae directory. You can access the web panel by typing the /aepanel path into your browser, and from here you can add or delete tables to the database. You can easily perform many operations with this method.
