<?php

Class projectDetails extends Controller
{
	function index()
	{

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {

            header("Location:". ROOT . "loginReg");
            die;
        }

		$data['page_title'] = "Project Details";

        $projectDetails = $this->loadModel("projectModel");

        //Project Info
        $projectDetailsTable=$projectDetails->projectDetailsSQL();
        $data['projectDetailsTable'] = $projectDetailsTable;

//        if (isset($_SESSION["Username"]) &&  isset($_SESSION["projectID"])) {

            //Applicant Info - for Open Projects

            $projectID = $_SESSION["projectID"];

            $viewApplicantTable = $projectDetails->viewApplicants('applied', $projectID );
            $data['liveApplicants'] = $viewApplicantTable;

            //Applicant Info - for Closed Projects
            $viewApplicantTable = $projectDetails->viewApplicants('booked', $projectID );
            $data['closedApplicants'] = $viewApplicantTable;

//        }

//        //Recruiter Info
        $viewRecruiterTable=$projectDetails->viewRecruiter();
        $data['viewRecruiter'] = $viewRecruiterTable;


		$this->view("projectDetailsView",$data);


	}

}