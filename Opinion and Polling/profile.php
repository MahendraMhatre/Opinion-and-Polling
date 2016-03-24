
<?php include("./inc/header.inc.php");?>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/profile.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css"  href="css/profile.css"/>
<title>Profile - Sensa</title>
<?php include("./inc/headerMenu.inc.php"); ?>
<style>
    .control_button div:nth-child(2) {
        background-color: <?php echo"$colorHex";?>;
    }
    .menu ul li:hover { 
        background-color: <?php echo"$colorHex";?>;
        opacity: .5;
    }
    .menu, #interest_side_div {
        background-color: <?php echo"$colorHex";?>;
        
    }
    .menu .avatar {
        background-color: <?php echo"$colorHex";?>;
    }
    
</style>
<?php 
    if($uname) {
        } 
else {
    echo "Please log in to continue";
}

?>
<?php 
$submit = @$_POST['submit'];
$name = strip_tags(@$_POST['name']);
$dob = strip_tags(@$_POST['born']);
$gen = strip_tags(@$_POST['gender']);
$coun = strip_tags(@$_POST['country']);
$ABMe = strip_tags(@$_POST['aboutMe']);
$nameArray = explode(" ", $name, 2);

if ($submit) {
    $query = "UPDATE user SET firstName = '$nameArray[0]', lastName = '$nameArray[1]', birthday = '$dob', gender = '$gen', country = '$coun', aboutMe = '$ABMe' WHERE email = '$uname'";
    mysqli_query($con, $query);
    header('location:profile.php?p='.$uname);
}
?>

<?php

//Check whether the user has uploaded a profile pic or not
 if(isset($_GET['p'])) {
    $pvalue = mysqli_real_escape_string($con, $_GET['p']);
    if($uname == $pvalue) {

        $query_pic="SELECT * FROM user WHERE email='$uname'";
        $check_pic = mysqli_query($con,$query_pic);
        $get_pic = mysqli_fetch_assoc($check_pic);
        $profile_pic_db = $get_pic['picURL'];
        $daOB = $get_pic['birthday'];
        $gen = $get_pic['gender'];
        $eM = $get_pic['email'];
        $uID = $get_pic['userID'];
        $coun = $get_pic['country'];
        $abMe = $get_pic['aboutMe'];
        $fullName = $get_pic['firstName']." ".$get_pic['lastName'];
        $profileAdd = explode("/", $profile_pic_db);
        $profile_pic = "users/profile_pics/".$profile_pic_db;
        
        if (isset($_FILES['profilepic'])) {
            if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 6048576)) {
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $rand_dir_name = substr(str_shuffle($chars), 0, 15);
                mkdir("users/profile_pics/$rand_dir_name");
                if (file_exists("users/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"])) {
                    echo @$_FILES["profilepic"]["name"]." Already exists";
                }
                else {
                    move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"users/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
                //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
                    $profile_pic_name = @$_FILES["profilepic"]["name"];
                    $pic_query="UPDATE user SET picURL='$rand_dir_name/$profile_pic_name' WHERE email='$uname' ";
                    $get_pass=mysqli_query($con,$pic_query);

           
         
                } 
            }
            else {
                echo "Invailid File! Your image must be no larger than 5MB and it must be either a .jpg, .jpeg, .png or .gif";
                
            }
            header("location:profile.php?p=$uname");
        }
                
                
                         echo "<div class='main_div'>
    <nav class='menu' tabindex='0'>
	   <div class='smartphone-menu-trigger'></div>
       <header class='avatar'>
            <form action='' method='POST' enctype='multipart/form-data' style='z-index: 4'>
		      <div class='profi' style='background: url(\"";
        echo "$profile_pic";
            echo "\") no-repeat center; background-size: cover'><!--<img src='$profile_pic' alt='profile_pic' />-->
                <i class = 'fa fa-upload'></i>
                <input type='file' name='profilepic' style='display:none' id='fiUp' />
              </div>        
            <div id='button_div'>
                <div id='upload_button'>
                        <input type='submit' name='uploadpic' style='display:none'>
                    
                </div>
            </div>
                </form>
            <div id='name_div'>
                <h2 id='user_name'>$fullName</h2>
            </div>
        </header>
	   <ul>
            <li tabindex='0' class='icon-users'><span>About me</span></li>
            <li tabindex='0' class='icon-interests'><span>Interests</span></li>
            <li tabindex='0' class='icon-dashboard'><span>Activity Feed</span></li>
            <li tabindex='0' class='icon-settings' onclick='location.href=\"Settings.php\"'>Settings</li>
        </ul>
    </nav>
        <div class='helper' id='personal_div'>
            <p id='tag_line'>\"$abMe\"</p>
	       <form action='profile.php' method='post'>
                <div class = 'text_div' id='abe'>
                   <i class='fa fa-info'></i>
                   <input id='abMe' type='text' name='aboutMe' value='$abMe' /></div>
                <div class = 'text_div' >
                   <i class='fa fa-user'></i>
                   <input id='name' type='text' name='name' readonly='readonly' value='$fullName' /></div>
                <div class = 'text_div' >
                    <i class='fa fa-calendar'></i>
                    <input id='born' type='date' name='born' readonly='readonly' value='$daOB' /></div>";
//                <div class = 'text_div' >
//                    <i class='fa fa-male'></i>
//                    <input id='gender' type='text' name='gender' readonly='readonly' value='$gen'></div>
    if ($gen == 'Female') {
        echo        "<div class = 'text_div' id='dropdown'>
                    <i class = 'fa fa-male'></i>
                    <select name = 'gender' id='gender' disabled>
                        <option value = 'Male'>Male</option>
                        <option value = 'Female' selected>Female</option>
                    </select>
                </div>";
    } else {
        echo        "<div class = 'text_div' id='dropdown'>
                    <i class = 'fa fa-male'></i>
                    <select name = 'gender' id='gender' disabled>
                        <option value = 'Male' selected>Male</option>
                        <option value = 'Female'>Female</option>
                    </select>
                </div>";
    }
                
    echo        "<div class = 'text_div' id='dropdown'>
                    <i class='fa fa-globe'></i>
                    <select name='country' id='country' disabled>";
    $query_coun="SELECT Name FROM countries";
    $check_coun = mysqli_query($con,$query_coun);
    while($countries = mysqli_fetch_assoc($check_coun)) {
        $c = $countries['Name'];
        if ($c == $coun) {
            echo        "<option value='$c' selected>$c</option>'";
        } else {
            echo        "<option value='$c'>$c</option>'";
        }
        
    }
        echo        "</select>
                </div>";
    echo        "<div id = 'textDiv'>
                    <i class='fa fa-envelope'></i>
                    <input id='email_id' type='email' name='email_id' readonly='readonly' value='$eM'></div>
                
                <input type='Button' name='edit' value='Edit' id='edit_button' class='profile_button' /> 
                <input name='submit' type='submit' value='Submit' id='submit_button' style='display:none' class='profile_button' /> 
            </form>
        </div>
        <div id='interest_main' style='display:none'>
        <div id='interests_div'  >
            <p id='tag_line'>Choose Your Interests</p>
            <div class='part' id='part1'>
                <div class='control_section'>
                    <div  id='music' class='button_base control_button'>
                        <div>Music</div>
                        <div>Music</div>
                    </div>
                </div>
                <div class='control_section'>
                    <div class='button_base control_button'>
                        <div>Sports</div>
                        <div>Sports</div>
                    </div>
                </div>
                <div class='control_section'>
                    <div class='button_base control_button'>
                        <div>Photography</div>
                        <div>Photography</div>
                    </div>
                </div>
            </div>
        <div class='part' id='part2'>
            <div class='control_section'>
                <div  id='music' class='button_base control_button'>
                    <div>Cricket</div>
                    <div>Cricket</div>
                </div>
            </div>
            <div class='control_section'>
                <div class='button_base control_button'>
                    <div>Places</div>
                    <div>Places</div>
                </div>
            </div>
            <div class='control_section'>
                <div class='button_base control_button'>
                    <div>Fashion</div>
                    <div>Fashion</div>
                </div>
            </div>
        </div>
        <div class='part' id='part3'>
            <div class='control_section'>
                <div  id='music' class='button_base control_button'>
                    <div>Technology</div>
                    <div>Technology</div>
                </div>
            </div>
            <div class='control_section'>
                <div class='button_base control_button'>
                    <div>History</div>
                    <div>History</div>
                </div>
            </div>
            <div class='control_section'>
                <div class='button_base control_button'>
                    <div>Relationships</div>
                    <div>Relationships</div>
                </div>
            </div>
        </div>
            </div>
        <div id='interest_side_div'>
            <h2 id='tag_line' style='color:white'>Your Interests</h2>
            <div id='your_interest'></div>
        </div>
        </div>";
                
    }//if v=?
    else {
        $query_pic="SELECT * FROM user WHERE email='$pvalue'";
        $check_pic = mysqli_query($con,$query_pic);
        $get_pic = mysqli_fetch_assoc($check_pic);
        $profile_pic_db = $get_pic['picURL'];
        $daOB = $get_pic['birthday'];
        $gen = $get_pic['gender'];
        $eM = $get_pic['email'];
        $coun = $get_pic['country'];
        $abMe = $get_pic['aboutMe'];
        $fullName = $get_pic['firstName']." ".$get_pic['lastName'];

        if ($profile_pic_db == "") {
            $profile_pic = "assets/Symbol-Blue.png";
        }
        else {
            $profile_pic = "users/profile_pics/".$profile_pic_db;
        }
        
        echo "<div class='main_div'>
    <nav class='menu' tabindex='0'>
	   <div class='smartphone-menu-trigger'></div>
        <header class='avatar'  style='background-color:$colorHex;'>
        <div class='profi' style='background: url($profile_pic) no-repeat center; background-size: cover'></div>
         
        
          </span>
                
            <div id='name_div'>
                <h2 id='user_name'>$fullName</h2>
            </div>
        </header>
	   <ul>
            <li tabindex='0' class='icon-users'><span>About me</span></li>
        </ul>
    </nav>
        <div class='helper' id='personal_div'>
            <p id='tag_line'>\"$abMe\"</p>
	       <form action=''>
               <div class = 'text_div' >
                   <i class='fa fa-user'></i><input id='name' type='text' name='name' readonly='readonly' value='$fullName'></div>
                <div class = 'text_div' >
                    <i class='fa fa-calendar'></i>
                    <input id='born' type='text' name='born' readonly='readonly' value='$daOB' /></div>
                <div class = 'text_div' >
                    <i class='fa fa-male'></i>
                    <input id='gender' type='text' name='gender' readonly='readonly' value='$gen'></div>
                <div class = 'text_div' >
                    <i class='fa fa-envelope'></i>
                    <input id='email_id' type='email' name='email_id' readonly='readonly' value='$eM'></div>";
                if($coun != "") {
                    echo "<div class = 'text_div' >
                    <i class='fa fa-globe'></i>
                    <input id='country' type='text' name='country' readonly='readonly' value='$coun'></div>";
                }
        echo "</form>";
    }
    if($uname == $pvalue) {
        $act_query = "SELECT * FROM user_has_questions WHERE userID='$uID'";
        $Q1 = mysqli_query($con, $act_query);
        $num = mysqli_num_rows($Q1);
        if($num > 0) {
            while($A1 = mysqli_fetch_array($Q1)) {
                $questionID = $A1['questionID'];
                $act_query3 = "SELECT question FROM questions WHERE questionID = '$questionID'";
                $Q3 = mysqli_query($con, $act_query3);
                $A2 = mysqli_fetch_assoc($Q3);
                $question = $A2['question'];
                $act_query2 = "SELECT answerID FROM  question_has_answer WHERE questionID = '$questionID'";
                $Q2 = mysqli_query($con, $act_query2);
                $ansC = mysqli_num_rows($Q2);
                echo"<div id='activity_div'>
                    <h2>Your Activity</h2>
                    <div id='allQ'>
                        <div class='aCard'>
                            <div class='topQ'  style='background-color:$colorHex;'>  
                                <a href='answers.php?q=$question'>$question</a>
                            </div>";
                if($ansC > 1) {
                    echo   "<div class='answerCounts'>
                                <div class='userAnswer'     style='color:gray'>
                                    $ansC answers to this question.
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>";
                } elseif($ansC == 0) {
                    echo   "<div class='answerCounts'>
                                <div class='userAnswer'     style='color:gray'>
                                    No answers yet.
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>";
                } elseif($ansC == 1) {
                    echo   "<div class='answerCounts'>
                                <div class='userAnswer'     style='color:gray'>
                                    $ansC answers to this question.
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>";
                }
            }
        } else {
            echo"<div id='activity_div1'>
                No Activity Yet. 
                Press '+' to add a new question.
                </div>";
        }
        
    }
    echo "</div>";
 }
    
?>   

<?php 
 
 $submit_profile=@$_POST['submit_profile'];
 //to do check if the fields are empty then user should not be able to submit
 $fname=@$_POST['firstname']; 
 $lname=@$_POST['lastname'];   
 if($submit_profile) {
         $profile_query="UPDATE user SET firstName='$fname' , lastName='$lname' WHERE email = '$uname'";
         $get=mysqli_query($con,$profile_query);
         echo "Congratulation your data is updated";
         header("Location:profile.php");
}
else {
              
            $query1="SELECT * FROM user WHERE email='$uname' ";
              $getp=mysqli_query($con,$query1);
 
              while($row = mysqli_fetch_array($getp,MYSQLI_ASSOC) ) {
                $fname=$row['firstName'];
                $lname=$row['lastName'];
              } 
}

      

?>

</div>

        <footer>
            <div>
                <p>&copy; 2016 Sensa</p>
            </div>     
        </footer>
    </body>
</html>