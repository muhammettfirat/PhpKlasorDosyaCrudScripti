<?php require_once 'header.php';?>
<h3>Dosyalar</h3>
<div class="sag_icerik">
    <table class="dosyalar">
        <tr>
            <th>ID</th> 
            <th>Kullanıcı Adı</th> 
            <th>Yetkisi</th> 
            <th>Kayıt Tarihi</th> 
            <th>Detay</th> 
        </tr>
<?php
        $kullanicilar=$site->kullanicilar(0,20);
    if (count( $kullanicilar)>0):
    foreach ( $kullanicilar as $kullanici):
?>
        <tr>
            <td width="20"><?php echo $kullanici->kullanici_id?></td> 
            <td><?php echo $kullanici->kullanici_adi ?></td> 
            <td width="200"><?php echo  $kullanici->kullanici_yetki?></td> 
            <td width="140"><?php echo $site->tarih($kullanici->kullanici_kayit_tarihi)?></td> 
            <td align="center" width="20"><a href="kullanici.php?id=<?php echo $kullanici->kullanici_id?>"><img src="img/detay.png"/></a></td> 
        </tr>
<?php endforeach;else: ?>
        <tr><td colspan="5"align="center">Hiç kullanici yüklenmemiş</td></tr>
<?php endif; ?>
    </table>
</div>
<?php require_once 'footer.php'; ?>