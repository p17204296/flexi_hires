<?php

Class freelancersProfile extends Controller
{
	function index()
	{

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

		$data['page_title'] = "Freelancers Profile";
        $freelancerProfileModel = $this->loadModel("freelancerProfileModel");

        $freelancerTable=$freelancerProfileModel->viewProfile();
        $data['freelancerTable'] = $freelancerTable;

        $ongoingProjectsTable=$freelancerProfileModel->viewOngoingProjects();
        $data['ongoingProjectsTable'] = $ongoingProjectsTable;

        $completedProjectsTable=$freelancerProfileModel->viewCompletedProjects();
        $data['completedProjectsTable'] = $completedProjectsTable;

		$this->view("freelancersProfileView",$data);

	}

}