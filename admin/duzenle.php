<?php require_once 'header.php';
$id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL;
$dosya= $site->dosya($id);
?>
<h3>Dosya Yükleme</h3>
<div class="sag_icerik">
<?php if($id==NULL || $dosya==false):?>
<p>Geçersiz Dosya Yolu</p>
    <?php else:?>
    <form method="post" action="islem.php?islem=dosyaGuncelle&dosya=<?=$id?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td class="sagayasla w150">Klasör Başlığı</td>
                <td><input type="text" name="baslik" value="<?php echo $dosya->dosya_baslik?>"/>  </td>
            </tr>
            <tr>
                <td class="sagayasla w150">Dosya Başlığı</td>
                <td><input type="text" name="adi" value="<?php echo $dosya->dosya_adi?>"/>  </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Güncelle"/>  </td>
            </tr>
        </table>
    </form>
</div>
<?php endif;?>
<?php require_once 'footer.php';?>
