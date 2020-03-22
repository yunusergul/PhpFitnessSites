<?php
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$idn=$_GET['id'];
$sonuc = $db->exec("UPDATE egitmenler SET gg_gm='1' WHERE id='".$idn."' ");
echo "<script>window.location = '../egitme.php'</script>";
}else{echo "<script>window.location = '../egitme.php'</script>";}
?>