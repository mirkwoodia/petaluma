<div class = "navtop">
            <ul>
                <li><a href="Home_Page.php">Home</a></li>
                <li><a href="attractions.php">Attractions</a></li>
                <li><a href="Ticket_Booth.php">Ticket Booth</a></li>
                <?php if (isset($_SESSION['loggedin'])) { ?>      
                  <li><a href="getParking.php">Get Parking</a></li>
                <?php } ?>
                <?php if (!isset($_SESSION['loggedin'])) { ?>
                  <li style="float:right"><a href="Login_Member.php">Member Login/Register</a></li>               
                  <li style="float:right"><a href="Login_Admin.php">Admin Login</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['loggedin'])) { ?>    
                  <li style = "float:right"><a href="Logout_Member.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>            
                  <li style = "float:right"><a href="Profile_Member.php"><i class="fas fa-user-circle"></i>Profile</a></li>
				          
                <?php } ?>
            </ul>
        </div>
