<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
/*
if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
}
*/

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Petaluma</title>

    <link rel="stylesheet" href="Home_Page.css">


  </head>
  <body>
        <div class = "navtop">
            <ul>          
                <?php if (isset($_SESSION['loggedin'])) { ?>      
                    <li><a href="attractions.php">Attractions</a></li>
                    <li><a href="Ticket_Booth.php">Ticket Booth</a></li>
                    <li><a href="getParking.php">Get Parking</a></li>
                <?php } ?>
                <?php if (!isset($_SESSION['loggedin'])) { ?>
                    <li style="float:right"><a href="Login_Member.html">Member Login/Register</a></li>
                <?php } ?>                   
                <li style="float:right"><a href="Login_Admin.html">Admin Login</a></li>
                <li style = "float:right"><a href="Profile_Member.php"><i class="fas fa-user-circle"></i>Profile</a></li>
                <?php if (isset($_SESSION['loggedin'])) { ?>
				    <li style = "float:right"><a href="Logout_Member.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                <?php } ?>
            </ul>
        </div>
        
        <div class="content">
            <?php if (isset($_SESSION['loggedin'])) { 
	                echo "<p>Welcome back, " . $_SESSION['name'] . "</p>"; } ?>
		</div>
        
    </body>
  <body>
    <section class="blue">
      <h1>Petaluma</h1>
      <p>A theme park web app designed for you.</p>
      <div class="blob"></div>
      
    </section>

    <head>
        <title>Petaluma ThemePark Database</title>
        <link rel="stylesheet" href="test.css">
        <link rel="shortcut icon" type="image/x-icon" href="tab.ico" />
    </head>
    

    <section>
        <div class="wave1">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"
              ></path>
            </svg>
          </div>


          <div class="content update">
        <div class="parent" style="margin-top:100px">
            <div class="category-container">
                
                <div class="portal-category">
                    <div class="category-image">
                        <img src="attractions.png">
                    </div>
                    <div class="category-info">
                        <h2 class="category-name">Petaluma Wheel</h2>
                        <p class="category-description"></p>
                    </div>
                </div>
                <div class="portal-category">
                    <div class="category-image">
                        <img src="Parking.png">
                    </div>
                    <div class="category-info">
                        <h2 class="category-name">Petaluma Speedway</h2>
                        <p class="category-description"></p>
                    </div>
                </div>
                <div class="portal-category">
                    <div class="category-image">
                        <img src="Restaurant.png">
                    </div>
                    <div class="category-info">
                        <h2 class="category-name">Petaluma Aqua</h2>
                        <p class="category-description"></p>
                    </div>
                </div>
                <div class="portal-category">
                    <div class="category-image">
                        <img src="Gift.png">
                    </div>
                    <div class="category-info">
                        <h2 class="category-name">Petaluma Putt-Putt</h2>
                        <p class="category-description"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="bubble">
    </section>

    <section class="dark">
    </section>

    <section class="red">

      <div class="wave2">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            class="shape-fill"
          ></path>
        </svg>
      </div>
    </section>

    <div class="spacer layer1"></div>

    <section>

    </section>

    <div class="spacer layer2 flip"></div>

    <section class="pink">
    
    </section>

    <div class="spacer layer2"></div>

    <section class="blobs">

    </section>
  </body>
</html>
