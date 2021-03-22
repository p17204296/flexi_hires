<?php include('partials/header.php');
if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["pid"])){
	$_SESSION["projectID"]=$_POST["pid"];
	header("location: jobDetails.php");
}

if(isset($_POST["viewClient"])){
	$_SESSION["viewClient"]=$_POST["viewClient"];
	header("location: viewClient.php");
}


$sql = "SELECT * FROM freelancers WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
				$freelancerID=$row["freelancerID"];
				$fname=$row["fname"];
				$sname=$row["sname"];
				$email=$row["email"];
				$address=$row["address"];
				$dob=$row["dob"];
				$profile_sum=$row["profileSummary"];
				$skills=$row["skills"];
				$experience=$row["experience"];
				$education=$row["education"];
				$minimumRate=$row["minimumRate"];
	    }
} else {
    echo "0 results";
}

 ?>

<div class="container">

<!--Main profile card-->
		<div class="card welcome-panel">
			<h2>Welcome! <?php echo "$fname $sname"; ?></h2>
			<p class="panel-body"> <?php echo "Username: $username; Minimum Rate: £$minimumRate perhour"; ?></p>
			<div class="card panel-body">
			  <a href="editFreelancerProfile.php" class="tomato-hover">Edit Profile</a>
		  	<a href="message.php" class="tomato-hover">Messages</a>
		  	<a href="logout.php" class="tomato-hover">Logout</a>
			</div>
	  </div>
<!--End Main profile card-->

<!--Contact Information-->
		<div class="card">
			<div class="panel">
			  <div class="panel-heading"><h3 class="blue-text">Contact Information</h3></div>
			</div>
			<div class="panel">
			  <div class="panel-heading"><h4>Email</h4></div>
			  <div class="panel-body"><?php echo $email; ?></div>
			</div>
			<div class="panel">
			  <div class="panel-heading"><h4>Address</h4></div>
			  <div class="panel-body"><?php echo $address; ?></div>
			</div>
		</div>
<!--End Contact Information-->

<!--Reputation-->
		<div class="card">
			<div class="panel">
			  <div class="panel-heading"><h3 class="blue-text">Reputation</h3></div>
			</div>
			<div class="panel">
			  <div class="panel-heading"><h4>Reviews</h4></div>
			  <div class="panel-body">No Information Available...</div>
			</div>
			<div class="panel">
			  <div class="panel-heading"><h4>Ratings</h4></div>
			  <div class="panel-body">No Information Available...</div>
			</div>
		</div>
<!--End Reputation-->

<!--Freelancer Profile Details-->
		<div class="card">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Freelancer Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Profile Summary</div>
			  <div class="panel-body"><h3><?php echo $profile_sum; ?></h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Skills</div>
			  <div class="panel-body"><h3><?php echo $skills; ?></h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Experience</div>
			  <div class="panel-body"><h3><?php echo $experience; ?></h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Education</div>
			  <div class="panel-body"><h3><?php echo $education; ?></h3></div>
			</div>

			<br> <hr> <br>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Ongoing Pojects</h3></div>
			  <div class="panel-body"><h3>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Client Details</td>
                      </tr>
                      <?php
                      	$sql = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.f_username='$username' AND booked.valid=1 ORDER BY projects.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $c_username=$row["c_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="ClientProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="ClientProfile.php" method="post">
                                    <input type="hidden" name="viewClient" value="'.$c_username.'">
                                    <td><input type="submit" class="btn" value="'.$c_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>No Information Available...</td></tr>";
                        }

                       ?>
                  </table>
              </h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text"><h3 class="blue-text">Completed Projects</h3></div>
			  <div class="panel-body"><h3>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Client Details</td>
                      </tr>
                      <?php
                      	$sql = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.f_username='$username' AND booked.valid=0 ORDER BY projects.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $c_username=$row["c_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="freelancerProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="freelancerProfile.php" method="post">
                                    <input type="hidden" name="viewClient" value="'.$c_username.'">
                                    <td><input type="submit" class="btn" value="'.$c_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>No Information Available...</td></tr>";
                        }

                       ?>
                  </table>
              </h3></div>
			</div>
		</div>
<!--End Freelancer Profile Details-->

</div>
<!--End main body-->


<?php include('partials/footer.php');
