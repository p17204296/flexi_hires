<?php 

Class clientProfileModel
{


    function viewProjects($projectsValid)
    {
        if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){

            $clientID=$_SESSION["clientID"];
            $query = "select * from projects where clientID=$clientID and $projectsValid order by timestamp desc";

            $DB = new Database();
            $data = $DB->read($query);
            if(is_array($data))
            {

                    return $data;
            }

        }
        else{
            $arr['user_name']="";
            header("location:". ROOT . "home");
        }

        if (isset($_POST["pid"])) {
            $_SESSION["projectID"] = $_POST["pid"];
            header("location:". ROOT . "projectDetails");
        }

        return false;

    }

}