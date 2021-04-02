<?php 

Class freelancerProfileModel
{

    function viewProfile()
    {

        if (isset($_SESSION["Username"]) && $_SESSION["Usertype"] == 1) {

            $query = "select * from freelancers where username = :user_name limit 1";
            $arr['user_name'] = $_SESSION["Username"];

            $DB = new Database();
            $data = $DB->read($query, $arr);
            if (is_array($data)) {

                return $data[0];
            }


        } else {

            $arr['user_name'] = "";
            header("location:  <?=ROOT?>home");
        }

        return false;

    }


    function viewOngoingProjects()
    {
        if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){

            $query = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.f_username=:user_name AND booked.valid=1 ORDER BY projects.timestamp DESC";
            $arr['user_name']=$_SESSION["Username"];

            $DB = new Database();
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {

                return $data[0];
            }

        }
        else{
            $arr['user_name']="";
            header("location:  <?=ROOT?>home");
        }

        if (isset($_POST["pid"])) {
            $_SESSION["projectID"] = $_POST["pid"];
                    header("location: <?=ROOT?>jobDetails");
        }

        return false;

    }


    function viewCompletedProjects()
    {
        if(isset($_SESSION["Username"]) && $_SESSION["Usertype"]==1){

            $query = "SELECT * FROM projects,booked WHERE projects.projectID=booked.projectID AND booked.f_username=:user_name AND booked.valid=0 ORDER BY projects.timestamp DESC";
            $arr['user_name']=$_SESSION["Username"];

            $DB = new Database();
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {

                return $data[0];
            }

        }
        else{
            $arr['user_name']="";
            header("location:  <?=ROOT?>home");
        }

        if (isset($_POST["viewClient"])) {
            $_SESSION["viewClient"] = $_POST["viewClient"];
                    header("location: <?=ROOT?>viewClient");
        }

        return false;

    }


}