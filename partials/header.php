<?php
include('config/constants.php'); //Connection to database
include('config/router.php');

?>

<!DOCTYPE html>

  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P17204296 - Flexi-Hires - CTEC3451-Development Project - Freelancing Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

      <!-- NavBar Section Starts -->
        <section class="navbar">
          <div class="container">

            <div class="logo">
              <img src="assets/images/logo2.png" alt="Flexi-Hires Logo" class="responsive-img">
                <!-- <img src="testhome.webp" alt="Flexi-Hires Logo" height="400px" width="440px"> -->
            </div>
              <div id="menuToggler">&#8801;</div>
              <?php
                //Check if User in LoggedIn
                if (!isset($_SESSION["Username"])){ //If not Logged in Then DO..   ?>
                  <nav class="menu right-align-text">
                    <a href='index.php'>Home</a>
                    <a href='#'>Blog</a>
                    <a href='#'>Gallery</a>
                    <a href='#'>Contact</a>
                    <a href='loginReg.php'>Register/LogIn</a>
                  </nav>
            <?php
              //Check if User Logged In is a Freelancer
              }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){ //If Logged in Then DO...
            ?>
                <nav class="menu right-align-text">
                  <a href='index.php'>Home</a>
                  <a href='#'>Browse Jobs</a>
                  <a href='#'>Gallery</a>
                  <a href='#'>Contact</a>
                  <a href='freelancersProfile.php'>My Profile</a>
                  <a href='logout.php'>Logout</a>
                </nav>
            <?php
              //Check if User Logged In is a Client
              }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){ //If Logged in Then DO...?>
                <nav class="menu right-align-text">
                  <a href='index.php'>Home</a>
                  <a href='#'>Explore Freelancers</a>
                  <a href='#'>Gallery</a>
                  <a href='#'>Contact</a>
                  <a href='clientsProfile.php'>My Profile</a>
                  <a href='logout.php'>Logout</a>
                </nav>
            <?php
              }
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
      <!-- NavBar Section Ends -->
