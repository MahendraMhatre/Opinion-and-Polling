<?php 
    include("./inc/connect.inc.php"); 
    session_start();
    if (isset($_SESSION['user_login'])) {
        $uname = $_SESSION["user_login"];
    }
    else {
        $uname = "";
    }
    $toShow = 0;
    $retval = "";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Sensa</title>
		<link rel="stylesheet" type="text/css" href="css/logIn.css">
        <script src="jquery-1.12.0.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/logIn.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="shortcut icon" type="image/x-icon" href="assets/fevicon.ico">
	</head>