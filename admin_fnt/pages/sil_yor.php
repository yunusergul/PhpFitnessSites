<?php 
if(isset($_COOKIE['admin_lo'])){
include'../../fuctions/config.php';
$queryde = $db->prepare("DELETE FROM yorumlar WHERE id = :id");
$deletee = $queryde->execute(array('id' => $_GET['id']));
echo "<script>window.location = '../yor_lo.php'</script>";
	}else{echo "<script>window.location = '../yor_lo.php'</script>";}

?>