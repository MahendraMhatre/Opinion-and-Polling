<?php include("./inc/header_login.inc.php");?>
<?php
session_destroy();
echo "Your account has been successfully deactivated!";
echo "<br><a href='logIn.php'>Nah! Log back in</a>";
?>