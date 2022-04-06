<?php  

require "function.php"; 
check_login();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Paint application" />
        <title>Flow</title>
        <link rel="stylesheet" href="style.css" />

        <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
        crossorigin="anonymous" 
      />

    </head>
    <body>

        <!--Navbar Section-->
        <nav class="navbar">
            <div class="navbar__container">

                <a href="#create" class="navbar__logo">FLOW</a>
                <div class="navbar__toggle" id="mobile-menu">
                    <!--Hamburger-->
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <!--*************-->
                </div>
                <ul class="navbar__menu">
                    <li class="navbar__item">
                        <p class="navbar__links"><?php if(check_login(false)):?>  <!--Will only show up if the user is logged in -->
		                    Hi, <?=$_SESSION['USER']->username?> <!--Hi username -->
	                    <?php endif;?></p> 
                    </li>
                    <li class="navbar__item">
                        <a href="#create" class="navbar__links" id="create-page">Create</a>
                    </li>
                    <li class="navbar__item">
                        <a href="#about" class="navbar__links" id="about-page">About</a>
                    </li>
                   <!-- <li class="navbar__item">
                        <a href="#community" class="navbar__links" id="community-page">Community</a>
                    </li> -->
                    <li class="navbar__btn">

                        <!-- Button to open the logout form -->
                        <a onclick="document.getElementById('logout').style.display='block'" class="button">Logout</a>

                        <!-- logout form -->
                        <div id="logout" class="logout">
                           
                            <form class="logout__content animate" method="post">
                                <h1>Logout ?</h1>
                                <div class="imgcontainer">

                                    <!--X to close the form-->
                                    <span onclick="document.getElementById('logout').style.display='none'" class="close" title="Close Logout">&times;</span> 
                                </div>
                                <hr>

                                <div class="logout__container">   
                                    <button type="submit" class="submit" name="logout" ><a href="logout.php">Yes</a></button>  <!-- added name="login" so I could have more than one post method-->
                                    <hr>
                                </div>

                            </form>
                        </div>

                    </li>

                </ul>
            </div>
        </nav> <!--End of navbar section-->

        <!--Create Section-->
        <div class="create">
            <div class="create__container">
                <button class="create__btn"><a href="UserSimplePaintApp.php"><span>Create</span></a></button>
            </div>
        </div>

        <!--About Section-->
        <div class="about">
            <h1>About</h1>
            <div class="about__container">
                <div class="about__img--container">
                    <div class="about_img--card"><i class="fas fa-layer-group"></i>
                    <!--Where I added the icon from font awesome--></div>
                </div>
                <div class="about__content">
                    <h2>Create banners, logos, emotes and more for free!</h2>
                    <p>With endless possibilies, add personality to your Youtube/Twitch channel and more....</p>
                </div>
            </div>
        </div>

        <!--Community Section-->

       <!-- <div class="community">
            <h1>Community</h1>
            <form class="action" action="actionPage.php"> 
                <input type="text" name="search" placeholder="Search.."> -->  <!--Search bar with search iron image-->
           <!-- </form>
            <div class="community__wrapper">
                <div class="community__card"><i class="fas fa-users"></i></div>
                <div class="community__card"><i class="fas fa-users"></i></div>
                <div class="community__card"><i class="fas fa-users"></i></div>
                <div class="community__card"><i class="fas fa-users"></i></div>
            </div>
        </div> -->
        
        <script src="app.js"></script>
    </body>
</html>