<?php include('partials/header.php'); ?>


<?php
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

$sql = "SELECT * FROM freelancers WHERE username='$username'";
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
		$skills=$row["skills"];
		$experience=$row["experience"];
		$education=$row["education"];
		$minimumRate=$row["minimumRate"];
	}
} else {
	echo "0 results";
}


if(isset($_POST["editfreelancer"])){
	$fname=row($_POST["fname"]);
	$sname=row($_POST["sname"]);
	$email=row($_POST["email"]);
	$address=row($_POST["address"]);
	$dob=row($_POST["dob"]);
	$profile_sum=row($_POST["profileSummary"]);
	$skills=row($_POST["skills"]);
	$experience=row($_POST["experience"]);
	$education=row($_POST["education"]);
	$minimumRate=row($_POST["minimumRate"]);


	$sql = "UPDATE freelancers SET fname='$fname',sname='$sname',email='$email', address='$address',dob='$dob',profileSummary='$profile_sum',skills='$skills',experience='$experience',education='$education',minimumRate='$minimumRate'  WHERE username='$username'";


	$result = $conn->query($sql);
	if($result==true){
		header("location: freelancersProfile.php");
	}
}


?>

<section class="container">
	<div class="form-editProfile">
		<h2>Edit Profile</h2>
		<form id="registrationForm" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="">First Name</label>
				<div class="">
					<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Surname</label>
				<div class="">
					<input type="text" class="form-control" name="sname" value="<?php echo $sname; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Email address</label>
				<div class="">
					<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Address</label>
				<div class="">
					<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Date of birth</label>
				<div class="">
					<input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Profile Summary</label>
				<div class="">
					<input type="text" class="form-control" name="profileSummary" value="<?php echo $profile_sum; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Skills</label>
				<div class="">
					<input type="text" class="form-control" name="skills" value="<?php echo $skills; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Experience</label>
				<div class="">
					<input type="text" class="form-control" name="experience" value="<?php echo $experience; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Education</label>
				<div class="">
					<input type="text" class="form-control" name="education" value="<?php echo $education; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="">Minimum Rate (£)</label>
				<div class="">
					<input type="text" class="form-control" name="minimumRate" value="<?php echo $minimumRate; ?>" />
				</div>
			</div>

			<br>
			<div class="form-group">
				<!-- Do NOT use name="submit" or id="submit" for the Submit button -->
				<button type="submit" name="editfreelancer" class="btn btn-info btn-lg">Save changes</button>
			</div>
		</form>

	</div>
</section>

<?php include('partials/footer.php'); ?>
