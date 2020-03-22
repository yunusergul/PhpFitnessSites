<?php 
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$queryde = $db->prepare("DELETE FROM paket_fiyat WHERE id = :id");
$deletee = $queryde->execute(array('id' => $_GET['id']));
echo "<script>window.location = '../pak_fi.php'</script>";
}else{echo "<script>window.location = '../pak_fi.php'</script>";}
?>