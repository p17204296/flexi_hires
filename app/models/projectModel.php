<?php 

Class projectModel
{

    function browseProjectsSQL($usertype, $projectValid)
    {

        if (isset($_SESSION["Username"]) && $usertype) {

            if (isset($_POST["recentProjects"])) {

                $query = "select * from projects where $projectValid ORDER BY timestamp DESC";

            }elseif (isset($_POST["oldProjects"])){

                $query = "select * from projects where $projectValid";

            }else{

                $query = "select * from projects where $projectValid ORDER BY timestamp DESC";
            }

            $DB = new Database();
            $data = $DB->read($query);
            if (is_array($data)) {

                return $data;
            }


        } else {

            header("location:". ROOT . "home");
        }

        if(isset($_POST["pid"])){
            $_SESSION["projectID"]=$_POST["pid"];
            header("location:". ROOT . "projectDetails");
        }

        return false;

    }

    function searchProjectsSQL($userType, $POST, $whereCondition, $projectValid)
    {

        if (isset($_SESSION["Username"]) && $userType && isset($POST)) {

            $query = "select * from projects where $whereCondition and $projectValid";

            $DB = new Database();
            $data = $DB->read($query);
            if (is_array($data)) {

                return $data;
            }


        } else {

            header("location:". ROOT . "home");
        }

        if(isset($_POST["pid"])){
            $_SESSION["projectID"]=$_POST["pid"];
            header("location:". ROOT . "projectDetails");
        }

        return false;

    }

    function postProjectSQL($POST)
    {
        if (isset($_SESSION["Username"]) && isset($POST["postProject"]) && $_SESSION["Usertype"] == 2){


            $arr['clientID']=$_SESSION["clientID"];
            $arr['projectTitle'] = $POST['projectTitle'];
            $arr['category'] = $POST['category'];
            $arr['description'] = $POST['description'];
            $arr['budget'] = $POST['budget'];
            $arr['dueDate'] = $POST['dueDate'];

            $query = "INSERT INTO projects (clientID, projectTitle, category, description, budget, dueDate, projectStatus, valid) VALUES (:clientID, :projectTitle, :category, :description,:budget, :dueDate, 'Advertised', 1)";
            $DB = new Database();
            $data = $DB->write($query,$arr);
            if(is_array($data))
            {

                return $data[0];

            }

        }
        else{
            $arr['user_name']="";
            header("location:". ROOT . "home");
        }

//        if (isset($_SESSION["projectID"])) {
//            header("location:". ROOT . "projectDetails");
//            die;
//        }

        return false;

    }


}