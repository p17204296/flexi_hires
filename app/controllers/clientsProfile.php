<?php

Class clientsProfile extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Clients Profile";

        //Contact Information
        $clientTable=$user->viewProfile($_SESSION["Usertype"] == 2, 'clients');
        $data['clientTable'] = $clientTable;

        //Load freelancerProfileModel
        $clientProfileModel = $this->loadModel("clientProfileModel");

        //Posted Adverts
        $postedAdvertsTable=$clientProfileModel->viewProjects('valid=1');
        $data['postedAdvertsTable'] = $postedAdvertsTable;

        //Completed/Closed Projects
        $prevProjectsTable=$clientProfileModel->viewProjects('valid=3');
        $data['prevProjectsTable'] =  $prevProjectsTable;

        //Load freelancerProfileModel
        $globalProfileModel = $this->loadModel("globalProfileModel");

        //Hired Freelancers
        $hiredTable=$globalProfileModel->viewProjects($_SESSION["Usertype"] == 2, 'c_username', 'booked.valid=1');
        $data['hiredTable'] = $hiredTable;

        //Previously Hired
        $prevHiredTable=$globalProfileModel->viewProjects($_SESSION["Usertype"] == 2, 'c_username', 'booked.valid=0');
        $data['prevHiredTable'] = $prevHiredTable;

        if (isset($_POST["pid"])) {
            $_SESSION["projectID"] = $_POST["pid"];
            header("location:". ROOT . "projectDetails");
        }


        $this->view("clientsProfileView",$data);


    }

}