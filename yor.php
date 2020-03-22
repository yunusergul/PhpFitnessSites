<?php 
include'fuctions/config.php';
if(isset($_SESSION['lo_log'])){
$log_lol=$_SESSION['lo_log'];

$yor_looog=addslashes(trim($_POST["yor_loog"]));
if($yor_looog==""){
	
			echo '<script language="javascript">';
		echo 'alert("boş geçmeyiniz")';
		echo '</script>';
	echo "<script>window.location = 'login.php'</script>";
}else{
	
	$query = $db->prepare("INSERT INTO `yorumlar` (`id`, `kullanici-adi`, `yorum`, `gg_gm`) VALUES (NULL, :ko, :yor, '0')");
$insert = $query->execute(array(':ko'=>$log_lol,':yor'=>$yor_looog));
if ($insert){
echo "<script>window.location = 'login.php'</script>";
	
}

}
}else{echo "<script>window.location = 'index.php'</script>";}
?>