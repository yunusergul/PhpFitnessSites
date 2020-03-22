<?php include'../fuctions/config.php';  include 'pages/header.php';  include 'pages/yor_sa.php';
if(isset($_COOKIE['admin_lo'])){
	if(isset($_POST["saat_de"])) {
		$icibas=addslashes(trim($_POST["icibas"]));
		$icison=addslashes(trim($_POST["icison"]));
		$sonbas=addslashes(trim($_POST["sonbas"]));
		$sonson=addslashes(trim($_POST["sonson"]));
		$sonuc = $db->exec("UPDATE `calisma_saat` SET `bas_saat` = '".$icibas."', `son_saat` = '".$icison."' WHERE `calisma_saat`.`id` = 1;");
		$sonuc = $db->exec("UPDATE `calisma_saat` SET `bas_saat` = '".$sonbas."', `son_saat` = '".$sonson."' WHERE `calisma_saat`.`id` = 2;");
		echo "<script>window.location = 'aci_saat.php'</script>";}
?>

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag w3-teal w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button ">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button ">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button ">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button w3-teal">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button ">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
	


<form method="post" class="w3-container">
	<div class="w3-container w3-teal">
  <h2>Hafta İçi</h2>
</div>
<?php $queryform = $db->query("SELECT * FROM calisma_saat WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);if ( $queryform ){?>
  <label  class="w3-text-teal"><b>Açılış</b></label>
  <input name="icibas" class="w3-input w3-border w3-light-grey" value="<?php echo $queryform['bas_saat']; ?>" type="text">

  <label  class="w3-text-teal"><b>Kapanış</b></label>
  <input name="icison" class="w3-input w3-border w3-light-grey" value="<?php echo $queryform['son_saat']; ?>" type="text">
	<br>
	<div class="w3-container w3-teal">
<?php }?>
  <h2>Hafta Sonu</h2>
</div>
<?php $queryform = $db->query("SELECT * FROM calisma_saat WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);if ( $queryform ){?>
  <label class="w3-text-teal"><b>Açılış</b></label>
  <input name="sonbas" class="w3-input w3-border w3-light-grey" value="<?php echo $queryform['bas_saat']; ?>" type="text">

  <label class="w3-text-teal"><b>Kapanış</b></label>
  <input name="sonson" class="w3-input w3-border w3-light-grey" value="<?php echo $queryform['son_saat']; ?>" type="text">
<br>
<?php }?>
  <button type="submit" name="saat_de" class="w3-btn w3-blue-grey">Kaydet</button>
</form>	

</div>
</div>
</div>    
</body>
</html>
<?php }else{echo "<script>window.location = 'kull_ek.php'</script>";} ?>