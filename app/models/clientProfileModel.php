<?php 

Class clientProfileModel
{

    function viewProjects($projectsValid)
    {
        if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==2){

            $query = "select * from projects where clientID=:clientID and $projectsValid order by timestamp desc";
            $arr['clientID']=$_SESSION["clientID"];

            $DB = new Database();
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {

                return $data[0];
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