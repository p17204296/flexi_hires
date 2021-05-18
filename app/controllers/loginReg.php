<?php

Class loginReg extends Controller
{
	function index()
	{
		$data['page_title'] = "Login/Register";

		if(isset($_POST['register']))
		{
			$user = $this->loadModel("user");

			// Process form
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Sanitize POST data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$user->register($_POST);
			}

		}elseif(isset($_POST['login'])){

			$user = $this->loadModel("user");

			// Process form
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Sanitize POST data
				$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$user->login($POST);
			}
		}

		//Check if User Logged In is a Freelancer
		if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){ //If Logged in Then DO...
			header("location:". ROOT . "freelancersProfile");
			//Check if User Logged In is a Client
		}else if (isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){ //If Logged in Then DO...
			header("location:". ROOT . "clientsProfile");
		}else {
			$this->view("loginRegView",$data);
		}

	}

}
