<?php 

include("./inc/connect.inc.php"); 
    session_start();
    if (isset($_SESSION['user_login'])) {
        $uname = $_SESSION["user_login"];
    }
    else {
        $uname = "";
    }
?>


<?php

if(isset($_GET['v'])) {
    $query4 ="SET foreign_key_checks=0";
    mysqli_query($con,$query4);
    
    $query_get="SELECT * from user WHERE email='$uname'";
    $fetchUserTemp = mysqli_query($con, $query_get);
    $fetchUser = mysqli_fetch_array($fetchUserTemp, MYSQLI_ASSOC);
    $fetchedUserID = $fetchUser['userID'];
    
    $aID = mysqli_real_escape_string($con,$_GET['v']);
    $checkQuery = "SELECT * FROM answer_has_vote WHERE (answerID = '$aID' AND votedUserID = '$fetchedUserID')";
    $queryRun = mysqli_query($con, $checkQuery);
    $numRow = mysqli_num_rows($queryRun);
    if($numRow == 0) {
        $query_v="SELECT * from answers WHERE answerID= '$aID' ";
        $ans_v=mysqli_query($con,$query_v);
        $num_rows = mysqli_num_rows($ans_v);
        if($num_rows>0) {
        $Data= mysqli_fetch_array($ans_v,MYSQLI_ASSOC);
        $ans_id=$Data['answerID'];
        $total_likes=$Data['upVoteCount'];
        $total_likes=$total_likes+1;
        $query_v2 = "UPDATE answers SET upVoteCount='$total_likes' WHERE answerId='$ans_id'";
        mysqli_query($con,$query_v2); 
        $queryAV = "INSERT INTO answer_has_vote (answerID, votedUserID) VALUES ('$aID', '$fetchedUserID')";
        mysqli_query($con, $queryAV);
        header("location:home.php");
        }
    }
    else {
        
        header("location:home.php");
    }       
}    

?>