<?php include("./inc/header.inc.php");?>
<title>Your Settings - Sensa</title>
<link rel="stylesheet" type="text/css"  href="css/settings.css"/>
 <script src="js/settings.js"></script>
<?php include("./inc/headerMenu.inc.php"); ?>
<section class="main_content">
<?php 
    
if($uname) {
        
    } 
else {
    echo "Please log in to continue";
    header('location:logIn.php');
}
?>
<?php 
    $changeColor = @$_POST['submitColor'];
    $newColor = @$_POST['newColor'];
    
    if($changeColor) {
        $colQuery = "UPDATE user SET color = '$newColor' WHERE email = '$uname'";
        mysqli_query($con, $colQuery);
        header('location:settings.php');
        
    }
?>
<?php
    $send_data=@$_POST['send_data'];
    $eP=@$_POST['eP']; 
    $eP2=@$_POST['eP2'];  
    $query="SELECT * FROM user WHERE email='$uname' ";
    $get_pass=mysqli_query($con,$query);
    $row1 = mysqli_fetch_assoc($get_pass);
    $unameID = $row1['username'];
if($send_data) {
     
     
      while ($row = mysqli_fetch_array($get_pass,MYSQLI_ASSOC)) {
          $pword= $row['password'];
          $pword_md5=md5($eP);
    
          //check if both password are equal    
          if($send_data) {
              $pword_query="UPDATE user SET password='$pword_md5' WHERE email = '$uname'";
              $get=mysqli_query($con,$pword_query);
               echo "Congratulations! Your password has been updated.";
               header("Location:settings.php");
                  
          }
          else {
              
          }
      }
    
 } 
else {
    echo "";
}
$eUID = @$_POST['eU'];
$eUName = @$_POST['eUID'];
if($eUID) {
    
    $user_query = "UPDATE user SET username = '$eUName' WHERE email = '$uname' ";
    $get=mysqli_query($con,$user_query);
    header("location:settings.php");
    echo "Congratulations! Your user name has been updated.";
               header("Location:settings.php");
}

?> 
    <style>
        form {
            display: inline-block;
        }
        .main_content   {
            width: 80%;
            height: inherit;
            background-color: #fff;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 85px;
            margin-bottom: 20px;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0) inset;
        }
    </style>
    <div id="top" style="background-color: <?php echo"$colorHex";?>">
                <p>Settings</p></div>
                <ul>
                    <li id="general" style="background-color: <?php echo"$colorHex";?>">GENERAL</li>
                    <li id="general_child">
                        <ul id="general_tab">
                            <li class="tab">
                                <span class="tabhead">Primary Email ID</span>
                                <span id="eContent"><span id="dynamic_email"><?php echo "$uname";?></span></span>
                                
                            </li>
                            <li class="tab">
                                <span class="tabhead">Username</span>
                                <span id="userContent"><span id="dynamic_user"><?php echo "$unameID";?></span><img src="assets/edit.png" alt="Edit"></span>
                                <span id="editUser">
                                    <form action="" method="POST" enctype="multipart/form-data" style="z-index: 4">
                                        <input type="text" size="30"  name="eUID">
                                        <input type="submit" name="eU" value="Submit" style="display:none">
                                    </form>
                                </span>
                            </li>
                            <li class="tab">
                                <span class="tabhead">Password</span>
                                <span id="passwordContent">Change your password<img src="assets/edit.png" alt="Edit"></span>
                                <div id="editPassword">
                                    <input type="password" size="30" placeholder="Enter password" name="eP">
                                    <br>
                                    <input type="password" size="30" placeholder="Confirm password"  name="eP2">
    <input type="submit" size="10"  value="Save"  name="send_data">
                                </div>
                            </li>
                            <li class="tab">
                                <span class="tabhead">Theme</span>
                                <span id="themeContent">
                                    <form action="" method="post">
                                        <span>
                                            <input type="text" value="#2381C8" style="display:none" name="newColor">
                                            <input type="submit" name='submitColor[]' value=" " id="c_2b9ffa">
                                        </span>
                                    </form>
                                    <form action="" method="post">
                                        <span>
                                            <input type="text" value="#24BBAA" style="display:none" name="newColor">
                                            <input type="submit" name='submitColor[]' value=" " id="c_24bbaa">
                                        </span>
                                    </form>
                                    <form action="" method="post">
                                        <span>
                                            <input type="text" value="#93C73F" style="display:none" name="newColor">
                                            <input type="submit" name='submitColor[]' value=" " id="c_93c73f">
                                        </span>
                                    </form>
                                    <form action="" method="post">
                                        <span>
                                            <input type="text" value="#F99E29" style="display:none" name="newColor">
                                            <input type="submit" name='submitColor[]' value=" " id="c_f99e29">
                                        </span>
                                    </form>
                                    <form action="" method="post">
                                        <span>
                                            <input type="text" value="#FF3155" style="display:none" name="newColor">
                                            <input type="submit" name='submitColor[]' value=" " id="c_ff3155">
                                        </span>
                                    </form>
                            </span>
                            </li>
                        </ul>
                    </li>
                    <li id="account" style="background-color: <?php echo"$colorHex";?>">ACCOUNT</li>
                    <li id="account_child">
                        <ul id="account_tab">
                            <li class="tab">
                                <span class="tabhead"><a href="logout.php">Deactivate my Account</a></span>
                            </li>
                        </ul>
                    </li>
                </ul>
        </section>  
        <?php include("./inc/footer_login.inc.php");?>