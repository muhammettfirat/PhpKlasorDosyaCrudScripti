<?php require_once 'header.php';
    if ($_SESSION['yetki'] == 'admin'):
        $id=isset($_GET['id']) ? (int)$_GET['id'] : NULL;
        $kullanici= $site->kullanici($id);
?>
        <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
<?php if($id==NULL || $kullanici==false):?>
        <p>Geçersiz Kullanici</p>
<?php else:?>
    <form method="post"  action="islem.php?islem=kullaniciGuncelle&kullanici=<?=$id?>">
    <table> 
        <tr>
            <td class="sagayasla w150">Kullanıcı Adı: </td>
            <td><input type="text" name="kullanici" value="<?=$kullanici->kullanici_adi?>"/></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Parola: </td>
            <td><input type="text" name="parola" value=""/></td> 
        </tr>
        <tr>
            <td class="sagayasla w150">Eposta: </td>
            <td><input type="text" name="eposta" value="<?=$kullanici->kullanici_mail?>"/></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Yetki: </td>
            <td>
                <select name="yetki">
                <option value="default"<?php if($kullanici->kullanici_adi == 'default'): echo 'selected="selected"'; endif;?>>Normal Üye</option>
                <option value="admin"<?php if($kullanici->kullanici_adi == 'admin'): echo 'selected="selected"'; endif;?>>Yönetici</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="sagayasla w150">&nbsp;</td>
            <td><input type="submit" value="Güncelle" />
<?php if($_SESSION['id'] != $kullanici->kullanici_id ) : ?>
            <input onclick="window.location='islem.php?islem=kullanici_sil&kullanici=<?php echo $id ?>'" type="button" value="Sil" />
<?php endif;?>
        </td>
        </tr>
        </table>
    </form>
    </div>
<?php endif;?>
<?php else:?>
        <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
        <p>Kullanıcı Eklemeye Yetkili Değilsiniz...</p>
    </div>

<?php endif;?>
<?php require_once 'footer.php';?>