<?php
    session_start(); 
    if(!$_SESSION['auth']){
        header('location: Login_Account.html');
    }
?>
<!-- link to home page -->
<div class="links">
    <a href="Home_Page.html"></span></a>
</div>
