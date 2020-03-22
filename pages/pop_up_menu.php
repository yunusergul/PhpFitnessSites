<?php 
if(isset($_POST["create_record"])) {
	$name = addslashes(trim($_POST["name_last"]));
	$e_mail = addslashes(trim($_POST["den_email"]));
	$phone_no = addslashes(trim($_POST["den_phone_no"]));
	$d_date = addslashes(trim($_POST["den_date"]));
	$sonuc=is_numeric($phone_no);
	$mail_ko=0;
	$phone_ko=0;
	$et_co = strpos($e_mail,"@");
	$dat_co = strpos($e_mail,".");
	if(($name=="" || $e_mail=="" || $d_date=="") || ($et_co==false || $dat_co == false) || (!$sonuc) ){
		echo '<script language="javascript">';
		echo 'alert("Formu Doğru doldurun")';
		echo '</script>';
	}
	else
	{ 
		$query = $db->query("SELECT * FROM den_member", PDO::FETCH_ASSOC);
		if ( $query->rowCount() ){
			foreach( $query as $row ){
				if($e_mail==$row['e_mail']){
					$mail_ko++;


				}
				if($phone_no==$row['phone_no']){
					$phone_ko++;

				}
			}
		}
		if( $mail_ko != 0 || $phone_ko != 0  ){
			$mail_ko=0; 
			$phone_ko=0;
		}
		else{
			$query = $db->prepare("INSERT INTO den_member SET name_last = ?, phone_no = ?, e_mail = ?, re_date = ?");
			$insert = $query->execute(array($name, $phone_no, $e_mail, $d_date));
			if ( $insert ){
				$last_id = $db->lastInsertId();
				echo "<script>window.location.reload()</script>";
			}		
		}	
	}
}	
?>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content modal-popup">
			<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
			<h3 class="white">Deneme Üyeliği</h3>
			<form  method="post" class="popup-form">
				<input type="text" name="name_last" class="form-control form-white" placeholder="İsim ve Soyisim">
				<input type="text" name="den_email" class="form-control form-white" placeholder="Email Adresi">
				<input type="text" name="den_phone_no" class="form-control form-white" placeholder="Telefon Numarası">
				<input type="date"  name="den_date" class="form-control form-white" name="bday" >
				<button type="submit" name="create_record" class="btn btn-submit">Kayıt Et</button>
			</form>
		</div>
	</div>
</div>
<?php
if(isset($_POST["sing_inn11"])){
$kadi = $_POST["log_lo"];
$sifre = md5($_POST["log_pas"]);
//Boşluk kontrolü de yapalım ki boş gelmesin.
if(!$kadi || !$sifre){
	echo '<script language="javascript">';
	echo 'alert("Formu Doğru doldurun")';
	echo '</script>';
}else{
$cek = $db->query("select * from log_uye where kullaniciadi = '$kadi' && sifre = '$sifre' ",PDO::FETCH_ASSOC);
if($cek->rowCount()){
	$_SESSION['lo_log']=$kadi;	
   echo "<script>window.location = 'login.php'</script>";
}else{
	echo '<script language="javascript">';
	echo 'alert("Kullanıcı Adı veya Şifrenizde bir yanlışlık var.")';
	echo '</script>';	
}}}
?>
<div class="modal fade" id="sing_in1" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Üye Girişi</h3>
				<form  method="post" class="popup-form">
					<input type="text" name="log_lo" class="form-control form-white" placeholder="Kullanıcı Adı">
					<input type="password" name="log_pas" class="form-control form-white" placeholder="Şifre">
					<button   type="submit" name="sing_inn11" class="btn btn-submit">Giriş</button>
				</form>
			</div>
		</div>
	</div>




