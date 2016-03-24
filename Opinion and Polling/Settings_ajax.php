<?php
$keyUN=$_GET['un'];
$array = array();
include("./inc/header.inc.php");

if($keyUN) {
    $query1 = "UPDATE user SET username = '$keyUN' WHERE email = '$uname'";
    $q1 = mysqli_query($con, $query1);
    echo $keyUN;
}
?>