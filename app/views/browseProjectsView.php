<?php

$this->view("partialsHeader", $data);

?>

<!--main body-->
<section class="container">
    <!--Column 2-->
    <div class="col-lg-3">

        <!--Main profile card-->
        <div class="card">
            <div class="panel">
                <h3 class="panel-heading">Filter Projects on Offer</h3>
                <form action="<?= ROOT ?>browseProjects" method="post">
                    <input type="text" class="form-control" name="s_title">
                    <button type="submit" class="">Search by Project Title</button>
                </form>

                <br>

                <form action="<?= ROOT ?>browseProjects" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s_cat">
                        <button type="submit" class="">Search by Project Category</button>
                    </div>
                </form>

                <br>

                <form action="<?= ROOT ?>browseProjects" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s_client">
                        <button type="submit" class="">Search by Client ID</button>
                    </div>
                </form>

                <br>

                <form action="<?= ROOT ?>browseProjects" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s_id">
                        <button type="submit" class="">Search by Project ID</button>
                    </div>
                </form>

                <br>

                <form action="<?= ROOT ?>browseProjects" method="post">
                    <div class="form-group">
                        <button type="submit" name="recentProjects" class="btn btn-warning">See all recent posted jobs
                            first
                        </button>
                    </div>
                </form>

                <br>

                <form action="<?= ROOT ?>browseProjects" method="post">
                    <div class="form-group">
                        <button type="submit" name="oldProjects" class="btn btn-warning">See all older posted jobs
                            first
                        </button>
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
                <div class="panel-body">
                    <h4>
                        <table style="width:100%">
                            <tr>
                                <td>Project ID</td>
                                <td>Project Title</td>
                                <td>Category</td>
                                <td>Budget (£)</td>
                                <td>Client ID</td>
                                <td>Posted on</td>
                            </tr>
                            <?php
                            if (is_array($data['browseProjectsTable'])):
                                foreach ($data['browseProjectsTable'] as $row):
                                    echo ' 
                            <form action="' . ROOT . 'browseProjects" method="post">
                            <input type="hidden" name="pid" value="' . $row->projectID . '">
                                <tr>
                                <td>' . $row->projectID . '</td>
                                <td><input type="submit" class="btn" value="' . $row->projectTitle . '"></td>
                                <td>' . $row->category . '</td>
                                <td>' . $row->budget . '</td>
                                <td>' . $row->clientID . '</td>
                                <td>' . date("Y-m-d", strtotime($row->timestamp)) . '</td>
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
            <p></p>
        </div>
        <!--End Freelancer Profile Details-->

    </div>
    <!--End Column 1-->


    </div>
    </div>
    <!--End main body-->
</section>


<?php

$this->view("partialsFooter", $data);


?>
