<?php require_once 'header.php';?>
<h3>Ayarlar</h3>
<div class="sag_icerik">

  <form action="islem.php?islem=folder" method="post" enctype="multipart/form-data"> 
  <table>
            <tr>
      <td class="sagayasla w150"></td>
 <td> Folder Name:<input type="text" name="baslik" /></td>
            </tr>
            <tr>
            <td class="sagayasla w150"></td> 
 <td> Upload: <input type="file" name="dosya[]" id="dosya" multiple directory="" webkitdirectory="" moxdirectory="" /></td>
            </tr>
            <tr>
            <td class="sagayasla w150"></td>
 <td> <input type="Submit" value="Upload" name="upload" /></td>
</tr>
</table>
  </form>
  
  </div>
<?php require_once 'footer.php';?>