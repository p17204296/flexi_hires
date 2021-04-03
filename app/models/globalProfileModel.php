<?php 

Class globalProfileModel
{

    function viewProjects($userTypeCondition, $usernameType, $bookedValid)
    {
        if(isset($_SESSION["Username"]) && $userTypeCondition){

            $user_name=$_SESSION["Username"];
            $query = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.$usernameType = '$user_name' AND $bookedValid ORDER BY projects.timestamp DESC";

            $DB = new Database();
            $data = $DB->read($query);
            if(is_array($data)):

                return $data;
            endif;

        }
        else{
            $arr['user_name']="";
            header("location:". ROOT . "home");
        }

        if (isset($_POST["pid"])) {
            $_SESSION["projectID"] = $_POST["pid"];
            header("location:". ROOT . "projectDetails");
        }

        if (isset($_POST["viewClient"])) {
            $_SESSION["viewClient"] = $_POST["viewClient"];
            header("location:". ROOT . "viewClient");
        }

        return false;

    }




}