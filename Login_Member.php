<!DOCTYPE html>
<html>

<head>
  <title>Petaluma - Login - Member</title>
  <link rel="stylesheet" type="text/css" href="Login_Account.css">
  <link rel="shortcut icon" type="image/x-icon" href="Tab.ico" />
  <link rel="stylesheet" href="loginNav.css">
</head>

<body>
<div class = "navtop" style="position:absolute; left:0px; top:0px;"><ul><li><a href="Home_Page.php">Home</a></li></ul></div>
    <div class="container">
    <div class="box1">
      <img src="Login.png">
    </div>
    <div class="box2">
      <div class="login-box">
        
        <form action="Login_Member_Handler.php" method="POST">
          <h1 style="text-align:center">Login</h1>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
          </div>          
<!-- have the but the button on the bottom or else it wont work, or submit form correctly -->
          <div class="links">
            <a href="Create_Account_Member.html">Create An Account</span></a>
          </div>
          <button type="submit" name="submit">Login</button>
        </form>

      </div>
    </div>
  </div>

</body>

</html>

<!-- <a href="Home_Page.html" type="submit" class="button1" name="submit">Login</a> -->