<?php require_once 'header.php';
$id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL;
$dosya= $site->dosya($id);
?>

<h3>Dosya Detayları</h3>
<div class="sag_icerik">
<?php if($id==NULL || $dosya==false):?>
<p>Geçersiz Dosya Yolu</p>
    <?php else:?>

    <table class="dosyalar">
        <tr>
            <td class="sagayasla w150">Dosya Başlığı</td>
            <td><?php echo $dosya->dosya_baslik?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Dosya Adı</td>
            <td><?php echo $dosya->dosya_adi?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Dosya Boyutu</td>
            <td><?php echo $site-> dosyaBoyutu($dosya->dosya_boyut)?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">İndirilme Sayısı</td>
            <td><?php echo $dosya->dosya_indirilme?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Yükleyen Üye</td>
            <td><?php echo  $site->uyeAdi($dosya->dosya_yukleyen)->kullanici_adi?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Eklenme Tarihi</td>
            <td><?php echo $site->tarih($dosya->dosya_eklenme)?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">Dosya Türü</td>
            <td><?php echo   $site->dosyaTuru($dosya->dosya_mime)?></td>
        </tr>
        <tr>
            <td class="sagayasla w150">&nbsp;</td>
            <td>
    
                <input type="button" onclick="window.location='../index.php?dosya=<?=$id?>'" name="indir" value="İndir"/>
                <input type="button"  onclick="window.location='duzenle.php?dosya=<?=$id?>'" name="düzenle" value="Düzenle"/>
                <input type="button" onclick="window.location='islem.php?islem=sil&dosya=<?=$id?>'" name="sil" value="Sil"/>
        </td>
        </tr>
    </table>


        <?php endif;?>
</div>
<?php require_once 'footer.php';?>