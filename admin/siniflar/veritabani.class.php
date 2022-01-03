 <?php
class  Database  extends PDO {
    function __construct(){
        try {
            parent::__construct('mysql:host=localhost:3307;dbname=download', '', '');
        } catch (PDOException $hata) {
          die($hata->getMessage());
        }
       
    }
}