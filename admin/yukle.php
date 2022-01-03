<?php require_once 'header.php';?>
<h3>Dosya Yükleme</h3>
<div class="sag_icerik">
    <form method="post" action="islem.php?islem=yukle" enctype="multipart/form-data">
        <table>
            <tr>
                <td class="sagayasla w150">Dosya Başlığı</td>
                <td><input type="text" name="baslik" value=""/>  </td>
            </tr>
            <tr>
                <td class="sagayasla w150">Dosya </td>
                <td><input type="file" name="dosya" value=""/>  </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Ekle"/>  </td>
            </tr>
        </table>
    </form>
</div>
<?php require_once 'footer.php';?>
