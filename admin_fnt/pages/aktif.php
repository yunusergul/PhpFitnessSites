<?php
include'../../fuctions/config.php';
if(isset($_COOKIE['admin_lo'])){
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE log_uye SET akt='1' WHERE id='".$idn."' ");
echo "<script>window.location = '../kull_ek.php'</script>";
}else{echo "<script>window.location = '../kull_ek.php'</script>";}
?>