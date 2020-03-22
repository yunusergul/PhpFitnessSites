<?php include'../fuctions/config.php'; include 'pages/header.php';  
if(!isset($_COOKIE['admin_lo'])){
if(isset($_POST["giris"])) {
$kul_adi=addslashes(trim($_POST["kadi"]));
$sifresi=md5(addslashes(trim($_POST["sifre"])));
if(!$kul_adi || !$sifresi){
	echo '<script language="javascript">';
	echo 'alert("Formu Doğru doldurun")';
	echo '</script>';
}else{
$cek = $db->query("select * from admin_pas where admin_lo = '$kul_adi' && admin_pas = '$sifresi' ",PDO::FETCH_ASSOC);
if($cek->rowCount()){
	setcookie("admin_lo", $kul_adi);	
   echo "<script>window.location = 'kull_ek.php'</script>";
}else{
	echo '<script language="javascript">';
	echo 'alert("Kullanıcı Adı veya Şifrenizde bir yanlışlık var.")';
	echo '</script>';	
}}

}
if(isset($_POST["cikis"])) {echo "<script>window.location = '../'</script>";}

?>
<center>
<div class="w3-container">
  <div class="w3-card-4 w3-dark-grey" style="width:50%">
    <div class="w3-container w3-center">
      <h3>Admin Panel</h3>
      <img src="../img/img_avatar3.png" alt="Avatar" style="width:50%">
		<form  method="post" class="w3-container">
			<label>Kullanıcı Adı</label>
			<input name="kadi" class="w3-input" type="text">
			<label>Şifre</label>
			<input name="sifre" class="w3-input" type="password">
	</div>
      <div class="w3-section">
        <button type="submit" name="giris" class="w3-button w3-green">Giriş Yap</button>
        <button type="submit" name="cikis" class="w3-button w3-red">Çıkış Yap</button>
      </div>
    </div>
</form>
  </div>
</div>
</center>
</body>
</html>
<?php }else{echo "<script>window.location = 'kull_ek.php'</script>";} ?>