<?php 
header('Content-Type:text/html;charset=utf8');
require_once 'siniflar/veritabani.class.php';
require_once 'siniflar/site.class.php';
require_once 'siniflar/login.class.php';
$site =New Site;
Login::oturum();