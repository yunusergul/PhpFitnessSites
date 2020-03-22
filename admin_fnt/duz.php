<?php include'../fuctions/config.php';  include 'pages/header.php';  include 'pages/yor_sa.php';
if(isset($_COOKIE['admin_lo'])){
$idn=$_GET['id'];
if(isset($_POST["kis_yenn"])) {
$kul_adi=addslashes(trim($_POST["kull"]));
$isim_so=addslashes(trim($_POST["isim_so"]));
$sifre=addslashes(trim($_POST["sifre"]));
$pin_no=addslashes(trim($_POST["pin_no"]));
$email=addslashes(trim($_POST["email"]));
$tel_no=addslashes(trim($_POST["tel_no"]));
$extt=addslashes(trim($_POST["extt"]));
$cins=addslashes(trim($_POST["cins"]));
$accpss=addslashes(trim($_POST["act"]));
if($cins=='Erkek'){$cinss=1;}else{$cinss=0;}
if($accpss=='Aktif'){$akpa=1;}else{$akpa=0;}

if($sifre==""){
	$sonuc = $db->exec("UPDATE `log_uye` SET `adi_soy` = '$isim_so', `email` = '$email', `kullaniciadi` = '$kul_adi', `cin_lo` = '$cinss', `adi_soy` = '$isim_so', `tel_no` = '$tel_no', `akt` = '$akpa', `ext` = '$extt', `log_pin` = '$pin_no' WHERE `log_uye`.`id` = $idn");
	echo "<script>window.location = 'kull_ek.php'</script>";

}else{
	$sonuc = $db->exec("UPDATE `log_uye` SET `adi_soy` = '$isim_so', `email` = '$email', `sifre` = '".md5($sifre)."', `kullaniciadi` = '$kul_adi', `cin_lo` = '$cinss', `adi_soy` = '$isim_so', `tel_no` = '$tel_no', `akt` = '$akpa', `ext` = '$extt', `log_pin` = '$pin_no' WHERE `log_uye`.`id` = $idn");
	echo "<script>window.location = 'kull_ek.php'</script>";

}



}
?>

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag w3-deep-purple w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button w3-deep-purple">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button ">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button ">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button ">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
	
<div class="w3-container w3-deep-purple">
  <h2>Kişi Düzenle</h2>
</div>
<form method="post"  class="w3-container w3-card-4">
<br>
<p>      
<?php $queryform = $db->query("SELECT * FROM log_uye WHERE id = '$idn'")->fetch(PDO::FETCH_ASSOC);if ( $queryform ){?>
<label class="w3-text-grey">İsim ve Soyisim</label>
<input name="isim_so" class="w3-input w3-border" value="<?php echo $queryform['adi_soy']; ?>" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Kullanıcı Adı</label>
<input name="kull" class="w3-input w3-border" value="<?php echo $queryform['kullaniciadi']; ?>" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Email</label>
<input name="email" class="w3-input w3-border" value="<?php echo $queryform['email']; ?>" type="text"  required>
</p>
<p>  
<p>      
<label class="w3-text-grey">Telefon Numarası</label>
<input name="tel_no" class="w3-input w3-border" value="<?php echo $queryform['tel_no']; ?>" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Pin</label>
<input name="pin_no" class="w3-input w3-border" value="<?php echo $queryform['log_pin']; ?>" type="text"  required>
</p>
<p>
<label class="w3-text-grey">Şifre</label>
<input name="sifre" name="sifre_lo" class="w3-input w3-border" value="" type="text">
</p>
<p>
<label class="w3-text-grey">Extra Bilgiler (Önemli Durumlar İçin)</label>
<textarea name="extt" name="ext_lo" class="w3-input w3-border"  style="resize:none"><?php echo $queryform['ext']; ?></textarea>
</p>
<br>

	<div class="w3-row">
		
  <div class="w3-half">
<?php if($queryform['cin_lo']==0){
	echo"<input id=\"male\" class=\"w3-radio\" type=\"radio\" name=\"cins\"  value=\"Erkek\" checked>
    <label>Erkek</label>
    <br>
    <input id=\"female\" class=\"w3-radio\"  type=\"radio\" name=\"cins\" checked  value=\"Kadın\">
    <label>Kadın</label>";
}else{
	echo"<input id=\"male\" class=\"w3-radio\" type=\"radio\" name=\"cins\" checked  value=\"Erkek\" checked>
    <label>Erkek</label>
    <br>
    <input id=\"female\" class=\"w3-radio\" type=\"radio\" name=\"cins\"  value=\"Kadın\">
    <label>Kadın</label>";}?>
  </div>
  <div class="w3-half">
	 
	<?php if($queryform['akt']==0){
	echo"<input id=\"male\" class=\"w3-radio\" type=\"radio\" name=\"act\" value=\"Aktif\" checked>
    <label>Aktif</label>
    <br>
    <input id=\"female\"  class=\"w3-radio\" type=\"radio\" name=\"act\" checked  value=\"Pasif\">
    <label>Pasif</label>";
}else{
	echo"<input id=\"male\" class=\"w3-radio\" type=\"radio\" name=\"act\" checked value=\"Aktif\" checked>
    <label>Aktif</label>
    <br>
    <input id=\"female\"  class=\"w3-radio\" type=\"radio\" name=\"act\"  value=\"Pasif\">
    <label>Pasif</label>";}?>   
</div>
  </div>
<br>
<?php }?>
	<p><button  type="submit" name="kis_yenn" class="w3-btn w3-padding w3-deep-purple" style="width:120px">Kaydet &nbsp; &#10095;</button></p>
</form>
<br></br>
<div class="w3-container w3-deep-purple">
  <h2>Kullanıcılar</h2>
	<div class="w3-container w3-content">
 		<p class="w3-opacity"><b>Pasif Kullanıcılar</b></p> 
<?php   
		$queryuyy = $db->query("SELECT * FROM log_uye", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['akt']==0){
						if($rowuyy['cin_lo']==1){$lo_cins='E';}else{$lo_cins='K';}
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['kullaniciadi']."</b></p>
   							<p>".$rowuyy['adi_soy']." (".$lo_cins.")</p>
   							<p class=\"w3-text-blue\"><a href=\"duz.php?id=".$rowuyy['id']."\">Düzenle</a>&nbsp;&nbsp;&nbsp;<a href=\"pages/aktif.php?id=".$rowuyy['id']."\">Aktif</a>&nbsp;&nbsp;&nbsp;<a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">Telefon No: ".$rowuyy['tel_no']." <br> Email: ".$rowuyy['email']." <br>Extra Bilgiler: ".$rowuyy['ext']." </span></a></p>
						</div>";}
				}
			}
	?>	
<p class="w3-opacity"><b>Aktif Kullanıcılar</b></p>
<?php   
		$queryuyy = $db->query("SELECT * FROM log_uye", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['akt']==1){
						if($rowuyy['cin_lo']==1){$lo_cins='E';}else{$lo_cins='K';}
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['kullaniciadi']."</b></p>
   							<p>".$rowuyy['adi_soy']." (".$lo_cins.")</p>
   							<p class=\"w3-text-blue\"><a href=\"duz.php?id=".$rowuyy['id']."\">Düzenle</a>&nbsp;&nbsp;&nbsp;<a  href=\"pages/pasif.php?id=".$rowuyy['id']."\">Pasif</a>&nbsp;&nbsp;&nbsp;<a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">Telefon No: ".$rowuyy['tel_no']." <br> Email: ".$rowuyy['email']." <br>Extra Bilgiler: ".$rowuyy['ext']." </span></a></p>
						</div>";}
				}
			}
	?>	
</div>
</div>
</div>
</div>
</div>    
</body>
</html>
<?php }else{echo "<script>window.location = 'kull_ek.php'</script>";} ?>