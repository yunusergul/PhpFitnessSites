<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=kalkanbaslarspor;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
session_start();

?>
