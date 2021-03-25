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
	header("location: jobDetails.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
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

<!--Column 1-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<h2>Hello! <?php echo "$fname $sname"; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo "Username: $username"; ?></p>
			<ul class="list-group">
				<a href="postJob.php" class="list-group-item list-group-item-info">Post a job offer</a>
	        <a href="editClientProfile.php" class="list-group-item list-group-item-info">Edit Profile</a>
			  	<a href="message.php" class="list-group-item list-group-item-info">Messages</a>
			  	<a href="logout.php" class="list-group-item list-group-item-info">Logout</a>
	        </ul>
	    </div>
<!--End Main profile card-->

<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body"><?php echo $email; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Address</div>
			  <div class="panel-body"><?php echo $address; ?></div>
			</div>
		</div>
<!--End Contact Information-->

<!--Reputation-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-warning">
			  <div class="panel-heading"><h3 class="blue-text">Reputation</h3></div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading"><h4>Reviews</h4></div>
			  <div class="panel-body">Nothing to show</div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading"><h4>Ratings</h4></div>
			  <div class="panel-body">Nothing to show</div>
			</div>
		</div>
<!--End Reputation-->

	</div>
<!--End Column 1-->

<!--Column 2-->
	<div class="col-lg-7">

<!--clients Profile Details-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
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
                          <td>Job Id</td>
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
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$projectTitle.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
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
                          <td>Job Id</td>
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
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$projectTitle.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
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
                          <td>Job Id</td>
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
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="clientsProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
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
                          <td>Job Id</td>
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
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$projectTitle.'"></td>
                                    </form>
                                    <form action="clientsProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
		</div>
<!--End Clients Profile Details-->

	</div>
<!--End Column 2-->


</div>
<!--End main body-->
