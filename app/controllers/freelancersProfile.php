<?php

class freelancersProfile extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if (!$result = $user->check_logged_in()) {
            header("Location:" . ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Freelancers Profile";

        //Contact Information
        $freelancerTable = $user->viewProfile($_SESSION["Usertype"] == 1, 'freelancers');
        $data['freelancerTable'] = $freelancerTable;

        //Load globalProfileModel
        $globalProfileModel = $this->loadModel("globalProfileModel");

        //Ongoing Projects
        $ongoingProjectsTable = $globalProfileModel->viewProjects($_SESSION["Usertype"] == 1, 'f_username', 'booked.valid=1');
        $data['ongoingProjectsTable'] = $ongoingProjectsTable;


        //Completed Projects
        $completedProjectsTable = $globalProfileModel->viewProjects($_SESSION["Usertype"] == 1, 'f_username', 'booked.valid=0');
        $data['completedProjectsTable'] = $completedProjectsTable;

        //Load freelancerProfileModel
//        $freelancerProfileModel = $this->loadModel("freelancerProfileModel");

        $this->view("freelancersProfileView", $data);

    }

}