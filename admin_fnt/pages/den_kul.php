<?php
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE den_member SET boolen_de='1' WHERE id='".$idn."' ");
echo "<script>window.location = '../den_uye.php'</script>";
	}else{echo "<script>window.location = '../den_uye.php'</script>";}
?>