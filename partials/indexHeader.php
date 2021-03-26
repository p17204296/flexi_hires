<?php
include('config/constants.php'); //Connection to database
include('config/router.php');


// if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){
//
//   $sql = "SELECT * FROM freelancers WHERE username='$username'";
//   $result = $conn->query($sql);
//   if ($result->num_rows > 0) {
//       // output data of each row
//       while($row = $result->fetch_assoc()) {
//   				$clientID=$row["clientID"];
//   				$fname=$row["fname"];
//   				$sname=$row["sname"];
//   				$email=$row["email"];
//   				$address=$row["address"];
//   				$dob=$row["dob"];
//   				$profile_sum=$row["profileSummary"];
//       }
//   } else {
//       echo "0 results";
//   }
//
// }
// else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){
//
//   $sql = "SELECT * FROM clients WHERE username='$username'";
//   $result = $conn->query($sql);
//   if ($result->num_rows > 0) {
//       // output data of each row
//       while($row = $result->fetch_assoc()) {
//   				$clientID=$row["clientID"];
//   				$fname=$row["fname"];
//   				$sname=$row["sname"];
//   				$email=$row["email"];
//   				$address=$row["address"];
//   				$dob=$row["dob"];
//   				$profile_sum=$row["profileSummary"];
//           $companyName=$row["companyName"];
//       }
//   } else {
//       echo "0 results";
//   }
//
// }

?>

<!DOCTYPE html>

  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P17204296 - Flexi-Hires - CTEC3451-Development Project - Freelancing Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <section class="bg-wrapper container">
      <?php include('nav.php');  ?>
