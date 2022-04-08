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

}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: profile.php");
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

        <!--Navbar Section-->
        <nav class="navbar">
            <div class="navbar__container">
                <a href="HomePage.php" class="navbar__logo">FLOW</a>
                <div class="navbar__toggle mobile-menu">
                    <!--Hamburger-->
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <!--*************-->
                </div>
                <ul class="navbar__menu">
                    <li class="navbar__item">
                        <a href="HomePage.php#create" class="navbar__links" id="create-page">Create</a>
                    </li>
                    <li class="navbar__item">
                        <a href="HomePage.php#about" class="navbar__links" id="about-page">About</a>
                    </li>
                   <!-- <li class="navbar__item">
                        <a href="HomePage.php#community" class="navbar__links" id="community-page">Community</a>
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
               
                                    <hr>
      
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
                                   
                                    <!--X to close the form-->
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

        <!--Error Section-->
        <div class="error">
            <h1>Error, Try Again!</h1>

            <h2><?php if(count($errors) > 0):?>    <!--if errors are greater than 0, then there are errors -->
		            <?php foreach ($errors as $error):?>  
			            <?= $error?> <br> <!-- ?= is as good as saying php echo , br makes sure each error is on a seperate line-->                                    
			    <?php endforeach;?>
		    <?php endif;?><h2>
        </div>

        <script src="app.js"></script>
    </body>
</html>

