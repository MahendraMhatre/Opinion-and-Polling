 
<?php include("./inc/header.inc.php");?>
<title>Ask - Sensa</title>
<link rel="stylesheet" type="text/css"  href="css/askQ.css"/>
<script src="js/askQ.js"></script>
<?php include("./inc/headerMenu.inc.php"); ?>
<?php
if($uname) {
        
    } 
else {
    header('location:logIn.php');
}

$query4 ="SET foreign_key_checks=0";
mysqli_query($con,$query4);

$submit=@$_POST['subQ'];
 

if($submit) { 
    $pvalue=@$_POST['question']; 
  $query ="INSERT INTO questions(question) VALUES ('$pvalue')";
   if(mysqli_query($con,$query)) {

  $query1 ="SELECT * FROM questions WHERE question='$pvalue'";
  $ans1=mysqli_query($con,$query1);
  while($row = mysqli_fetch_array($ans1,MYSQLI_ASSOC)){ 
             $qid = $row["questionID"];
       }
    
  $query2 ="SELECT * FROM user WHERE email='$uname'";
  $ans2=mysqli_query($con,$query2);
  while($row = mysqli_fetch_array($ans2,MYSQLI_ASSOC)){ 
             $usid = $row["userID"];
       }
    
    
  $query3 ="INSERT INTO user_has_questions(questionID,userID) VALUES ('$qid','$usid')";
  if(mysqli_query($con,$query3)) {
      
  }
     else {
        die('error on query 2' . mysqli_error($con));
     } 
   
   }
       else {
    die('error on query 1'. mysqli_error($con));
}       
$query4 ="SET foreign_key_checks=1";
mysqli_query($con,$query4);       
header('location:home.php'); 

}

?>

<?php
$submit1=@$_POST['subS'];

if($submit1) { 
    
    $svalue=@$_POST['survey'];  
    $stime=@$_POST['time'];  
    $value=$_POST['timevalue'];
    date_default_timezone_set("America/Los_Angeles");
    $d1= date("Y-m-d H:i:s");
    $d2 =new DateTime($d1);
    $d2->add(new DateInterval("P".$stime.$value));
    $d3=$d2->format("Y-m-d H:i:s");
    $query1="INSERT INTO survey(sQuestion,timeOut) VALUES ('$svalue','$d3')";
    mysqli_query($con,$query1);


  $query2 ="SELECT * FROM survey WHERE sQuestion='$svalue'";
  $ans2=mysqli_query($con,$query2);
  while($row = mysqli_fetch_array($ans2,MYSQLI_ASSOC)){ 
             $sid = $row["surveyID"];
       }
  
    
  $query3 ="SELECT * FROM user WHERE email='$uname'";
  $ans3=mysqli_query($con,$query3);
  while($row = mysqli_fetch_array($ans3,MYSQLI_ASSOC)){ 
             $usid = $row["userID"];
       }
    
    $query3 ="INSERT INTO user_has_survey(userID,surveyID) VALUES ('$usid','$sid')";
   mysqli_query($con,$query3);
    header('location:home.php');


}




?>
<style>
    .card {
        min-height: 570px;
        margin-top: 95px;
        margin-bottom: 50px;
    }
</style>
<section class="main_content">
<!--        <div id="cards">-->
            <div class="card">
            <div id="options" style='background-color: <?php echo"$colorHex";?>;'>
                Ask a Question
<!--
                <button type="button" name="question" value="question" autofocus>Ask a Question</button>
                <button type="button" name="survey" value="survey">Start a Survey</button>
-->
            </div>
            <div id="question">
                <form action="askQ.php" method="post">
                    <h3>Question</h3>
                    <div class="divBox">
                    <input type="text" name="question" style="width:100%;line-height:47px;"/>
                    </div>
                    <br>
                    <h3>A short description</h3>
                    <div id="titleDesc" class="divBox" contenteditable="true">
                    </div>
                    <input type="text" name="titleDesc" style="display:none" />
                    
                    <br>
                    <h3>Relevant Tags</h3>
                    <div class="divBox" contenteditable="true">
                    </div>
                    
                    <br>
                    <input style='background-color:<?php echo"$colorHex";?>;' type="submit" name="subQ" value="Post Question">
                </form>
            </div>
<!--            </div>-->
<!--
            <div id="survey">
                <br>
                <form action="askQ.php" method="post">
                    <h3>What would you like to survey about?</h3>
                    <div class="divBox" contenteditable="true">
                        <input type="text" name="survey" style="width:100%;line-height:47px;"/>
                    </div>
                    <br>
                    <h3>Relevant tags</h3>
                    <div class="divBox" contenteditable="true">
                    </div>
                    <br>
                    <h3 style="margin-left: 30%;">Set Time Frame</h3>
                    <br>
                    <div class="divBox" style="border:none; text-align: center">
                        <input type="text" name="time" >
                        <select name="timevalue">
                            <option value="D">Day(s) </option>
                            <option value="M">Month(s)</option>
                            <option value="indef">Timeless</option>
                        </select>
                    </div>
                    <br>
                    <input style='background-color:<?php echo"$colorHex";?>;' type="submit" name="subS" value="Take a Survey!">
                </form>
            </div>
        </div>    
-->
            <aside>
        <div id="card_question" style="width:100%; height:75px; background-color:<?php echo $colorHex;?>;color:white;line-height:75px;font-size:24px;left:5px;">
                &nbsp; &nbsp;Trending
            </div>
            
            <div id="card_answer">
                <div id="userAnswer">
                    <ul style="line-height:40px;">
                        <li>&nbsp; &nbsp;Bollywood</li>
                        <li>&nbsp; &nbsp;India</li>
                        <li>&nbsp; &nbsp;Computer Science</li>
                    </ul>
                </div>
            </div>
	</aside>
        </section>

 <?php include("./inc/footer_login.inc.php");?>