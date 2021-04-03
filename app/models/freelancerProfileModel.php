<?php 

Class freelancerProfileModel
{

//    function viewProjects($userTypeCondition, $bookedValid)
//    {
//        if(isset($_SESSION["Username"]) && $userTypeCondition){
//
//            $query = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.f_username=:user_name AND $bookedValid ORDER BY projects.timestamp DESC";
//            $arr['user_name']=$_SESSION["Username"];
//
//            $DB = new Database();
//            $data = $DB->read($query,$arr);
//            if(is_array($data))
//            {
//
//                return $data[0];
//            }
//
//        }
//        else{
//            $arr['user_name']="";
//            header("location:". ROOT . "home");
//        }
//
//        if (isset($_POST["pid"])) {
//            $_SESSION["projectID"] = $_POST["pid"];
//            header("location:". ROOT . "jobDetails");
//        }
//
//        if (isset($_POST["viewClient"])) {
//            $_SESSION["viewClient"] = $_POST["viewClient"];
//            header("location:". ROOT . "viewClient");
//        }
//
//        return false;
//
//    }


}