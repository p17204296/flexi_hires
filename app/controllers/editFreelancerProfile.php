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
		$this->view("editFreelancerProfileView",$data);

	}

}