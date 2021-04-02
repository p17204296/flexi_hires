<?php

Class editClientProfile extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if(!$result = $user->check_logged_in())
        {
            header("Location:". ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Edit Client Profile";
        $this->view("editClientProfileView",$data);

    }

}