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

                $islem= $upload->ekle($_POST['baslik'],$_FILES['dosya']['name'],$_FILES['dosya']['size'],$_SESSION['id'],$_FILES['dosya']['type']);
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
                                    $islem= $upload->ekle($_POST['baslik'],$_FILES['dosya']['name'][$i],$_FILES['dosya']['size'][$i],$_SESSION['id'],$_FILES['dosya']['type'][$i]);
                                   
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


                    case 'dosyaGuncelle':
                        $dosya=isset($_GET['dosya']) ? $_GET['dosya']:NULL; 
                        if($dosya==NULL){
                            header('Location:dosyalar.php');
                            exit;
                        }else{
                    $dosyaGuncelle=$site->guncelle('dosyalar',"dosya_baslik='".$_POST['baslik']."'","dosya_id='".$dosya."'");
                    $dosyaGuncel=$site->guncelle('dosyalar',"dosya_adi='".$_POST['adi']."'","dosya_id='".$dosya."'");
            if($dosyaGuncelle){
                header('Location:incele.php?dosya='.$dosya);
                exit;
                              
                            }else{
                                header('Location:dosyalar.php');
                                exit;
                        } 
                    }
                        break;


                case 'sil':             
                    $dosya=isset($_GET['dosya']) ? $_GET['dosya']:NULL; 
                        if($dosya==NULL){
                            header('Location:dosyalar.php');
                            exit;
                        }else{
                    $sil=$site->sil('dosyalar','dosya_id',$dosya);
            if($sil>0){
                               header('Location:dosyalar.php');
                                exit;
                            }else{
                                header('Location:incele.php?dosya='.$dosya);
                                exit;
                        } 
                    }
                        break;


default: die('herhangi bir işlem yapılmadı'); break;
} 