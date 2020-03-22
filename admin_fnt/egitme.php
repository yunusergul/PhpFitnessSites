<?php include'../fuctions/config.php';  include 'pages/header.php'; include 'pages/yor_sa.php'; 
if(isset($_COOKIE['admin_lo'])){
	if(isset($_POST["egit_ek"])) {
		$egit_is=addslashes(trim($_POST["eisa"]));
		$uzmanlik=addslashes(trim($_POST["euzm"]));
		$se_say=addslashes(trim($_POST["seysa"]));
		$fiyat=addslashes(trim($_POST["fiysa"]));
		$ac=addslashes(trim($_POST["act"]));
		if($ac=="Aktif"){$actv=1;}else{$actv=0;}
        function isimuret($uzunluk) {
    $karakterler = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPRSTUVYZ";
	$sifre_ver="";$karakter_sayi = strlen($karakterler);for ($ras = 0; $ras < $uzunluk; $ras++) { $rakam_ver = rand(0,$karakter_sayi-1);$sifre_ver .= $karakterler[$rakam_ver];}return $sifre_ver;}
		$dose1=isimuret(30);
		$dose2=isimuret(30);	
		$sql = "INSERT INTO `egitmenler` (`id`, `fiyat`, `seans_say`, `res_url`, `ant_url`, `isim`, `uzmanlik`, `gg_gm`) VALUES (NULL, :fiy, :sas, :pur, :uur, :is, :uz, :acvt)";
		$query = $db->prepare($sql);
		$sonuc = $query->execute(array(
			':fiy'=>$fiyat,
			':sas'=>$se_say,
			':pur'=>'img/egitmen/'.$dose1.'.jpg',
			':uur'=>'img/egitmen/'.$dose2.'.jpg',
			':is'=>$egit_is,
			':uz'=>$uzmanlik,
			':acvt'=>$actv
		));
		if ($sonuc){
			$dosya1 = $_FILES['proph']['tmp_name'];
			copy($dosya1, '../img/egitmen/'.$dose1.'.jpg');
			$dosya2 = $_FILES['backph']['tmp_name'];
			copy($dosya2, '../img/egitmen/'.$dose2.'.jpg');	
			echo "<script>window.location = 'egitme.php'</script>";}	
		}
?>

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:20%">
  <div class="w3-container w3-dark-grey">
    <h4>Menu</h4>
  </div>
  <a href="yor_lo.php" class="w3-bar-item w3-button">Yorum İşlemleri <span class="w3-tag w3-light-green w3-right w3-margin-right">
<?php echo $yorsa;?></span></a>
	<a href="kull_ek.php" class="w3-bar-item w3-button">Kullanıcı İşlemleri</a>
	<a href="egitme.php" class="w3-bar-item w3-button w3-light-green">Eğitmen Ekle</a>
	<a href="hizme.php" class="w3-bar-item w3-button ">Hizmet Ekle</a>
	<a href="pak_fi.php" class="w3-bar-item w3-button">Paket Ekle</a>
	<a href="aci_saat.php" class="w3-bar-item w3-button">Çalışma Saatleri</a>
	<a href="gun_pro.php" class="w3-bar-item w3-button ">Çalışma Programı</a>
	<a href="den_uye.php" class="w3-bar-item w3-button">Demo Kullanıcı</a>
	<a href="logout.php" class="w3-bar-item w3-button">Çıkış Yap</a>
</div>

<div style="margin-left:20%">
<div class="w3-container">
	
<div class="w3-container w3-light-green">
  <h2>Eğitmen Ekle</h2>
</div>
<form method="post" enctype="multipart/form-data"  class="w3-container w3-card-4">
<br>
<p>      
<label class="w3-text-grey">İsim ve Soyisim</label>
<input name="eisa" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Uzmanlık</label>
<input name="euzm" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Seans Sayısı</label>
<input name="seysa" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>  
<p>      
<label class="w3-text-grey">Fiyat (Aylık)</label>
<input name="fiysa" class="w3-input w3-border" value="" type="text"  required>
</p>
<p>      
<label class="w3-text-grey">Profil Fotoğrafı(120x120)</label>
<input name="proph" class="w3-input w3-border" value="" type="file"  required>
</p>
<p>      
<label class="w3-text-grey">Arka Plan Fotoğrafı(370x240)</label>
<input name="backph" class="w3-input w3-border" value="" type="file"  required>
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
  </div>
<br>
	<p><button  type="submit" name="egit_ek" class="w3-btn w3-padding w3-light-green" style="width:120px">Kaydet &nbsp; &#10095;</button></p>
</form>
<br></br>
<div class="w3-container w3-light-green">
  <h2>Eğitmenler</h2>
	<div class="w3-container w3-content">
 		<p class="w3-opacity"><b>Pasif Eğitmenler</b></p> 
<?php   
		$queryuyy = $db->query("SELECT * FROM egitmenler", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['gg_gm']==0){
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/egit_sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['isim']."</b></p>
   							<p>".$rowuyy['uzmanlik']."</p>
   							<p class=\"w3-text-blue\"><a href=\"egit_duz.php?id=".$rowuyy['id']."\">Düzenle</a>&nbsp;&nbsp;&nbsp;<a href=\"pages/egit_aktif.php?id=".$rowuyy['id']."\">Aktif</a>&nbsp;&nbsp;&nbsp;<a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">
							Seans Sayısı: ".$rowuyy['seans_say']." <br> Fiyat: ".$rowuyy['fiyat']."</span></a></p>
						</div>";}
				}
			}
	?>	
<p class="w3-opacity"><b>Aktif Eğitmenler</b></p>
<?php   
		$queryuyy = $db->query("SELECT * FROM egitmenler", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['gg_gm']==1){
					print "<div class=\"w3-panel w3-white w3-card w3-display-container\">
    						<span class=\"w3-display-topright w3-padding w3-hover-red\"><a href=\"pages/egit_sip.php?id=".$rowuyy['id']."\">X</a></span>
   							<p class=\"w3-text-blue\"><b>".$rowuyy['isim']."</b></p>
   							<p>".$rowuyy['uzmanlik']."</p>
   							<p class=\"w3-text-blue\"><a href=\"egit_duz.php?id=".$rowuyy['id']."\">Düzenle</a>&nbsp;&nbsp;&nbsp;<a  href=\"pages/egit_pasif.php?id=".$rowuyy['id']."\">Pasif</a>&nbsp;&nbsp;&nbsp;<a class=\"w3-tooltip\">Detaylar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"position:absolute;left:0;bottom:20px\" class=\"w3-text w3-tag\">
							Seans Sayısı: ".$rowuyy['seans_say']." <br> Fiyat: ".$rowuyy['fiyat']."</span></a></p>
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
