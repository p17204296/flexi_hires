<?php



?>

<!DOCTYPE html>

  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page_title'] . " | ". WEBSITE_TITLE?></title>
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">
  </head>
  <body>

    <section class="bg-wrapper container">

      <header>
            <div id="menuToggler">&#8801;</div>
          <a href="<?=ROOT?>home"><img src="<?=ASSETS?>images/Tlogo.png" alt="Flexi-Hires Logo" class="logo"></a>
              <?php
                //Check if User in LoggedIn
                if (!isset($_SESSION["Username"])){ //If not Logged in Then DO..   ?>
                  <nav id="menu" class="right-align-text">
                    <ul class="navbar">
                      <li><a href='<?=ROOT?>home'>Home</a></li>
                      <li><a href="about.html">About</a></li>
                      <li><a href="search.html">Search</a></li>
                      <li><a href='<?=ROOT?>loginReg'>Register/LogIn</a></li>
                    </ul>
                  </nav>
            <?php
              //Check if User Logged In is a Freelancer
            }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){ //If Logged in Then DO...
          ?>
            <nav id="menu" class="right-align-text">
              <ul class="navbar">
                <li><a href='<?=ROOT?>home'>Home</a></li>
                <li><a href='<?=ROOT?>browseProjects'>Browse Projects</a></li>
                <li><a href='#myProjects'>My Projects</a></li>
                <li><a href='#'>Messages</a></li>
                <li><a href='<?=ROOT?>freelancersProfile'>My Profile</a></li>
                <li><a href='<?=ROOT?>logout'>Logout</a></li>
              </ul>
            </nav>
          <?php
            //Check if User Logged In is a Client
            }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){ //If Logged in Then DO...?>
              <nav id="menu" class="right-align-text">
                <ul class="navbar">
                  <li><a href='<?=ROOT?>home'>Home</a></li>
                  <li><a href='#'>Explore Freelancers</a></li>
                  <li><a href='<?=ROOT?>browseProjects'>Browse Projects</a></li>
                  <li><a href='<?=ROOT?>postProject'>Post a Project</a></li>
                  <li><a href='#'>Messages</a></li>
                  <li><a href='<?=ROOT?>clientsProfile'>My Profile</a></li>
                  <li><a href='<?=ROOT?>logout'>Logout</a></li>
                </ul>
              </nav>
          <?php
            }
          ?>

            </header>
            <!-- NavBar Section Ends -->


      <?php




       //$this->view("partialsNav",$data);  ?>
