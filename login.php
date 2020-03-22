<?php  
include'fuctions/config.php'; include'pages/header.php'; include 'pages/nav_menu_log.php'; 
if(isset($_SESSION['lo_log'])){
	$log_lol=$_SESSION['lo_log'];
	$sql = $db->prepare("SELECT * FROM log_uye WHERE kullaniciadi= ?");
	$sql->execute(array($log_lol));
	$row=$sql->fetch(PDO::FETCH_ASSOC);	
	
	
		
if(isset($_POST["log_gun"])) {
	$sifre = addslashes(trim($_POST["sifre_lo"]));
	$extt = addslashes(trim($_POST["ext_lo"]));
	echo '<script language="javascript">';
	echo 'alert("deneme'.$sifre.$extt.'")';
	echo '</script>';
	
	if($sifre=="" && $extt==""){}
	elseif($sifre!="" && $extt==""){
		$sonuc = $db->exec("UPDATE log_uye SET sifre='".md5($sifre)."' WHERE kullaniciadi='".$log_lol."' ");
		echo "<script>window.location = 'login.php'</script>";
	}
	elseif($sifre=="" && $extt!=""){
		$sonuc = $db->exec("UPDATE log_uye SET ext='".$extt."' WHERE kullaniciadi='".$log_lol."' ");
		echo "<script>window.location = 'login.php'</script>";
	}
	else{
		$sonuc = $db->exec("UPDATE log_uye SET ext='".$extt."', sifre='".md5($sifre)."' WHERE kullaniciadi='".$log_lol."' ");
		echo "<script>window.location = 'login.php'</script>";
		
	}

}	

?>
	<header class="log_back" id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<?php
							if($row['akt']>0){
							echo'<img src="img/aktif.png" width="90px" height="90px" alt="Preloader image">
							<h3 class="white">Üyelik Durumu Aktif <span class="open-blink"></span></h3>';
							}else{
							echo'<img src="img/pasif.png" width="90px" height="90px" alt="Preloader image">
							<h3 class="white">Üyelik Durumu Pasif <span class="open-blink"></span></h3>';	}
?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>

		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Üyelik Bilgileri</h2>
			</div>
			<div class="row services">	
<div class="w3-container w3-teal">
  <h2>Kişisel Bilgiler</h2>
</div>
<form method="post" class="w3-container w3-card-4">
<br>
<p>      
<label class="w3-text-grey">İsim ve Soyisim</label>
<input class="w3-input w3-border" value="<?php echo $row['adi_soy']; ?>" type="text" disabled required>
</p>
<p>      
<label class="w3-text-grey">Kullanıcı Adı</label>
<input class="w3-input w3-border" value="<?php echo $row['kullaniciadi']; ?>" type="text" disabled required>
</p>
<p>      
<label class="w3-text-grey">Email</label>
<input class="w3-input w3-border" value="<?php echo $row['email']; ?>" type="text" disabled required>
</p>
<p>  
<p>      
<label class="w3-text-grey">Telefon Numarası</label>
<input class="w3-input w3-border" value="<?php echo $row['tel_no']; ?>" type="text" disabled required>
</p>
<p>      
<label class="w3-text-grey">Giriş Pini</label>
<input class="w3-input w3-border" value="<?php if($row['akt']>0){echo $row['log_pin'];}else{echo"______";}?>" type="text" disabled required>
</p>
<p>
<label class="w3-text-grey">Şifre Değiştir</label>
<input name="sifre_lo" class="w3-input w3-border" value="" type="text" >
</p>
<p>
<label class="w3-text-grey">Extra Bilgiler (Önemli Durumlar İçin)</label>
<textarea name="ext_lo" class="w3-input w3-border"  style="resize:none"><?php echo $row['ext']; ?></textarea>
</p>
<br>
<p><button type="submit" name="log_gun" class="w3-btn w3-padding w3-teal" style="width:120px">Kaydet &nbsp; &#10095;</button></p>
</form>
<br></br>
<div class="w3-container w3-teal">
  <h2>Yorumlar</h2>
</div>
<form action="yor.php" method="post" class="w3-container w3-card-4">
<br>
<p>      
<label class="w3-text-grey">Yorum Ekle</label>
<textarea name="yor_loog" class="w3-input w3-border"  style="resize:none" required></textarea>
</p>
<p><button name="yor_lo"  type="submit" class="w3-btn w3-padding w3-teal" style="width:120px">Gönder &nbsp; &#10095;</button></p>
	<br>
<?php 	
$sqlyy = $db->prepare("SELECT * FROM yorumlar");
$sqlyy->execute();
$den=0;
while($rowyy=$sqlyy->fetch(PDO::FETCH_ASSOC)) {
	if($log_lol==$rowyy['kullanici-adi']){
		$den++;
		echo "<div name=\"id".$rowyy['id']."\"  class=\"w3-panel w3-white w3-card w3-display-container\">
		<a  href=\"sil.php?id=".$rowyy['id']."\" ><span class=\"w3-display-topright w3-padding w3-hover-red\" >X</span></a>
		<p class=\"w3-text-blue\"><b>$den. Yorum</b></p>
   		<p>".$rowyy['yorum']."</p>
		
		</div>	";
	}
}
	?>
<script></script>	
</form>
</div>
</div>
<div class="cut cut-bottom"></div>
</section>
<?php      
}else{echo "<script>window.location = 'index.php'</script>"; }
  include 'pages/under_nav-log.php'; include 'pages/footer.php'; ?>

