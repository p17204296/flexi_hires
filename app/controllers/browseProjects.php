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

        $browseProject = $this->loadModel("projectModel");

        //Post Project Function
        $browseProjectsTable = $browseProject->browseProjectsSQL($_SESSION["Username"],'valid=1');
        $data['browseProjectsTable'] = $browseProjectsTable;

        //Search by Project Title
        if (isset($_POST["s_title"])) {

            // Process form
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $q=$_POST["s_title"];
                $browseProjectsTable = $browseProject->searchProjectsSQL($_SESSION["Usertype"] == 1, $_POST["s_title"], "projectTitle LIKE '%$q%'" , 'valid=1');
                $data['browseProjectsTable'] = $browseProjectsTable;

            }

        }

        //Search by Category
        if (isset($_POST["s_cat"])) {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $q=$_POST["s_cat"];
                $browseProjectsTable = $browseProject->searchProjectsSQL($_SESSION["Usertype"] == 1, $_POST["s_cat"], "category LIKE '%$q%'" , 'valid=1');
                $data['browseProjectsTable'] = $browseProjectsTable;

            }

        }

        //Search by Client
        if (isset($_POST["s_client"])) {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $q=$_POST["s_client"];
                $browseProjectsTable = $browseProject->searchProjectsSQL($_SESSION["Usertype"] == 1, $_POST["s_client"], "clientID LIKE '%$q%'" , 'valid=1');
                $data['browseProjectsTable'] = $browseProjectsTable;

            }

        }

        //Search by Project ID
        if (isset($_POST["s_id"])) {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $q=$_POST["s_id"];
                $browseProjectsTable = $browseProject->searchProjectsSQL($_SESSION["Usertype"] == 1, $_POST["s_id"], "projectID LIKE '%$q%'" , 'valid=1');
                $data['browseProjectsTable'] = $browseProjectsTable;

            }

        }



		$this->view("browseProjectsView",$data);


	}

}