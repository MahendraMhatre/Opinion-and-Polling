</head>
    
    <body>
        <header class="headerMenu">
          <nav class="navbar">
                <ul>
                  <li id="imageElement"><a href="home.php"><img src="assets/logo.png" alt="Logo"/></a></li>  
                  
                    <li id="searchElement">  
                    <div id="wrap">
                            <input id="search" name="search" type="search" autocomplete="off" spellcheck="false" placeholder="What are we looking for?">
                            <button type="submit" id="search_submit"></button>
                    </div>
                    </li>
                 
<!--                <li id="notifElement"></li>-->
                <li id="addElement" onclick="location.href='askQ.php';"></li>    
                <?php echo "<li id='profElement'><img id='profilepic' alt = 'profile picture' src='users/profile_pics/$profile_pic_db'/> "?>
                    <ul>
                        <li id ="profilePage"><a href ="profile.php?p=<?php echo"$uname" ?>">Profile Page</a></li>
                        <li id = "Logout"><a href="logIn.php">Log Out</a></li>
                    </ul>    
                </li>              
             </ul>
           </nav>
            
        </header>
        <div id="lightbox"></div>
        <div class="searchResults"></div>