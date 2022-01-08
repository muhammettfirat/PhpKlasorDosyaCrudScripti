<?php require_once 'header.php';?>
<h3>Dosyalar</h3>
<div class="sag_icerik">
    <table class="dosyalar">
        <tr>
        <th>ID</th> 
        <th>Dosya Adı</th> 
        <th>Dosya Tipi</th> 
        <th>Eklenme Tarihi</th> 
        <th>İndirilme</th> 
        <th>Detay</th> 
        </tr>
        <?php
        $dosyalar=$site->dosyalar(0,20);
        foreach ($dosyalar as $dosya):
        ?>
        <tr>
        <td width="20"><?php echo $dosya->dosya_id?></td> 
        <td><?php echo $dosya->dosya_baslik ?><br><?php echo  $dosya->dosya_adi?></td> 
        <td width="110"><?php echo  $dosya->dosya_mime?></td> 
        <td width="140"><?php echo $site->tarih($dosya->dosya_eklenme)?></td> 
        <td width="50"><?php echo $dosya->dosya_indirilme?></td> 
        <td align="center" width="20"><a href="incele.php?dosya=<?php echo $dosya->dosya_id?>"><img src="img/detay.png"/></a></td> 
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
<?php require_once 'footer.php'; ?>