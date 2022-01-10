s<?php 
$id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL; 
if($id==NULL){
   
    echo '<script type="text/javascript">alert(\'Dosya indirdiğinize emin misiniz?\');</script>';
}else{
    require_once 'admin/siniflar/veritabani.class.php';
    require_once 'admin/siniflar/site.class.php';
    $site= new Site;
    $dosya=$site->dosya($id);
       
$klasör_yolu= $dosya->dosya_baslik;//veritabanından değer gelecek
$dosya_ismi=$dosya->dosya_adi;//veritabanından değer gelecek
$indirme_yolu='C:/xampp/htdocs/Download/admin/'.$klasör_yolu.'/'.$dosya_ismi;
header("Expires:0");
header("Last-Modified: ". gmdate("d.m.Y H:i:s")."GMT");
header("Cache-Control: no-store, no-cache,must-revalidate");
header("Cache-Control: post-chech=0,pre-chech=0",false);
header("Pragma:no-cache");
header("Content-Type: ".$dosya->dosya_mime);//veritabanından değer gelecek
header("Content-Lenght: ".$dosya->dosya_boyut);//veritabanından değer gelecek
header("Content-Disposition: attachment; filename=". basename($dosya_ismi));

$site->guncelle('dosyalar','dosya_indirilme =dosya_indirilme + 1',"dosya_id='".$id."'");
readfile($indirme_yolu);

exit;


}