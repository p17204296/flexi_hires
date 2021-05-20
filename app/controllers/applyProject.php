<?php

class applyProject extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if (!$result = $user->check_logged_in()) {

            header("Location:" . ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Project Application ";

        $projectDetails = $this->loadModel("projectModel");

        $checkAppliedTable = $projectDetails->checkApplied();
        $data['checkApplied'] = $checkAppliedTable;

        if (isset($_SESSION["projectID"]) && $_SESSION["Usertype"] == 1 && isset($_POST["applyProject"])) {

            // Process form
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Project Application Process
                $applyForProjectTable = $projectDetails->applyForProjectSQL($_POST);
                $data['applyForProject'] = $applyForProjectTable;
                header("location:" . ROOT . "projectDetails");

            }
        }


        $this->view("projectApplyView", $data);


    }

}
