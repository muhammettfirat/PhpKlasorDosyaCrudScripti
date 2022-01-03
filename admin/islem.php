<?php
require_once 'config.php';
$islem= isset($_GET['islem']) ? $_GET['islem']:null;

    switch ($islem) {
        case 'kullanici_ekle':
        if ($_POST) {
        require_once 'siniflar/kullanici.class.php';
        $kullanici =new Kullanici;      
        if($kullanici->ekle($_POST)>0){
        header('Location:kullanici_ekle.php?islem=true');
        exit;
        }else{
        header('Location:kullanici_ekle.php?islem=false');
        exit;
        }
        }else {
        die('Post edilmedi');
        }
        break;
            case 'login':
            if ($_POST) {
            $login = new Login;
            $kontrol= $login->girisYap($_POST['kullanici'], $_POST['parola']);
            if ($kontrol->say == 1) {
            //login başarılı, oturum işlemleri... 
            $_SESSION['login']='ok';
            $_SESSION['id'] = $kontrol->kullanici_id;
            $_SESSION['kullanici'] = $kontrol->kullanici_adi;
            $_SESSION['yetki'] = $kontrol->kullanici_yetki;
            header('Location:index.php');
            exit;
            }else {
            //login başarısız, yönlendirme işlemleri...
            $login->cikisYap();
            }
            }else {
            die('Post edilmedi');
            }
            break;
            case 'yukle':
                if ($_POST) {
                require_once 'siniflar/upload.class.php'; 
                $upload=new Upload;

                $islem= $upload->ekle($_POST['baslik'],$_FILES['dosya']['name'],$_FILES['dosya']['size'],$_SESSION['id']);
               if($islem>0){
                   $yukle=$upload->yukle($_FILES);
                  
               }else{
                header('Location:yukle.php?islem=false2');
                exit;
               }
                }else{
                die('Post edilmedi');
                }
                break;
                //folder
                case 'folder':
                    if(isset($_POST['upload']))
                    {
                        require_once 'siniflar/upload.class.php'; 
                        $upload=new Upload;
                        
                        if($_POST['baslik'] != "")
                        {
                            $baslik=$_POST['baslik'];
                            if(!is_dir($baslik)) mkdir($baslik);
                            foreach($_FILES['dosya']['name'] as $i => $name)
                        {
                                if(strlen($_FILES['dosya']['name'][$i]) > 1)
                                {  move_uploaded_file($_FILES['dosya']['tmp_name'][$i],$baslik."/".$name);
                                    $islem= $upload->ekle($_POST['baslik'],$_FILES['dosya']['name'][$i],$_FILES['dosya']['size'][$i],$_SESSION['id']);
                                   
                                }
                            }
                            header('Location:yukle.php?islem=true');
                exit;
                        }
                        else
                        header('Location:yukle.php?islem=false');
                        exit;
                    }
                    break;
default: die('herhangi bir işlem yapılmadı'); break;
} 