<?php

Class editFreelancerProfile extends Controller
{
	function index()
	{

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Edit Freelancer Profile";

        //Load freelancerProfileModel
        if(isset($_POST['editFreelancer'])) {
            $editFreelancerProfile = $this->loadModel("freelancerProfileModel");

            //Edit Freelancer Function
            $editFreelancerProfile->editFreelancerDetails($_POST);
        }

        //Contact Information
        $freelancerTable=$user->viewProfile($_SESSION["Usertype"] == 1, 'freelancers');
        $data['freelancerTable'] = $freelancerTable;



        $this->view("editFreelancerProfileView",$data);

	}

}