<?php
class Upload extends Database{
    
    function __construct()
    {
        parent::__construct();
        
    }
    public function ekle($baslik,$dosya,$boyut,$yukleyen){


$sorgu = $this->prepare("INSERT INTO dosyalar (dosya_baslik,dosya_adi,dosya_boyut,dosya_yukleyen)
VALUES (:baslik, :adi, :boyut, :yukleyen)");
$sorgu->execute(array(
    'baslik'=>$baslik,
    'adi'=>$dosya,
    'boyut'=>$boyut,
    'yukleyen'=>$yukleyen
));
return $this->lastInsertId() ;
    }

    public function yukle($data){
        if($data['dosya']['size'] >0  && $data['dosya']['error'] == 0){
           
            $tmp= $data['dosya']['tmp_name'];
            $baslik=$_POST['baslik'];
                            if(!is_dir($baslik)) mkdir($baslik);
            $dosya_adi=$data['dosya']['name'];
            if(move_uploaded_file($tmp, $baslik.'/'.$dosya_adi)){
                echo 'taşındı';
            }else{
                echo 'taşınamadı';
            }

        }

    }
}