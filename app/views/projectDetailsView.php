<?php
$this->view("partialsHeader", $data);

$row = $data['projectDetailsTable'];//Projects details from table
$row4 = $data['viewRecruiter'];//Client details from table


if ($_SESSION["Usertype"] == 1) {
    $linkBtn = "" . ROOT . "applyProject";
    $textBtn = "Apply";

} elseif ($_SESSION["Usertype"] == 2 && $_SESSION["clientID"] == $row4->clientID) {
    $linkBtn = "" . ROOT . "projectDetails/editProject";
    $textBtn = "Edit Project";
} else {
    $linkBtn = "";
    $textBtn = "";
}

?>


<!--main body-->
<div class="container">

    <!--Column 1-->
    <!--Freelancer Profile Details-->
    <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
        <div class="panel panel-success">
            <div class="panel-heading"><h3>Job Offer Details</h3></div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Job Title</div>
            <div class="panel-body"><h4><?php echo $row->projectTitle; ?></h4></div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Job Category</div>
            <div class="panel-body"><h4><?php echo $row->category; ?></h4></div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Job Description</div>
            <div class="panel-body"><h4><?php echo $row->description; ?></h4></div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Budget</div>
            <div class="panel-body"><h4>£<?php echo $row->budget; ?></h4></div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Due Date</div>
            <div class="panel-body"><h4><?= $row->dueDate; ?></h4></div>
        </div>
        <a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" class="btn"><?php echo $textBtn; ?></a>
    </div>
    <!--End Freelancer Profile Details-->

    <?php if ($_SESSION["Usertype"] == 2 && $_SESSION["clientID"] == $row4->clientID) : ?>
        <!--Freelancer Profile Details-->
        <div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
            <div class="panel panel-success">
                <div class="panel-heading"><h3>Applicants for this project</h3></div>
                <div class="panel-body">
                    <h4>
                        <table style="width:100%">
                            <tr>
                                <td>Applicant's username</td>
                                <td>Bid Price</td>
                            </tr>
                            <?php

                            //If Job Posting Still Open
                            if (is_array($data['liveApplicants']) or is_array($data['closedApplicants'])) {
                                if ($data['liveApplicants']):
                                    foreach ($data['liveApplicants'] as $row2):
                                        echo '
                            <form action="' . ROOT . 'projectDetails" method="post">
                            <input type="hidden" name="f_username" value="' . $row2->f_username . '">
                                <tr>
                                <td><input type="submit" class="btn" value="' . $row2->f_username . '"></td>
                                <td>' . $row2->bidPrice . '</td>
                                </form>
                                <form action="' . ROOT . 'projectDetails" method="post">
                                <input type="hidden" name="coverLetter" value="' . $row2->coverLetter . '">
                                <td><input type="submit" class="btn btn-link btn-lg" value="cover letter"></td>
                                </form>
                                <form action="' . ROOT . 'projectDetails" method="post">
                                <input type="hidden" name="freelancerID" value="' . $row2->freelancerID . '">
                                <input type="hidden" name="f_user_hire" value="' . $row2->f_username . '">
                                <input type="hidden" name="bidPrice" value="' . $row2->bidPrice . '">
                                <td><input type="submit" class="btn btn-link btn-lg" value="Hire"></td>
                                </tr>
                            </form>';
                                    endforeach;
                                endif;
                                if ($data['closedApplicants']):
                                    foreach ($data['closedApplicants'] as $row3):
                                        $valid = $row3->valid;
                                        if ($valid == 0) {
                                            $tc = "Project Complete";
                                            $tv = "";
                                        } else {
                                            $tc = "Close Project";
                                            $tv = "f_done";
                                        }
                                        echo '
                            <form action="' . ROOT . 'projectDetails" method="post">
                            <input type="hidden" name="f_username" value="' . $row3->f_username . '">
                                <tr>
                                <td><input type="submit" class="btn btn-link btn-lg" value="' . $row3->f_username . '"></td>
                                <td>' . $row3->price . '</td>
                                </form>
                              <form action="' . ROOT . 'projectDetails" method="post">
                                <input type="hidden" name="freelancerID" value="' . $row3->freelancerID . '">
                                <input type="hidden" name="' . $tv . '" value="' . $row3->f_username . '">
                                <td><input type="submit" class="btn btn-link btn-lg" value="' . $tc . '"></td>
                                </tr>
                             </form>
                            ';
                                    endforeach;
                                endif;
                            } else {
                                echo "<tr><td>No Information Available...</td></tr>";
                            }

                            ?>
                        </table>
                    </h4>
                </div>
            </div>

        </div>
        <!--End Freelancer Profile Details-->

    <?php endif; ?>

    <!--End Column 1-->

    <!--Column 2-->
    <div class="col-lg-3">

        <!--Main profile card-->
        <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
            <p></p>
            <!--			<img src="image/img04.jpg">-->
            <h2><?= $row4->fname . ' ' . $row4->sname ?></h2>
            <p> Username: <?= $row4->username ?></p>
            <br/>
            <a href="<?= ROOT ?>sendMessage" class="btn"><span class="glyphicon glyphicon-envelope"></span>Send Message</a>
            <p></p>
        </div>
        <!--End Main profile card-->

        <!--Contact Information-->
        <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Contact Information</h4></div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Email</div>
                <div class="panel-body"><?php echo $row4->email; ?></div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Company Name</div>
                <div class="panel-body"><?php echo $row4->companyName; ?></div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Address</div>
                <div class="panel-body"><?php echo $row4->address; ?></div>
            </div>
        </div>
        <!--End Contact Information-->

    </div>
    <!--End Column 2-->


</div>
<!--End main body-->


<?php

$this->view("partialsFooter", $data);

if ($_SESSION["Usertype"] == 1 && $valid == 0) {
    echo "<script>
		        $('#applybtn').hide();
		</script>";
}


//if($_SESSION["freelancerID"]!=$row->freelancerID && $_SESSION["Usertype"]!=1){
if ($_SESSION["Usertype"] == 1) {
    echo "<script>
		        $('#applybtn').hide();
		</script>";
    $linkBtn = "applyProject.php";
    $textBtn = "Apply";
} //if($_SESSION["clientID"]!=$row->clientID){
elseif ($_SESSION["Usertype"] == 2 && $_SESSION["clientID"] == $row4->clientID) {
    $linkBtn = "" . ROOT . "projectDetails/editProject";
    $textBtn = "Edit Project";
} else {
    echo "<script>
		        $('#applicant').hide();
		</script>";
    $linkBtn = "applyProject.php";
    $textBtn = "Apply";
}


?>
