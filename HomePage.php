<?php  

require "function.php"; 

$errors = array(); 


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup']))   
{

	$errors = signup($_POST);

	if(count($errors) == 0) 
	{
		header("Location:  HomePage.php");
		die;
	}
    else{
        header("Location: Error.php"); // decided to create an error page for both login and signup, if I remove this else, the error would just appear at the top of the page
        die; //  I could of put header location error.php with the spot that counts errors but I wanted to show what its like without it getting redirected
    }

}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: profile.php");
		die;
	}
    else{
        header("Location: Error.php"); 
        die;
    }

}

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

<!-- If an error is found when signing up or logining in, it will print at the top of the page -->
        <!-- this if statement is looking for errors when the user signs up or logs in -->
        <!-- if errors are found in this loop, the errors will print at the top of the page -->   
         
		<?php if(count($errors) > 0):?>    <!--if errors are greater than 0, then there are errors -->
		    <?php foreach ($errors as $error):?>  
			    <?= $error?> <br> <!-- ?= is as good as saying php echo , br makes sure each error is on a seperate line-->                                    
			<?php endforeach;?>
		<?php endif;?>

        <!--Navbar Section-->
        <nav class="navbar">
            <div class="navbar__container">
                <a href="#create" class="navbar__logo">FLOW</a>
                <div class="navbar__toggle mobile-menu">
                    <!--Hamburger-->
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <!--*************-->
                </div>
                <ul class="navbar__menu">
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

                        <!-- Button to open the login form -->
                        <a onclick="document.getElementById('login').style.display='block'" class="button">Login</a>

                        <!-- The login form -->
                        <div id="login" class="login">
                           
                            <form class="login__content animate" method="post">
                                <h1>Login</h1>
                                <div class="imgcontainer">

                                    <!--X to close the form-->
                                    <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Login">&times;</span> 
                                </div>
                                <hr>

                                <div class="login__container">
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" class="submit" name="login" >Login</button>  <!-- added name="login" so I could have more than one post method-->
                                </div>

                            </form>
                        </div>

                    </li>

                    <li class="navbar__btn">
                        
                        <!-- Button to open the Sign up form -->
                        <a onclick="document.getElementById('signup').style.display='block'" class="button">Sign Up</a>

                        <!-- The Sign up form -->
                        <div id="signup" class="signup">

                            <form class="signup__content animate"  method="post">
                                <h1>Sign Up</h1>
                                <div class="imgcontainer">
                    
                                    <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Signup">&times;</span> 
                                </div>
                                <hr>

                                <div class="signup__container">
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="email" name="email2" placeholder="Confirm Email" required>
                                    <input type="text" name="username" placeholder="Username" required>
                                    <input type="password" name="password" placeholder="Password"  required>
                                    <input type="password" name="password2" placeholder="Confirm Password" required>
                                    <p></p>
                                    <button type="submit" class="submit" name="signup" >Sign Up</button> <!-- added name="signup" so I could have more than one post methods-->
                           
                                </div>
                        
                            </form>

                        </div>
                        
                    </li>

                </ul>
            </div>
        </nav> <!--End of navbar section-->

        <!--Create Section-->
        <div class="create" id="create"> <!-- when I click on the href #create in the navbar selection, it takes me here because of Id = "create" Id selector is a #-->
            <div class="create__container">
                
                <button class="create__btn"><a onclick="document.getElementById('login').style.display='block'">Create</a></button>
            </div>
        </div>

        <!--About Section-->
        <div class="about" id="about">
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
        <!--  Was going to have a search bar to look for different user creations but I couldn't get the image to save to the database in time
        <div class="community">
            <h1>Community</h1>
            <form class="action" action="actionPage.php"> 
                <input type="text" name="search" placeholder="Search.."> -->  <!--Search bar with search iron image-->
          <!--  </form>
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












