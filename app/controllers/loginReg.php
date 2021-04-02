<?php

Class loginReg extends Controller
{
	function index()
	{
		$data['page_title'] = "Login/Register";

//        if(isset($_POST['email']))
        if(isset($_POST['register']))
        {
            $user = $this->loadModel("user");
            $user->register($_POST);

//        }elseif(isset($_POST['username']) && !isset($_POST['email'])){
        }elseif(isset($_POST['login'])){

            $user = $this->loadModel("user");
            $user->login($_POST);
        }


        $this->view("loginRegView",$data);
	}

}

