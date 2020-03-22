<?php
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE paket_fiyat SET actv='1' WHERE id='".$idn."' ");
echo "<script>window.location = '../pak_fi.php'</script>";
	}else{echo "<script>window.location = '../pak_fi.php'</script>";}
?>