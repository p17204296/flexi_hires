<?php
include('partials/header.php');

if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="freelancersProfile.php";
		$linkEditPro="editFreelancerProfile.php";
		$linkBtn="applyProject.php";
		$textBtn="Apply";
	}
	else{
		$linkPro="clientsProfile.php";
		$linkEditPro="editClientProfile.php";
		$linkBtn="editProject.php";
		$textBtn="Edit Project";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_POST["pid"])){
	$_SESSION["projectID"]=$_POST["pid"];
	header("location: projectDetails.php");
}

$sql = "SELECT * FROM projects WHERE valid=1 ORDER BY timestamp DESC";
$result = $conn->query($sql);

if(isset($_POST["s_title"])){
	$t=$_POST["s_title"];
	$sql = "SELECT * FROM projects WHERE projectTitle='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_cat"])){
	$t=$_POST["s_cat"];
	$sql = "SELECT * FROM projects WHERE category='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_client"])){
	$t=$_POST["s_client"];
	$sql = "SELECT * FROM projects WHERE clientID='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_id"])){
	$t=$_POST["s_id"];
	$sql = "SELECT * FROM projects WHERE projectID='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["recentProjects"])){
	$sql = "SELECT * FROM projects WHERE valid=1 ORDER BY timestamp DESC";
	$result = $conn->query($sql);
}

if(isset($_POST["oldProjects"])){
	$sql = "SELECT * FROM projects WHERE valid=1";
	$result = $conn->query($sql);
}

 ?>

<!--main body-->
<section class="container">
	<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card">
			<div class="panel">
				<h3 class="panel-heading">Filter Projects on Offer</h3>
				<form action="browseProjects.php" method="post">
					  <input type="text" class="form-control" name="s_title">
					  <button type="submit" class="">Search by Project Title</button>
		    </form>

				<br>

	        <form action="browseProjects.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_cat">
				  <button type="submit" class="">Search by Project Category</button>
				</div>
	        </form>

					<br>

	        <form action="browseProjects.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_client">
				  <button type="submit" class="">Search by client</button>
				</div>
	        </form>

					<br>

	        <form action="browseProjects.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_id">
				  <button type="submit" class="">Search by Project ID</button>
				</div>
	        </form>

					<br>

	        <form action="browseProjects.php" method="post">
				<div class="form-group">
				  <button type="submit" name="recentProjects" class="btn btn-warning">See all recent posted jobs first</button>
				</div>
	        </form>

					<br>

	        <form action="browseProjects.php" method="post">
				<div class="form-group">
				  <button type="submit" name="oldProjects" class="btn btn-warning">See all older posted jobs first</button>
				</div>
	        </form>
				</div>
		</div>
</div>
<!--End Main profile card-->

<!--End Column 2-->


<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->
		<div class="card">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Projects on Offer</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Project ID</td>
                          <td>Project Title</td>
                          <td>Category</td>
                          <td>Budget (£)</td>
                          <td>Client</td>
                          <td>Posted on</td>
                      </tr>
                      <?php
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
																$projectID=$row["projectID"];
                                $projectTitle=$row["projectTitle"];
                                $category=$row["category"];
                                $budget=$row["budget"];
                                $clientID=$row["clientID"];
																$freelancerID=$row["freelancerID"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="browseProjects.php" method="post">
                                <input type="hidden" name="pid" value="'.$projectID.'">
                                    <tr>
                                    <td>'.$projectID.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$projectTitle.'"></td>
                                    <td>'.$category.'</td>
                                    <td>'.$budget.'</td>
                                    <td>'.$clientID.'</td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

	</div>
<!--End Column 1-->


</div>
</div>
<!--End main body-->
</section>


<?php include('partials/footer.php');


if($clientID!=$freelancerID && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
}

?>
