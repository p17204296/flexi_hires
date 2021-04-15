
<!-- NavBar Section Starts -->
    <div class="navbar">
    <a href="<?=ROOT?>home"><img src="<?=ASSETS?>images/Tlogo.png" alt="Flexi-Hires Logo" class="logo"></a>
        <div id="menuToggler">&#8801;</div>
        <?php
          //Check if User in LoggedIn
          if (!isset($_SESSION["Username"])){ //If not Logged in Then DO..   ?>
            <nav class="right-align-text">
              <a href='<?=ROOT?>home'>Home</a>
              <a href='#'>Blog</a>
              <a href='#'>Gallery</a>
              <a href='#'>Contact</a>
              <a href='<?=ROOT?>loginReg'>Register/LogIn</a>
            </nav>
      <?php
        //Check if User Logged In is a Freelancer
        }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){ //If Logged in Then DO...
      ?>
          <nav class="right-align-text">
            <a href='<?=ROOT?>home'>Home</a>
            <a href='<?=ROOT?>browseProjects'>Browse Projects</a>
            <a href='#myProjects'>My Projects</a>
            <a href='#'>Messages</a>
            <a href='<?=ROOT?>freelancersProfile'>My Profile</a>
            <a href='<?=ROOT?>logout'>Logout</a>
          </nav>
      <?php
        //Check if User Logged In is a Client
        }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){ //If Logged in Then DO...?>
          <nav class="right-align-text">
            <a href='<?=ROOT?>home'>Home</a>
            <a href='#'>Explore Freelancers</a>
            <a href='<?=ROOT?>browseProjects'>Browse Projects</a>
            <a href='<?=ROOT?>postProject'>Post a Project</a>
            <a href='#'>Messages</a>
            <a href='<?=ROOT?>clientsProfile'>My Profile</a>
            <a href='<?=ROOT?>logout'>Logout</a>
          </nav>
      <?php
        }
      ?>
        <div class="clearfix"></div>
      </div>
      <!-- NavBar Section Ends -->
