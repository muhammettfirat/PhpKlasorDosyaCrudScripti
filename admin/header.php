<?php 
    require_once 'config.php';
   
    if (Login::girisKontrol() !=true){
        header('Location:login.php?x');
        exit;
    }
    ?>
<!doctype html>

<html>

    <head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<title>Admin Paneli - tolgahanbasturk.com</title>
    </head>

    <body>
<div id="cerceve">

<div id="ust_kisim">Admin Paneli - tolgahanbasturk.com</div>

<div id="icerik">

<div id="sol_kisim">
<ul class="menu">
<li><a href="index.php">Ana Sayfa</a></li>
<li><a href="ayarlar.php">Ayarlar</a></li>
<li><a href="kullanici_ekle.php">Kullanıcı Ekle</a></li>
<li><a href="yukle.php">Dosya Yükle</a></li>
<li><a href="dosyalar.php">Yüklenen Dosyalar</a></li>
<li><a href="cikis_yap.php">Çıkış Yap</a></li>
</ul>
</div>

<div id="sag_kisim"> 