
<!-- NavBar Section Starts -->
    <div class="navbar">
    <img src="assets/images/logo2.png" alt="Flexi-Hires Logo" class="logo">
        <div id="menuToggler">&#8801;</div>
        <?php
          //Check if User in LoggedIn
          if (!isset($_SESSION["Username"])){ //If not Logged in Then DO..   ?>
            <nav class="right-align-text">
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
          <nav class="right-align-text">
            <a href='index.php'>Home</a>
            <a href='BrowseProjects.php'>Browse Projects</a>
            <a href='#myProjects'>My Projects</a>
            <a href='#'>Messages</a>
            <a href='freelancersProfile.php'>My Profile</a>
            <a href='logout.php'>Logout</a>
          </nav>
      <?php
        //Check if User Logged In is a Client
        }else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){ //If Logged in Then DO...?>
          <nav class="right-align-text">
            <a href='index.php'>Home</a>
            <a href='#'>Explore Freelancers</a>
            <a href='postProject.php'>Post a Project</a>
            <a href='#'>Messages</a>
            <a href='clientsProfile.php'>My Profile</a>
            <a href='logout.php'>Logout</a>
          </nav>
      <?php
        }
      ?>
        <div class="clearfix"></div>
      </div>
      <!-- NavBar Section Ends -->
