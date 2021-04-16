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

        //Project ID
        $projectID = $_SESSION["projectID"];

        //Applicant Info - for Open Projects
        $viewApplicantTable = $projectDetails->viewApplicants('applied', $projectID );
        $data['liveApplicants'] = $viewApplicantTable;

        //Applicant Info - for Closed Projects
        $viewApplicantTable = $projectDetails->viewApplicants('booked', $projectID );
        $data['closedApplicants'] = $viewApplicantTable;

        //Recruiter Info
        $viewRecruiterTable=$projectDetails->viewRecruiter();
        $data['viewRecruiter'] = $viewRecruiterTable;

        //Hire Freelancer
        if (isset($_POST["f_user_hire"]) || isset($_POST["f_done"])) {

            //applicantActions available for Clients i.e. Hire & Close project
            $applicantActionsSQL=$projectDetails->applicantActions($projectID);
            $data['applicantActions'] = $applicantActionsSQL;

        }


		$this->view("projectDetailsView",$data);


	}

    function editProject()
    {

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {

            header("Location:". ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Edit Project";

        $projectDetails = $this->loadModel("projectModel");

        //Project Info
        $projectDetailsTable=$projectDetails->projectDetailsSQL();
        $data['projectDetailsTable'] = $projectDetailsTable;

        if (isset($_POST["editProject"])) {

            $editProjectSQL=$projectDetails->editProject($_POST);
            $data['editProject'] = $editProjectSQL;

        }



        $this->view("editProjectView",$data);

    }


    }
