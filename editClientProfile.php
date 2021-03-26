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


<section class="container form-editProfile">
		<h2>Edit Profile</h2>

		<form id="registrationForm" method="post" class="">
			<div class="">
				<label class="">First Name</label>
				<div class="">
					<input type="text" class="" name="fname" value="<?php echo $fname; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Surname</label>
				<div class="">
					<input type="text" class="" name="sname" value="<?php echo $sname; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Email address</label>
				<div class="">
					<input type="text" class="" name="email" value="<?php echo $email; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Address</label>
				<div class="">
					<input type="text" class="" name="address" value="<?php echo $address; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Date of birth</label>
				<div class="">
					<input type="date" class="" name="dob" value="<?php echo $dob; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Profile Summary</label>
				<div class="">
					<textarea class="" rows="12" name="profileSummary"> <?php echo $profile_sum; ?></textarea>
				</div>
			</div>

			<div class="">
				<label class="">Company Name</label>
				<div class="">
					<input type="text" class="" name="companyName" value="<?php echo $companyName; ?>" />
				</div>
			</div>

			<br>

			<div class="">
				<!-- Do NOT use name="submit" or id="submit" for the Submit button -->
				<button type="submit" name="editClient" class="btn">Save changes</button>
			</div>
		</form>
</section>

<?php include('partials/footer.php'); ?>
