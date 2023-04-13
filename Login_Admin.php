<!DOCTYPE html>
<html>

<head>
  <title>Petaluma - Login - Admin</title>
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
        <form action="Login_Admin_Handler.php" method="POST">
          <h1 style="text-align:center">Login</h1>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
          </div>
          <button type="submit" class="button1" name="submit">Login</a>
          <div class="links">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>