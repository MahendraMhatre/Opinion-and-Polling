<?php 

    include("./inc/connect.inc.php"); 
    session_start();
    if (isset($_SESSION['user_login'])) {
        $uname = $_SESSION["user_login"];
    }
    else {
        $uname = "";
        header('location:logIn.php');
    }

    $query1 = "SELECT * FROM user WHERE email = '$uname'";
    $ret_pic = mysqli_query($con, $query1);
    $get_pic = mysqli_fetch_assoc($ret_pic);
    $profile_pic_db = $get_pic['picURL'];
    $UID = $get_pic['userID'];
    $colorHex = $get_pic['color'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css"  href="css/main.css"/>
        <link rel="stylesheet" type="text/css"  href="css/card.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
        <script src="jquery-1.12.0.js"></script>
		<script src="js/main.js"></script>
        <script src="js/post.js"></script>
        <script src="js/search.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="assets/fevicon.ico">
    