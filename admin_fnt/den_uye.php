<?php include'../fuctions/config.php';  include 'pages/header.php'; include 'pages/yor_sa.php';
if(isset($_COOKIE['admin_lo'])){

?>

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag w3-pink w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button ">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button ">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button ">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button w3-pink">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
<div class="w3-container w3-pink">
  <h2>Katılımcılar</h2>
	<div class="w3-container w3-content">
		<p class="w3-opacity"><b>Beklenen Katılımcılar</b></p>
<?php   
		$queryuyy = $db->query("SELECT * FROM den_member", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['boolen_de']==0){
							print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
   							<p><b>".$rowuyy['name_last']."</b></p>
   							<p class=\"w3-text-blue\"><a href=\"pages/den_kul.php?id=".$rowuyy['id']."\">Kullanıldı</a>&nbsp;&nbsp;&nbsp;<a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">Telefon No: ".$rowuyy['phone_no']." <br> Email: ".$rowuyy['e_mail']."  </span></a></p></div>";}
				}
			}
	?>	
<p class="w3-opacity"><b>Kullanan Katılımcılar</b></p>
<?php   
		$queryuyy = $db->query("SELECT * FROM den_member", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['boolen_de']==1){
							print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
   							<p><b>".$rowuyy['name_last']."</b></p>
   							<p class=\"w3-text-blue\"><a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">Telefon No: ".$rowuyy['phone_no']." <br> Email: ".$rowuyy['e_mail']."  </span></a></p></div>";}
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
