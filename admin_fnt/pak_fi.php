<?php include'../fuctions/config.php';  include 'pages/header.php'; include 'pages/yor_sa.php'; 
if(isset($_COOKIE['admin_lo'])){
	if(isset($_POST["pak_ek"])) {
		$pakadi=addslashes(trim($_POST["pakadi"]));
		$fiyat=addslashes(trim($_POST["fiyati"]));
		$pakci=addslashes(trim($_POST["pakaci"]));
		$ac=addslashes(trim($_POST["act"]));
		$ac1=addslashes(trim($_POST["ter"]));
		function isimuret($uzunluk) {
    $karakterler = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPRSTUVYZ";
	$sifre_ver="";$karakter_sayi = strlen($karakterler);for ($ras = 0; $ras < $uzunluk; $ras++) { $rakam_ver = rand(0,$karakter_sayi-1);$sifre_ver .= $karakterler[$rakam_ver];}return $sifre_ver;}
		$dose1=isimuret(30);
		if($ac=="Aktif"){$actv=1;}else{$actv=0;}
		if($ac1=="Aktif"){$actv1=1;}else{$actv1=0;}
		$sql = "INSERT INTO `paket_fiyat` (`id`, `aciklama`, `icerik`, `fiyat`, `zaman`, `res_re`, `actv`) VALUES (NULL, :ac, :ice, :fi, :zam, :resre, :actv)";
		$query = $db->prepare($sql);
		$sonuc = $query->execute(array(
			':ac'=>$pakadi,
			':ice'=>$pakci,
			':fi'=>$fiyat,
			':zam'=>$actv1,
			':resre'=>'img/'.$dose1.'.jpg',
			':actv'=>$actv
		));
		if ($sonuc){
			$dosya1 = $_FILES['proph']['tmp_name'];
			copy($dosya1, '../img/'.$dose1.'.jpg');
			echo "<script>window.location = 'pak_fi.php'</script>";}	
		}
?>
<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag  w3-khaki w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button  w3-khaki">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button ">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
	
<div class="w3-container  w3-khaki">
  <h2>Paket Ekle</h2>
</div>
<form method="post" enctype="multipart/form-data"  class="w3-container w3-card-4">
<br>
<p>      
<label class="w3-text-grey">Paket Adı</label>
<input name="pakadi" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Fiyat</label>
<input name="fiyati" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Arka Plan Fotoğrafı</label>
<input name="proph" class="w3-input w3-border" value="" type="file"  required>
</p>
<p>      
<label class="w3-text-grey">Paket Açıklaması</label>
<textarea name="pakaci" class="w3-input w3-border" style="resize:none"></textarea>
</p>
<br>
<div class="w3-row">	
  <div class="w3-half">
 		<input id="male" class="w3-radio" type="radio" name="act" value="Aktif" checked>
    	<label>Aktif</label>
   		 <br>
    	 <input id="female" class="w3-radio" type="radio" name="act" value="Pasif">
   		 <label>Pasif</label>
 	</div>
	<div class="w3-half">
   		 <input id="male" class="w3-radio" type="radio" name="ter" value="Aktif" checked>
    	<label>Ay</label>
   		 <br>
   		 <input id="female" class="w3-radio" type="radio" name="ter" value="Pasif">
    		<label>Yıl</label>
  </div>
  </div>
<br>
	<p><button  type="submit" name="pak_ek" class="w3-btn w3-padding  w3-khaki" style="width:120px">Kaydet &nbsp; &#10095;</button></p>
</form>
<br></br>
<div class="w3-container  w3-khaki">
  <h2>Paketler</h2>
	<div class="w3-container w3-content">
 		<p class="w3-opacity"><b>Pasif Hizmetler</b></p> 
<?php   
		$queryuyy = $db->query("SELECT * FROM paket_fiyat", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['actv']==0){
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/pak_fi_sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['aciklama']."</b></p>
   							<p class=\"w3-text-blue\"><a href=\"pages/pak_fi_ac.php?id=".$rowuyy['id']."\">Aktif</a></p>
						</div>";}
				}
			}
	?>	
<p class="w3-opacity"><b>Aktif Hizmetler</b></p>
<?php   
		$queryuyy = $db->query("SELECT * FROM paket_fiyat", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['actv']==1){
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/pak_fi_sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['aciklama']."</b></p>
   							<p class=\"w3-text-blue\"><a href=\"pages/pak_fi_pas.php?id=".$rowuyy['id']."\">Pasif</a></p>
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
<?php }else{echo "<script>window.location = 'index.php'</script>";} ?>
