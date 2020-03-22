<?php 
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$queryde = $db->prepare("DELETE FROM log_uye WHERE id = :id");
$deletee = $queryde->execute(array('id' => $_GET['id']));
echo "<script>window.location = '../kull_ek.php'</script>";
}else{echo "<script>window.location = '../kull_ek.php'</script>";}
?>