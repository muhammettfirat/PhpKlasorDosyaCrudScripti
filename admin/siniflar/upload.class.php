<?php
class Upload extends Database{
    
    function __construct()
    {
        parent::__construct();
        
    }
    public function ekle($baslik,$dosya,$boyut,$yukleyen,$mime){


$sorgu = $this->prepare("INSERT INTO dosyalar (dosya_baslik,dosya_adi,dosya_boyut,dosya_yukleyen,dosya_mime)
VALUES (:baslik, :adi, :boyut, :yukleyen,:mime)");
$sorgu->execute(array(
    'baslik'=>$baslik,
    'adi'=>$dosya,
    'boyut'=>$boyut,
    'yukleyen'=>$yukleyen,
    'mime'=>$mime
));
return $this->lastInsertId() ;
    }

    public function yukle($data){
        if($data['dosya']['size'] >0  && $data['dosya']['error'] == 0){
            $tmp= $data['dosya']['tmp_name'];
            $baslik=$_POST['baslik'];
            if(!is_dir($baslik)) mkdir($baslik);
            $dosya_adi=$data['dosya']['name'];

            if(move_uploaded_file($tmp,$baslik.'/'.$dosya_adi)){
                header('Location:yukle.php?islem=true');
                exit;
            }else{
                header('Location:yukle.php?islem=false');
                exit;
            }

        }

    }
}