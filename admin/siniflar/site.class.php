<?php

class Site extends Database {

    function __construct(){
parent::__construct();
    }

    public function dosyalar($baslangıc, $limit){

        $sorgu=$this->prepare("SELECT * FROM dosyalar ORDER BY dosya_eklenme LIMIT $baslangıc, $limit ");
        $sorgu->execute();
return $sorgu->fetchAll(PDO::FETCH_OBJ);
    }
    
        public function dosya($id){
            $sorgu=$this->prepare("SELECT * FROM dosyalar WHERE dosya_id = '$id' ");
            $sorgu->execute();
    return $sorgu->fetch(PDO::FETCH_OBJ);
        }
        public function guncelle($tablo, $deger, $kosul){
$sorgu =$this->prepare("UPDATE $tablo SET $deger WHERE $kosul");
$sorgu->execute();
return true;
        }
        public function sil($tablo, $sutun, $kosul){
           
            $dosya=$this->dosya($kosul);
            $sorgu =$this->exec("DELETE FROM  $tablo WHERE $sutun='$kosul'");
       
            
        if($sorgu>0){
         
         
            $silme=  unlink('C:/xammp/htdocs/Download/admin/'.$dosya->dosya_baslik.'/'.$dosya->dosya_adi);
               if($silme){echo "başarılı";}else{header('Location:dosyalar.php');echo "olmadı";}
           
            
        }
         return $sorgu;
                    }

        public function dosyaBoyutu($byte){
            if($byte<1024){
                $byte="$byte BYTE";
            }elseif($byte<(1024*1024)){
                $byte= round($byte/1024,2)." KB";
            }elseif($byte<(1024*1024*1024)){
                $byte= round($byte/1024*1024,2)." MB";
            }else{
                $byte= round($byte/1024*1024*1024,2)." GB";
            }
            return $byte;
        }
        public function tarih($tarih){
            $tarih=strtotime($tarih);
            return date("d.m.Y H:i:s",$tarih);
        }
        public function dosyaTuru($turu){
            switch($turu){
                
                case 'application/pdf':$donder='Belge Dosyası (PDF)';break;
                case 'application/png':
                case 'image/png':
                    $donder='Resim Dosyası (PNG)';break;
                case 'application/zip':
                case 'application/x-zip-compressed':    
                    $donder=' Sıkıştırılmış  ZIP Dosyası (ZIP)';break;


                    default:
                    $donder= 'Bilinmeyen Dosya';
                    break;
            }
            return $donder;
        }
        public function uyeAdi($id){
            $sorgu=$this->prepare("SELECT kullanici_adi FROM kullanicilar WHERE kullanici_id = '$id' ");
            $sorgu->execute();
    return $sorgu->fetch(PDO::FETCH_OBJ);
        }
}
