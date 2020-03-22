<?php
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE yorumlar SET gg_gm='0', ad_co='1' WHERE id='".$idn."' ");
echo "<script>window.location = '../yor_lo.php'</script>";
	}else{echo "<script>window.location = '../yor_lo.php'</script>";}
?>