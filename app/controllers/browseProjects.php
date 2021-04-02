<?php

Class browseProjects extends Controller
{
	function index()
	{

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

		$data['page_title'] = "Browse Projects";
		$this->view("browseProjectsView",$data);


	}

}