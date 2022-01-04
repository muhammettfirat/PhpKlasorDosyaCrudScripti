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
    
        
    
}
