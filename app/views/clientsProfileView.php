<?php

$this->view("partialsHeader", $data);

$row = $data['clientTable'];//Client details from table

?>


    <!--main body-->
    <div class="container">

    <!--Main profile card-->
    <div class="card welcome-panel">
        <h2>Welcome! <?= $row->fname . ' ' . $row->sname ?></h2>
        <p class="panel-body"> <?php echo "Username: $row->username"; ?></p>
        <div class="card panel-body">
            <a href="<?= ROOT ?>postProject" class="tomato-hover">Post a Project Advert</a>
            <a href="<?= ROOT ?>editClientProfile" class="tomato-hover">Edit Profile</a>
            <a href="<?= ROOT ?>message" class="tomato-hover">Messages</a>
            <a href="<?= ROOT ?>logout" class="tomato-hover">Logout</a>
        </div>
    </div>
    <!--End Main profile card-->

    <!--Contact Information-->
    <div class="card">
        <div class="card">
            <div class="panel">
                <h3 class="panel-heading blue-text">Contact Information</h3>
            </div>
            <div class="panel">
                <h4 class="panel-heading">Email</h4>
                <p class="panel-body"><?= $row->email ?></p>
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

        <!--clients Profile Details-->
        <div class="card">
            <div class="panel">
                <h3 class="panel-heading blue-text">Client Profile Details</h3>
            </div>
            <div class="panel">
                <h3 class="panel-heading">Company Name</h3>
                <h4 class="panel-body"><?php echo $row->companyName; ?></h4>
            </div>

            <div class="panel">
                <h3 class="panel-heading">Profile Summary</h3>
                <h4 class="panel-body"><?= $row->profileSummary ?></h4>
            </div>

            <br>
            <hr>

            <div class="panel">
                <h3 class="panel-heading blue-text">Project Adverts Posted</h3>
                <h4 accesskey="" class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <td>Project ID</td>
                            <td>Project Title</td>
                            <td>Posted on</td>
                        </tr>
                        <?php
                        if (is_array($data['postedAdvertsTable'])):
                            foreach ($data['postedAdvertsTable'] as $row2):
                                echo '
                <form action="' . ROOT . 'clientsProfile" method="post">
                <input type="hidden" name="pid" value="' . $row2->projectID . '">
                <tr>
                <td>' . $row2->projectID . '</td>
                <td><input type="submit" class="btn" value="' . $row2->projectTitle . '"></td>
                <td>' . $row2->timestamp . '</td>
                </tr>
                </form>
                ';
                            endforeach;
                        else:
                            echo "<tr><td>No Information Available...</td></tr>";
                        endif;

                        ?>
                    </table>
                </h4>
            </div>
            <div class="panel">
                <h3 class="panel-heading blue-text">Completed/Closed Projects</h3>
                <h4 class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <td>Project ID</td>
                            <td>Project Title</td>
                            <td>Posted on</td>
                        </tr>
                        <?php
                        if (is_array($data['prevProjectsTable'])):
                            foreach ($data['prevProjectsTable'] as $row3):
                                echo '
                <form action="' . ROOT . 'clientsProfile" method="post">
                <input type="hidden" name="pid" value="' . $row3->projectID . '">
                <tr>
                <td>' . $row3->projectID . '</td>
                <td><input type="submit" class="btn" value="' . $row3->projectTitle . '"></td>
                <td>' . $row3->timestamp . '</td>
                </tr>
                </form>
                ';
                            endforeach;
                        else:
                            echo "<tr><td>No Information Available...</td></tr>";
                        endif;

                        ?>
                    </table>
                </h4>
            </div>
            <div class="panel">
                <h3 class="panel-heading blue-text">Hired Freelancers</h3>
                <h4 class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <td>Project ID</td>
                            <td>Project Title</td>
                            <td>Freelancer Details</td>
                        </tr>
                        <?php
                        if (is_array($data['hiredTable'])):
                            foreach ($data['hiredTable'] as $row4):
                                echo '
                <form action="' . ROOT . 'clientsProfile" method="post">
                <input type="hidden" name="pid" value="' . $row4->projectID . '">
                <tr>
                <td>' . $row4->projectID . '</td>
                <td><input type="submit" class="btn" value="' . $row4->projectTitle . '"></td>
                </form>
                <form action="' . ROOT . 'clientsProfile" method="post">
                <input type="hidden" name="viewFreelancer" value="' . $row4->f_username . '">
                <td><input type="submit" class="btn" value="' . $row4->f_username . '"></td>
                <td>' . $row4->timestamp . '</td>
                </tr>
                </form>
                ';
                            endforeach;
                        else:
                            echo "<tr><td>No Information Available...</td></tr>";
                        endif;

                        ?>
                    </table>
                </h4>
            </div>
            <div class="panel">
                <h3 class="panel-heading blue-text">Previously Hired Freelancers</h3>
                <h4 class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <td>Project ID</td>
                            <td>Project Title</td>
                            <td>Freelancer Details</td>
                        </tr>
                        <?php
                        if (is_array($data['prevHiredTable'])):
                            foreach ($data['prevHiredTable'] as $row5):
                                echo '
                <form action="' . ROOT . 'clientsProfile" method="post">
                    <input type="hidden" name="pid" value="' . $row5->projectID . '">
                    <tr>
                        <td>' . $row5->projectID . '</td>
                        <td><input type="submit" class="btn" value="' . $row5->projectTitle . '"></td>
                </form>
                <form action="' . ROOT . 'clientsProfile" method="post">
                        <input type="hidden" name="viewFreelancer" value="' . $row5->f_username . '">
                        <td><input type="submit" class="btn" value="' . $row5->f_username . '"></td>
                        <td>' . $row5->timestamp . '</td>
                    </tr>
                </form>
                ';
                            endforeach;
                        else:
                            echo "<tr><td>No Information Available...</td></tr>";
                        endif;

                        ?>
                    </table>
                </h4>
            </div>
        </div>
        <!--End Clients Profile Details-->


    </div>
    <!--End main body-->

<?php

$this->view("partialsFooter", $data);
