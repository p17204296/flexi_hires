<?php

$this->view("partialsHeader",$data);

$row=$data['freelancerTable'];//Freelancer details from table
$row2=$data['ongoingProjectsTable'];//Ongoing Project details from table
$row3=$data['completedProjectsTable']; //Completed Project details from table

//show($row);
//show($row2);
//show($row3);


 ?>

<div class="container">
        <div class="card welcome-panel">
            <h2>Welcome! <?=$row->fname .' '. $row->sname ?></h2>
            <p class="panel-body"> <?php echo "Username: $row->username; Minimum Rate: £$row->minimumRate per hour"; ?></p>
            <div class="card panel-body">
                <a href="<?=ROOT?>editFreelancerProfile" class="tomato-hover">Edit Profile</a>
                <a href="<?=ROOT?>message" class="tomato-hover">Messages</a>
                <a href="<?=ROOT?>logout" class="tomato-hover">Logout</a>
            </div>
        </div>
    <!--End Main profile card-->

    <!--Contact Information-->
    <div class="card">
        <div class="panel">
            <h3 class="panel-heading blue-text">Contact Information</h3>
        </div>
        <div class="panel">
            <h4 class="panel-heading">Email</h4>
            <p class="panel-body"><?=$row->email ?></p>
        </div>
        <div class="panel">
            <h4 class="panel-heading">Address</h4>
            <p class="panel-body"><?= $row->address ?></p>
        </div>
    </div>
    <!--End Contact Information-->

    <!--Reputation-->
    <div class="card">
        <div class="panel">
            <h3 class="panel-heading blue-text">Reputation</h3>
        </div>
        <div class="panel">
            <h4 class="panel-heading">Reviews</h4>
            <p class="panel-body">No Information Available...</p>
        </div>
        <div class="panel">
            <h4 class="panel-heading">Ratings</h4>
            <p class="panel-body">No Information Available...</p>
        </div>
    </div>
    <!--End Reputation-->

    <!--Freelancer Profile Details-->
    <div class="card">
        <div class="panel">
            <h3 class="panel-heading blue-text">Freelancer Profile Details</h3>
        </div>
        <div class="panel">
            <h3 class="panel-heading">Profile Summary</h3>
            <h4 class="panel-body"><?= $row->profileSummary ?></h4>
        </div>
        <div class="panel">
            <h3 class="panel-heading">Skills</h3>
            <h4 class="panel-body"><?= $row->skills; ?></h4>
        </div>
        <div class="panel">
            <h3 class="panel-heading">Experience</h3>
            <h4 class="panel-body"><?= $row->experience; ?></h4>
        </div>
        <div class="panel">
            <h3 class="panel-heading">Education</h3>
            <h4 class="panel-body"><?= $row->education; ?></h4>
        </div>

        <br> <hr> <br>
        <div class="panel">
            <h3 id='myProjects' class="panel-heading blue-text">Ongoing Projects</h3>
            <h4 class="panel-body">
                <table style="width:100%">
                    <tr>
                        <td>Project ID</td>
                        <td>Project Title</td>
                        <td>Client Details</td>
                    </tr>
                    <?php

                    if($row2):
                        echo '
                            <form action="ClientProfile.php" method="post">
                            <input type="hidden" name="pid" value="'.$row2->projectID.'">
                                <tr>
                                <td>'.$row2->projectID.'</td>
                                <td><input type="submit" class="btn" value="'.$row2->projectTitle.'"></td>
                                </form>
                                <form action="ClientProfile.php" method="post">
                                <input type="hidden" name="viewClient" value="'.$row2->c_username.'">
                                <td><input type="submit" class="btn" value="'.$row2->c_username.'"></td>
                                <td>'.$row2->timestamp.'</td>
                                </tr>
                            </form>
                            ';
                    else:
                        echo "<tr><td>No Information Available...</td></tr>";
                    endif;

                    ?>
                </table>
            </h4>
        </div>
        <div class="panel">
            <h3 class="panel-heading blue-text">Completed Projects</h3>
            <h4 class="panel-body">
                <table style="width:100%">
                    <tr>
                        <td>Project ID</td>
                        <td>Project Title</td>
                        <td>Client Details</td>
                    </tr>
                    <?php
                    if($row3):
                        echo '
                            <form action="freelancerProfile.php" method="post">
                            <input type="hidden" name="pid" value="'.$row3->projectID.'">
                                <tr>
                                <td>'.$row3->projectID.'</td>
                                <td><input type="submit" class="btn" value="'.$row3->projectTitle.'"></td>
                                </form>
                                <form action="freelancerProfile.php" method="post">
                                <input type="hidden" name="viewClient" value="'.$row3->c_username.'">
                                <td><input type="submit" class="btn" value="'.$row3->c_username.'"></td>
                                <td>'.$row3->timestamp.'</td>
                                </tr>
                            </form>
                            ';
                    else:
                        echo "<tr><td>No Information Available...</td></tr>";
                    endif;

                    ?>
                </table>
            </h4>
        </div>
    </div>
    <!--End Freelancer Profile Details-->

</div>
<!--End main body-->


<?php $this->view("partialsFooter",$data); ?>