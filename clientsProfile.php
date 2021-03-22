<?php include('partials/header.php');
if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["pid"])){
	$_SESSION["projectID"]=$_POST["pid"];
	header("location: projectDetails.php");
}

if(isset($_POST["viewFreelancer"])){
	$_SESSION["viewFreelancer"]=$_POST["viewFreelancer"];
	header("location: viewFreelancer.php");
}


$sql = "SELECT * FROM clients WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
				$clientID=$row["clientID"];
				$fname=$row["fname"];
				$sname=$row["sname"];
				$email=$row["email"];
				$address=$row["address"];
				$dob=$row["dob"];
				$profile_sum=$row["profileSummary"];
        $companyName=$row["companyName"];
    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM projects WHERE clientID='$clientID' and valid=1 ORDER BY timestamp DESC";
$result = $conn->query($sql);

 ?>


<!--main body-->
<div class="container">

<!--Main profile card-->
		<div class="card welcome-panel">
			<h2>Hello! <?php echo "$fname $sname"; ?></h2>
			<p class="panel-body"><?php echo "Username: $username"; ?></p>
			<div class="card panel-body">
				<a href="postJob.php" class="tomato-hover">Post a job offer</a>
	        <a href="editClientProfile.php" class="tomato-hover">Edit Profile</a>
			  	<a href="message.php" class="tomato-hover">Messages</a>
			  	<a href="logout.php" class="tomato-hover">Logout</a>
				</div>
	    </div>
<!--End Main profile card-->

<!--Contact Information-->
		<div class="card">
			<div class="panel">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body"><?php echo $email; ?></div>
			</div>
			<div class="panel">
			  <div class="panel-heading">Address</div>
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

<!--clients Profile Details-->
		<div class="card" style="">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Client Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Company Name</div>
			  <div class="panel-body"><h4><?php echo $companyName; ?></h4></div>
			</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">Profile Summary</div>
			  <div class="panel-body"><h4><?php echo $profile_sum; ?></h4></div>
			</div>

<br> <hr>

			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Project Adverts Posted</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Posted on</td>
                      </tr>
                      <?php
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="clientsProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
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
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Previous Projects</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Posted on</td>
                      </tr>
                      <?php
                      	$sql = "SELECT * FROM projects WHERE clientID='$clientID' and valid=0 ORDER BY timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="clientsProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
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
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Hired Freelancers</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Freelancer Details</td>
                      </tr>
                      <?php
                      	$sql = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.clientID='$username' AND booked.valid=1 ORDER BY projects.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $f_username=$row["f_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="clientsProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="clientsProfile.php" method="post">
                                    <input type="hidden" name="viewFreelancer" value="'.$f_username.'">
                                    <td><input type="submit" class="btn" value="'.$f_username.'"></td>
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
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3 class="blue-text">Previously Hired Freelancers</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Freelancer Details</td>
                      </tr>
                      <?php
                      	$sql = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.clientID='$username' AND booked.valid=0 ORDER BY projects.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $f_username=$row["f_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="clientsProfile.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="clientsProfile.php" method="post">
                                    <input type="hidden" name="viewFreelancer" value="'.$f_username.'">
                                    <td><input type="submit" class="btn" value="'.$f_username.'"></td>
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
              </h4></div>
			</div>
		</div>
<!--End Clients Profile Details-->


</div>
<!--End main body-->

<?php include('partials/footer.php');
