<?php require_once 'header.php';
if ($_SESSION['yetki'] == 'admin'):
?>
<h3>Kullanıcı Ekle</h3>
<div class="sag_icerik">
    <form method="post"  action="islem.php?islem=kullanici_ekle">
   <table> 
       <tr>
           <td class="sagayasla w150">Kullanıcı Adı: </td>
           <td><input type="text" name="kullanici" value=""/></td>
</tr>
<tr>
           <td class="sagayasla w150">Parola: </td>
           <td><input type="text" name="parola" value=""/></td>
</tr>
<tr>
           <td class="sagayasla w150">Eposta: </td>
           <td><input type="text" name="eposta" value=""/></td>
</tr>
<tr>
           <td class="sagayasla w150">Yetki: </td>
           <td>
               <select name="yetki">
               <option value="default">Normal Üye</option>
               <option value="admin">Yönetici</option>
</select>
            </td>
</tr>

<tr>
    <td class="sagayasla w150">&nbsp;</td>
    <td><input type="submit" value="Kullanici Ekle" /></td>
</tr>
</table>
</form>
</div>
<?php else:?>
    <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
        <p>Kullanıcı Eklemeye Yetkili Değilsiniz...</p>
    </div>

    <?php endif;?>
<?php require_once 'footer.php';?>