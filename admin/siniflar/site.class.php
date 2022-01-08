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
                
                case 'application/pdf':$donder='Resim Dosyası (PDF)';break;
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
