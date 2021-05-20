<?php

class postProject extends Controller
{
    function index()
    {

        $user = $this->loadModel("user");

        if (!$result = $user->check_logged_in()) {
            header("Location:" . ROOT . "loginReg");
            die;
        }

        $data['page_title'] = "Post Projects";

        //Load postProjectModel
        if (isset($_POST['postProject'])) {
            $advertiseProject = $this->loadModel("projectModel");

            //Post Project Function
            $advertiseProject->postProjectSQL($_POST);
        }

        $this->view("postProjectView", $data);

    }

}