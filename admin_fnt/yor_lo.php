<?php include'../fuctions/config.php';  include 'pages/header.php'; include 'pages/yor_sa.php';
if(isset($_COOKIE['admin_lo'])){



?>

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button w3-orange ">Yorum İşlemleri <span class="w3-tag  w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button">Kullanıcı İşlemleri</a>
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
<div class="w3-container w3-orange">
  <h2>Yorumlar</h2>
	<div class="w3-container w3-content">
 		<p class="w3-opacity"><b>Cevap Bekleyen Yorumlar</b></p> 
	<?php   
		$queryuyy = $db->query("SELECT * FROM yorumlar", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['ad_co']==0){
						$query = $db->query("SELECT * FROM log_uye WHERE kullaniciadi = '".$rowuyy['kullanici-adi']."'")->fetch(PDO::FETCH_ASSOC);
						if ( $query ){
							print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/sil_yor.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-red\"><b>".$rowuyy['kullanici-adi']."</b> ".$query['adi_soy']." </p>
							<p>".$rowuyy['yorum']."</p>
   							<p class=\"w3-text-red\"><a href=\"pages/yor_ac.php?id=".$rowuyy['id']."\">Aktif</a>&nbsp;&nbsp;&nbsp;
							<a href=\"pages/yor_pas.php?id=".$rowuyy['id']."\">Pasif</a>&nbsp;&nbsp;&nbsp;</p>
 							</div>";
						}
						}}}?>	
		
		
		
		
		
		
<p class="w3-opacity"><b>Onaylanan Yorumlar</b></p>
 
	<?php   
		$queryuyy = $db->query("SELECT * FROM yorumlar", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['ad_co']==1){
						if($rowuyy['gg_gm']==1){
						$query = $db->query("SELECT * FROM log_uye WHERE kullaniciadi = '".$rowuyy['kullanici-adi']."'")->fetch(PDO::FETCH_ASSOC);
						if ( $query ){
							print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a  href=\"pages/sil_yor.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-red\"><b>".$rowuyy['kullanici-adi']."</b> ".$query['adi_soy']." </p>
							<p>".$rowuyy['yorum']."</p>
   							<p class=\"w3-text-red\"><a href=\"pages/yor_pas.php?id=".$rowuyy['id']."\">Pasif</a>&nbsp;&nbsp;&nbsp;</p>
 							</div>";
						}
						}}}}?>
 <p class="w3-opacity"><b>Onaylanmayan Yorumlar</b></p>
 
	<?php   
		$queryuyy = $db->query("SELECT * FROM yorumlar", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['ad_co']==1){
						if($rowuyy['gg_gm']==0){
						$query = $db->query("SELECT * FROM log_uye WHERE kullaniciadi = '".$rowuyy['kullanici-adi']."'")->fetch(PDO::FETCH_ASSOC);
						if ( $query ){
							print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/sil_yor.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-red\"><b>".$rowuyy['kullanici-adi']."</b> ".$query['adi_soy']." </p>
							<p>".$rowuyy['yorum']."</p>
   							<p class=\"w3-text-red\"><a href=\"pages/yor_ac.php?id=".$rowuyy['id']."\">Aktif</a>&nbsp;&nbsp;&nbsp;</p>
 							</div>";
						}
						}}}}?>

</div>
	
</div>

</div>
</div>
</div>    
</body>
</html>
<?php }else{echo "<script>window.location = 'index.php'</script>";} ?>