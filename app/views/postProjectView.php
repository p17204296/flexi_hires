<?php

$this->view("partialsHeader",$data);


if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}


if(isset($_POST["postProject"])){
		$clientID=row($_POST["clientID"]);
    $projectTitle=row($_POST["projectTitle"]);
    $category=row($_POST["category"]);
    $description=row($_POST["description"]);
    $budget=row($_POST["budget"]);
    // $skills=row($_POST["skills"]);
    // $special_skill=row($_POST["special_skill"]);
    $dueDate=row($_POST["dueDate"]);

    // $sql = "INSERT INTO projects (projectTitle, category, description, budget, skills, special_skill, c_username, valid, dueDate) VALUES ('$projectTitle', '$category', '$description','$budget','$skills','$special_skill','$username',1, '$dueDate')";
		$sql = "INSERT INTO projects (clientID, projectTitle, category, description, budget, valid, dueDate) VALUES ('$clientID', '$projectTitle', '$category', '$description','$budget', 1, '$dueDate')";
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["projectID"] = $conn->insert_id;
        header("location: projectDetails.php");
    }
}


 ?>

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Post A Job Offer</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Project Title</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="projectTitle" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Category</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="category" value="" />
                    </div>
                </div>

								<div class="form-group">
                    <label class="col-sm-4 control-label">Project Description</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" rows="12" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Budget</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="budget" value="" />
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-sm-4 control-label">Required Skills</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="skills" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Special Requirement</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="special_skill" value="" />
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-sm-4 control-label">Deadline</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="dueDate" value="" placeholder="YYYY-MM-DD" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="postProject" class="btn">Post</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

		<!--End main body-->


<?php$this->view("partialsFooter",$data); ?>
