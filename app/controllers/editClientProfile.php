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

        //Load clientProfileModel
        if (isset($_POST['editClient'])) {
            $editClientProfile = $this->loadModel("clientProfileModel");

            //Edit Client Function
            $editClientProfile->editClientDetails($_POST);
        }

        //Contact Information
        $clientTable=$user->viewProfile($_SESSION["Usertype"] == 2, 'clients');
        $data['clientTable'] = $clientTable;

        $this->view("editClientProfileView",$data);

    }

}