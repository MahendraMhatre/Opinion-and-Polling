<?php include("./inc/header_login.inc.php");?>
<?php
    $submit = @$_POST['submit'];
//Getting Form elements.
    $fname = strip_tags(@$_POST['fname']);
    $lname = strip_tags(@$_POST['lname']);
    $username = strip_tags(@$_POST['userName']);
    $pwd = strip_tags(@$_POST['password']);
    $pwd2 = strip_tags(@$_POST['rep_password']);    //date of sign up
    $email = strip_tags(@$_POST['eID']);
    $dob = strip_tags(@$_POST['dob']);
    $gender = strip_tags(@$_POST['gender']);
    


//Post registration
if ($submit) {
    //if user has entered his firstname and last name 
   $query = "SELECT email FROM user WHERE email='$email'"; 
   $re=mysqli_query($con,$query);
    if(mysqli_num_rows($re)==0) {
        if($fname && $lname && $email && $pwd && $pwd2 && $gender) {
            if($pwd == $pwd2)   {
                $pwd = md5($pwd);
                $query ="INSERT INTO user(email,password,firstName,lastName, birthday, gender) VALUES ('$email','$pwd','$fname','$lname','$dob', '$gender')";
                mysqli_query($con,$query);
                
                $birthdate = new DateTime($dob);
                $today = new DateTime('today');
                $age = $birthdate->diff($today)->y;
                
                if ($gender == 'Female') {
                    $profile_pic_name = "assets/Female.png";
                    $pic_query="UPDATE user SET picURL='$profile_pic_name', age='$age' WHERE email='$email' ";
                    mysqli_query($con,$pic_query);
                    
                }
                else {
                    $profile_pic_name = "assets/Male.png";
                    $pic_query="UPDATE user SET picURL='$profile_pic_name', age='$age' WHERE email='$email' ";
                    mysqli_query($con,$pic_query);
                }
                die("<h2>Welcome to Sensa</h2>Login to your account to get started ...<a href='logIn.php'>Log IN</a><br>");
                
            }
            else    {
                $toShow = 1;
                $retval = "Your passwords don't match!";
            }
        }
        else {
            $toShow = 1;
            $retval = "All fields should be filled.";
        }
    }
    else {
        $toShow = 1;
        $retval = "user already exist";
    }
}

//login code
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login=$_POST["user_login"];
    $password_login =strip_tags(@$_POST['password_login']);
	$md5password_login = md5($password_login);
    $query = "SELECT * FROM user WHERE email='$user_login' AND password='$md5password_login'"; // query the person
    $userCount =mysqli_query($con,$query);//Count the number of rows returned
    
    if(mysqli_num_rows($userCount)>0){
     
       while($row = mysqli_fetch_array($userCount,MYSQLI_ASSOC)){ 
             $uid = $row["userID"];
       }
       
         $_SESSION["userID"] = $uid;
		 $_SESSION["user_login"] = $user_login;
		 header("location:home.php");
         exit();
   }
    else {
        $toShow = 1;
        $retval = "The information is incorrect";
    }
}

?>



	<body id="login_body">
        <div id="blurr"></div>
        <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
            <iframe id="video" frameborder="0" height="100%" width="100%" src="https://youtube.com/embed/FtICi4lc27Q?autoplay=1&controls=0&showinfo=0&autohide=1&loop=1&playlist=FtICi4lc27Q&wmode=transparent" allowfullscreen>
            </iframe>
        </div>
        
        
        
        
        
        
        
        <img id="logo" src="assets/logo.png" alt="logo of Sensa.">
        
        <p id="tagline"><span id="different1">Different</span> <span id="people">People</span> <span id="have">Have</span> <span id="different2">Different</span> <span id="opinions">Opinions</span></p>
        
        <div class="login">
            <h4>Welcome</h4>
            <?php if ($toShow == 1) { ?>
            <div style="color:#F44336; font-family:Roboto; font-size:20px"><?php echo "$retval"; $toShow = 0;?></div><?php } ?>
            <form action="logIn.php" method="post">
                <input class="loginInput" id="username" type="text" name="user_login">
                <input class="loginInput" id="password" type="password" name="password_login">
                
                <input class="loginInput" id="login_button" type="submit" name="log" value="Log In">
            </form>
            <p id="or">  Or</p>
           <br>
            <p id="continue" style="cursor:pointer">Continue with Email</p>
        
        </div>
        <div class="signup">
            <h4>Sign Up!</h4>
            <div id="passDM">Passwords do not match</div>
            <form action="logIn.php" method="post">
                <input class="loginInput" type="text" name="fname" style="width:49%" placeholder="First Name" />
                <input class="loginInput" type="text" name="lname" style="width:49%" placeholder="Last Name" />
                <input class="loginInput" type="text" name="eID" placeholder="E-mail ID" />
                <input class="loginInput" type="password" name="password"  placeholder="Password" />
                <input class="loginInput" type="password" name="rep_password" placeholder="Confirm Password" />
                <input type="date" name="dob" style="width:150px"  /><br>
                <input class="loginInput" type="radio" name="gender" value="Male" id="male" checked>
                <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
                <input class="loginInput" type="radio" name="gender" value="Female" id="female">
                <label for="female">Female</label>
                <input class="loginInput" type="submit" name="submit" value="Register">
                <p id="already_user">Already a user?</p>
            </form>
        </div>
        <div id="quotesection" >
            <p id="quote">"Everything we hear is an opinion, not a fact. Everything we see is a perspective, not the truth."</p><br>
            <p id="author">-Marcus Aurelius</p>
        </div>
        
         <script type="text/javascript">
            $(document).ready(function(){
                $("#continue").click(function(){
                    $(".signup").toggle("slow","swing"); 
                    $(".login").toggle("slow","swing");
                });
                
                $("#already_user").click(function(){
                    $(".signup").toggle("slow","swing"); 
                    $(".login").toggle("slow","swing");
                });
            });
        </script>
<?php include("./inc/footer_login.inc.php");?>
		
       
	