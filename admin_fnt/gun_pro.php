<?php include'../fuctions/config.php';  include 'pages/header.php'; include 'pages/yor_sa.php'; 
if(isset($_COOKIE['admin_lo'])){
	if(isset($_POST["ek_spo"])) {
		$baso=addslashes(trim($_POST["basaat"]));
		$soso=addslashes(trim($_POST["sonsaao"]));
		$spo=addslashes(trim($_POST["spo"]));
		$sql = "INSERT INTO `gunun_pro` (`id`, `bas_saat`, `son_saat`, `egzersiz`) VALUES (NULL, :bas, :son, :spo)";
		$query = $db->prepare($sql);
		$sonuc = $query->execute(array(':bas'=>$baso,':son'=>$soso,':spo'=>$spo));
		if ($sonuc){echo "<script>window.location = 'gun_pro.php'</script>";}	}
?>
<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag  w3-blue w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button w3-blue">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
	
<div class="w3-container w3-blue">
  <h2>Çalışma Programı</h2>
</div>
<form method="post" enctype="multipart/form-data"  class="w3-container w3-card-4">
<br>
<p>      
<label class="w3-text-grey">Başlama Saati</label>
<input name="basaat" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Bitiş Saati</label>
<input name="sonsaao" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Yapılacak Spor</label>
<input name="spo" class="w3-input w3-border" value="" type="text"  required>
</p>
<br>

	<p><button  type="submit" name="ek_spo" class="w3-btn w3-padding w3-blue" style="width:120px">Kaydet &nbsp; &#10095;</button></p>
</form>
<br></br>
<div class="w3-container w3-blue">
  <h2>Program</h2>
	<div class="w3-container w3-content">
<?php   
		$queryuyy = $db->query("SELECT * FROM gunun_pro", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/gun_pro_sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>(".$rowuyy['bas_saat']." / ".$rowuyy['son_saat'].")   ".$rowuyy['egzersiz']."</b></p>
   			
						</div>";
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
<?php }else{echo "<script>window.location = 'index.php'</script>";} ?>
