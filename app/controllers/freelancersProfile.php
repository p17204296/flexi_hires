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
		$this->view("freelancersProfileView",$data);

	}

}