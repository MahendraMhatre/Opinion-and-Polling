<?php include("./inc/header.inc.php"); ?>
<title>Home - Sensa</title>
<link rel="stylesheet" type="text/css"  href="css/card.css"/>
<?php include("./inc/headerMenu.inc.php"); ?>

<?php
$subAns = @$_POST['SubAns'];
$answer = strip_tags(@$_POST['UserAnswer']);
$answerID = @$_POST['answID'];
$QID = @$_POST['QID'];
$flag = @$_POST['flag'];
if ($subAns) {
    echo "$answer $answerID $QID $flag<br>";
    $query12 = "SET foreign_key_checks=0";
    mysqli_query($con, $query12);
    if ($flag == 0) {
        $query14 = "INSERT INTO answers(answer, upVoteCount) VALUES ('$answer', '0')";
        mysqli_query($con, $query14);
        $query15 = "SELECT answerID FROM answers ORDER BY answerID DESC LIMIT 1";
        $Q4 = mysqli_query($con, $query15);
        $A4 = mysqli_fetch_array($Q4, MYSQLI_ASSOC);
        $A4 = $A4['answerID'];
        $query15 = "INSERT INTO question_has_answer(answerID, questionID) VALUES ('$A4', '$QID')";
        $query16 = "INSERT INTO user_has_answers(userID, answerID) VALUES ('$UID', '$A4')";
        mysqli_query($con, $query15);
        mysqli_query($con, $query16);
    } else {
        $query14 = "UPDATE answers SET answer = '$answer' WHERE answerID = '$answerID'";
        mysqli_query($con, $query14);
    }
    $query13 = "SET foreign_key_checks = 1";
    mysqli_query($con, $query13);
    header('location:home.php');
}
?>

<div class='main_content'>
    <div id="cards">
<?php
    $flag = 0;
    $query1 = "SELECT * from questions";
    $getques = mysqli_query($con,$query1);
    while ($row = mysqli_fetch_array($getques, MYSQLI_ASSOC)) {
        $quesID = $row['questionID'];
        $ques = $row['question'];
        $query2 = "SELECT userID from user_has_questions WHERE questionID = '$quesID'";
        $getUserID = mysqli_query($con, $query2);
        $getUserTemp = mysqli_fetch_array($getUserID, MYSQLI_ASSOC);
        $getUserID = $getUserTemp['userID'];
        $query3 = "SELECT * FROM user WHERE userID = '$getUserID'";
        $getUserTemp = mysqli_query($con, $query3);
        $getUser = mysqli_fetch_array($getUserTemp, MYSQLI_ASSOC);
        $fullName = $getUser['firstName']." ".$getUser['lastName'];
        $ID = $getUser['email'];
        $picPos = $getUser['picURL'];
        $abMe = $getUser['aboutMe'];
        
        $query9 = "SELECT answerID FROM question_has_answer WHERE questionID = '$quesID'";
        $Q1 = mysqli_query($con, $query9);
        
        $query10 = "SELECT answerID FROM user_has_answer WHERE userID = '$getUserID'";
        $Q2 = mysqli_query($con, $query10);
        if($Q1 && $Q2) {
            $A1 = mysqli_fetch_array($Q1, MYSQLI_ASSOC);
            $A2 = mysqli_fetch_array($Q2, MYSQLI_ASSOC);
            $result = array_intersect($A1, $A2);
            if(sizeof($result) > 0) {
                foreach($result as $key=>$value) {
                    $aID = $value;
                }
                $auery11 = "SELECT answerID, answer FROM answers WHERE answerID = '$aID'";
                $Q3 = mysqli_query($con, $query11);
                $UrAnswer = mysqli_fetch_array($Q3, MYSQLI_ASSOC);
                $UrAnswer = $UrAnswer['answer'];
                $UrAID = $UrAnswer['answerID'];
                $flag = 1;
            } else {
                $UrAnswer = "";
                $UrAID = -1;
            }
        } else {
            $UrAnswer = "";
            $UrAID = -1;
        }
        echo "
            <div class='card'>
            <div class='top' style='background-color:$colorHex;'>
                <ul>
                    <li class='card_profile'>
                        <img src='users/profile_pics/$picPos' alt=''>
                    <li>
                        <ul>
                            <li class='card_username'><a href='profile.php?p=$ID' style='color:white'>$fullName</a></li>
                            <li class='card_aboutme'>$abMe</li>
                        </ul>
                    </li>
                </ul>   
            </div>
            <div class='AnsButton' style='background-color:$colorHex;'>
                <a class='cardOptions SubAns'><i class='fa fa-reply'></i></a>
            </div>
            <div class='answerClass' style='background-color:$colorHex;'>
                <form action='home.php' method='post'>
                    <textarea name='UserAnswer' rows='4'>$UrAnswer</textarea>
                    <input style='display:none' type='text' name='QID' value='$quesID'>
                    <input style='display:none' type='text' name='flag' value='$flag'>
                    <input style='display:none' type='text' name='answID' value='$UrAID'>
                    <button type='submit' name='SubAns[]'>Submit Answer</button>
                    <button type='button' name='cancelAns' >Cancel</button>
                </form>
            </div>
            <div class='card_question'>
                <a href='answers.php?q=$ques'>$ques</a>
            </div>";
        
        $query4 = "SELECT answerID FROM question_has_answer WHERE questionID='$quesID' ORDER BY ID DESC LIMIT 1";
        $getAnsID = mysqli_query($con, $query4);
        $num_rows = mysqli_num_rows($getAnsID);
        if($num_rows > 0) {
            $getAnsIDTemp = mysqli_fetch_array($getAnsID, MYSQLI_ASSOC);
            $getAnsID = $getAnsIDTemp['answerID'];
            $query5 = "SELECT * FROM answers WHERE answerID='$getAnsID'";
            $getAns = mysqli_query($con, $query5);
            $getAnswerTemp = mysqli_fetch_array($getAns, MYSQLI_ASSOC);
            $getAnswer = $getAnswerTemp['answer'];
            $votes = $getAnswerTemp['upVoteCount'];
            
            $query6 = "SELECT userID FROM user_has_answers WHERE answerID = '$getAnsID'";
            $getAnsUser = mysqli_query($con, $query6);
            $getAnsUserTemp = mysqli_fetch_array($getAnsUser, MYSQLI_ASSOC);
            $getAnsUser = $getAnsUserTemp['userID'];
            
            $query7 = "SELECT * FROM user WHERE userID = '$getAnsUser'";
            $getAnsUserNameTemp = mysqli_query($con, $query7);
            $getAnsUserName = mysqli_fetch_array($getAnsUserNameTemp, MYSQLI_ASSOC);
            
            $AnsUser = $getAnsUserName['firstName']." ".$getAnsUserName['lastName'];
            $AnsUID = $getAnsUserName['email'];
            
            $query8 = "SELECT answerID FROM question_has_answer WHERE questionID='$quesID'";
            $getNumAns = mysqli_query($con, $query8);
            $num = mysqli_num_rows($getNumAns);
            
            
            echo "

            <div class='totalAns' style='color:gray'>$num Answers to this question.</div>
            <div class='card_answer'>
                <div class='userAnswer'><a href='profile.php?     p=$AnsUID'>$AnsUser</a></div>
                    $getAnswer
            </div>
            <form action='voteit.php?v=$getAnsID' method='post'>
                <button type='submit' name='voteIt' style='background-color:$colorHex;'>Vote It!</button>
                $votes so far
            </form>
        </div>
        ";
        }
        else {
            echo " <div class='card_answer'>
                    <div class='userAnswer' style='color:gray'>
                        No answers yet. Be the first one!
                     </div>
                    </div>
                    </div>";
        }
        
}
                
?>  
    </div>
    </div>
    <aside>
        <div id="card_question" style="width:100%; height:75px; background-color:<?php echo"$colorHex";?>;color:white;line-height:75px;font-size:24px;left:5px;">
                &nbsp; &nbsp;Trending
            </div>
            
            <div id="card_answer">
                <div id="userAnswer">
                    <ul style="line-height:40px; color: <?php echo"$colorHex";?>;">
                        <li>&nbsp; &nbsp;Bollywood</li>
                        <li>&nbsp; &nbsp;India</li>
                        <li>&nbsp; &nbsp;Computer Science</li>
                    </ul>
                </div>
            </div>
	</aside>            
     
<?php include("./inc/footer_login.inc.php");?>