<?php
/*
chmod("deneme.txt",0777);*/
/*dosya sistem fonksiyonları


touch-Dosya oluşturur
unlink-Dosya siler
rename-Dosyayı taşır ve yeniden adlandırır
copy-dosyayı kopyalar

*/

if ($_POST) {

 $dosya=$_POST["dosya"];
 $oluştur=touch($dosya);
 if ($oluştur) {
     echo '<font color="green">Tebrikler Dosya Başarıyla Oluşturuldu!</font>';
    
 }else {
     echo '<font color="red">Dosya Oluşturulma Başarısız.</font>';
 }
}else {
    echo '<form action="" method="post"> 
    <input type="text" name="dosya"/>
    <input type="submit" value="oluştur"/>  
     </form>   ';
    
}



?>