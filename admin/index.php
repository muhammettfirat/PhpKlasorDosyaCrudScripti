<?php require_once 'header.php';?>
    <h3>Anasayfa</h3>
    <div class="sag_icerik">
    <p>Hoşgeldiniz <?=$_SESSION['kullanici']?>,</p>
    <ul>
        <li>Dosyaları Listeliycez
            <ul>
                <li>Dosyaların indirme istatistikleri</li>
                <li>Örneğin Detay Sayfası olabilir.</li>
            </ul>
        </li>
        <li>Kullanıcıları Listeliycez</li>
        <li>Ayarlar sayfası yapacaz
        <ul>
            <li>Download hız sınırlaması</li>
            <li>Seo ayarlaması</li>
            <li>İçerik kullanıcıya özel yada herkese açık: ?</li>
        </ul>    

        </li>
        
        <li>indir.php veya index.php ile indrime
            <ul>
                <li>http://dl.siberteknoloji.com/index.php?dosya=1</li>  
                <li>http://dl.siberteknoloji.com/dosya/1</li> 
                <li>http://dl.siberteknoloji.com/dosya/php_logosu.png</li>  
                <li>http://dl.siberteknoloji.com/php-logosu.png</li>       
            </ul>
        </li>
    </ul>
    </div>
    <?php require_once 'footer.php';?>
