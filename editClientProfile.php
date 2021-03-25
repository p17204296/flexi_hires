<?php include('partials/header.php'); ?>


<?php

if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}

$sql = "SELECT * FROM clients WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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


if(isset($_POST["editClient"])){
		$fname=row($_POST["fname"]);
	  $sname=row($_POST["sname"]);
		$email=row($_POST["email"]);
	  $address=row($_POST["address"]);
		$dob=row($_POST["dob"]);
		$profile_sum=row($_POST["profileSummary"]);
    $companyName=row($_POST["companyName"]);


    $sql = "UPDATE clients SET  fname='$fname',sname='$sname',email='$email', address='$address',dob='$dob',profileSummary='$profile_sum', companyName='$companyName' WHERE username='$username'";


    $result = $conn->query($sql);
    if($result==true){
        header("location: clientsProfile.php");
    }
}


 ?>


<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Edit Profile</h2>
                </div>

								<form id="registrationForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" />
                    </div>
                </div>

								<div class="form-group">
                    <label class="col-sm-4 control-label">Surname</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sname" value="<?php echo $sname; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Email address</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>
                </div>

								<div class="form-group">
                    <label class="col-sm-4 control-label">Address</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Date of birth</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" />
                    </div>
                </div>

								<div class="form-group">
                    <label class="col-sm-4 control-label">Profile Summary</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="profileSummary" value="<?php echo $profile_sum; ?>" />
                    </div>
                </div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Company Name</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" name="companyName" value="<?php echo $companyName; ?>" />
										</div>
								</div>

 <br>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="editClient" class="btn btn-info btn-lg">Save changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
