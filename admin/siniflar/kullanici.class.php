 <?php
class Kullanici extends Database 
{
    function __construct(){
        parent::__construct();
    }
    public function ekle($data){
        $kullanici=$this->temizle($data['kullanici']);
        $parola=md5($this->temizle($data['parola']));
        $eposta=$this->temizle($data['eposta']);
        $yetki=$this->temizle($data['yetki']);
        $ekle=$this->prepare("INSERT INTO kullanicilar (kullanici_adi, kullanici_sifre, kullanici_mail, kullanici_yetki) 
        VALUES (:ka, :ks, :km, :ky)");
        $ekle->execute(array(
            'ka'=>$kullanici,
            'ks'=>$parola,
            'km'=>$eposta,
            'ky'=>$yetki
        ));
        return $this->lastInsertId();
    }
    private function temizle($data){
        return strip_tags(trim($data));
    }
}
