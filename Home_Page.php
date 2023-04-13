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
        <?php require_once('nav.php');?>  
        
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
