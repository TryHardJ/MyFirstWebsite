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
        <link rel="stylesheet" href="SimplePaintApp.css" />

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

                <a href="profile.php" class="navbar__logo">FLOW</a>
                <div class="navbar__toggle mobile-menu">
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
                        <a href="UserSimplePaintApp.php" class="navbar__links create-page">Create</a>
                    </li>
                    <li class="navbar__item">
                        <a href="profile.php#about" class="navbar__links about-page">About</a>
                    </li>
                   <!-- <li class="navbar__item">
                        <a href="profile.php#community" class="navbar__links community-page">Community</a>
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

        <div class="field">
            <canvas id="canvas" class="canvas"></canvas> 
            <div class="tools">
                <button onClick="undo_last()" type="button" class="button">Undo</button>
                <button onClick="clear_canvas()" type="button" class="button">Clear</button>
                <button onClick="download()" type="button" class="button">Download</button>

                <div onClick="change_color(this)" class="color-field" style="background: red;"></div>
                <div onClick="change_color(this)" class="color-field" style="background: blue;"></div>
                <div onClick="change_color(this)" class="color-field" style="background: green;"></div>
                <div onClick="change_color(this)" class="color-field" style="background: yellow;"></div>

                <input onInput="draw_color = this.value" type="color" class="color-picker">
                <input type="range" min="1" max="100" class="pen-range"
                    onInput="draw_width = this.value">
            </div>
        </div>

    </body>

    <script src="SimplePaintApp.js"></script>


</html>