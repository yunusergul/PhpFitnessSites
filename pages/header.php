<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<title><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '8'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></title>
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">

	<link rel="stylesheet" type="text/css" href="css/den.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
