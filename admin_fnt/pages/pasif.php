<?php
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE log_uye SET akt='0' WHERE id='".$idn."' ");
echo "<script>window.location = '../kull_ek.php'</script>";
}else{echo "<script>window.location = '../kull_ek.php'</script>";}
?>