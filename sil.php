<?php 
include'fuctions/config.php';
if(isset($_SESSION['lo_log'])){
$query = $db->prepare("DELETE FROM yorumlar WHERE id = :id");
$delete = $query->execute(array('id' => $_GET['id']));
echo "<script>window.location = 'login.php'</script>";
}else{echo "<script>window.location = 'index.php'</script>";}
?>