<?php

$username=$fname=$sname=$email=$password=$address=$dob="";

$passwordError = "";
$userLoginError = "";
$userRegError="";
$errors=0;

// Registration Form
if(isset($_POST["register"])){

  //Define input field variables
	$username=row($_POST["username"]);
	$fname=row($_POST["fname"]);
  $sname=row($_POST["sname"]);
	$email=row($_POST["email"]);
	$password=row(md5($_POST["password"]));
	$repassword=row(md5($_POST["repassword"]));
  $address=row($_POST["address"]);
	$dob=row($_POST["dob"]);
	$usertype=row($_POST["usertype"]);

// Check if password matches
  if ($password!==$repassword){
      $errors=$errors+1;
      $passwordError="Password does not match";
    }
//Error handling for usertype
if ($usertype=='') {
  $errors=$errors+1;
  $userRegError="Please select usertype";
}
if ($errors==0) {
  //Users who Register as Freelancers
	if ($usertype=="freelancers") {
		$sql = "SELECT * FROM freelancers,clients WHERE freelancers.username = '$username' OR clients.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
    else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO freelancers (username, fname, sname, email, password, address, dob) VALUES ('$username', '$fname','$sname','$email', '$password', '$address','$dob')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=1;
        header("location: index.php");
        echo "Hello $fname <br />";

				// header("location: freelancersProfile.php");
			}

		}
	}
  //Users who Register as Clients
	elseif ($usertype=="clients"){
		$sql = "SELECT * FROM freelancers,clients WHERE freelancers.username = '$username' OR clients.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO clients (username, fname, sname, email, password, address, dob) VALUES ('$username', '$fname','$sname','$email', '$password', '$address','$dob')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=2;
        header("location: index.php");
        echo "Hello $fname <br />";

				// header("location: clientsProfile.php");
			}

		}
	}
}
}

//Login Form
if(isset($_POST["login"])){
	session_unset();
	$username=row($_POST["username"]);
	$password=row(md5($_POST["password"]));
	$usertype=row($_POST["usertype"]);

//Error handling for usertype
  if ($usertype=='') {
    $errors=$errors+1;
    $userLoginError="Please select usertype";
  }
  if ($errors==0) {
  	if ($usertype=="freelancers") {
  		$sql = "SELECT * FROM freelancers WHERE username = '$username' AND password = '$password'";
  		$result = $conn->query($sql);
  		if($result->num_rows == 1){
  			$_SESSION["Username"]=$username;
  			$_SESSION["Usertype"]=1;
  			unset($_SESSION["errorMsg"]);
        header("location: index.php");
        echo "Hello $fname <br />";
  			// header("location: freelancersProfile.php");
  		}
  		else{
  			$_SESSION["errorMsg"]="username/password is incorrect";
  		}
  	}
    	else{
    		$sql = "SELECT * FROM clients WHERE username = '$username' AND password = '$password'";
    		$result = $conn->query($sql);
    		if($result->num_rows == 1){
    			$_SESSION["Username"]=$username;
    			$_SESSION["Usertype"]=2;
    			unset($_SESSION["errorMsg"]);
          header("location: index.php");
          echo "Hello $fname <br />";
    			// header("location: clientsProfile.php");
    		}
    		else{
    			$_SESSION["errorMsg"]="username/password is incorrect";
    		}
      }
  }
}


if(isset($_SESSION["errorMsg"])){
	$errorMsg=$_SESSION["errorMsg"];
	unset($_SESSION["errorMsg"]);
}
else{
	$errorMsg="";
}

if(isset($_SESSION["errorMsg2"])){
	$errorMsg2=$_SESSION["errorMsg2"];
	unset($_SESSION["errorMsg2"]);
}
else{
	$errorMsg2="";
}

function row($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//$conn->close();


?>
