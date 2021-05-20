<?php

class Upload extends Controller
{
    function index()
    {

        header("Location:" . ROOT . "upload/image");
        die;

    }

    function image()
    {

        $user = $this->loadModel("user");

        if (!$result = $user->check_logged_in()) {
            header("Location:" . ROOT . "loginReg");
            die;
        }

        if (isset($_POST['title']) && isset($_FILES['file'])) {
            $uploader = $this->loadModel("upload_file");

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $uploader->upload($_POST, $_FILES);
            }

        }

        $data['page_title'] = "Upload";
        $this->view("uploadView", $data);
    }


}