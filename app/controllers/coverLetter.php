<?php

Class coverLetter extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Cover Letter";

        if ($_SESSION["coverLetter"]) :

            $projectDetails = $this->loadModel("projectModel");

            $projectID = $_SESSION["projectID"];
            $viewApplicantTable = $projectDetails->viewApplicants('applied', $projectID);
            $data['liveApplicants'] = $viewApplicantTable;

        endif;

        $this->view("coverLetterView",$data);


    }


}