<?php

class clientProfileModel
{

    function viewProjects($projectsValid)
    {
        if (isset($_SESSION["Username"]) && $_SESSION["Usertype"] == 2) {

            $clientID = $_SESSION["clientID"];
            $query = "select * from projects where clientID=$clientID and $projectsValid order by timestamp desc";

            $DB = new Database();
            $data = $DB->read($query);
            if (is_array($data)) {

                return $data;
            }

        } else {
            $arr['user_name'] = "";
            header("location:" . ROOT . "home");
        }

        if (isset($_POST["pid"])) {
            $_SESSION["projectID"] = $_POST["pid"];
            header("location:" . ROOT . "projectDetails");
        }

        return false;

    }

    function editClientDetails($POST)
    {
        if (isset($_SESSION["Username"]) && isset($POST["editClient"]) && $_SESSION["Usertype"] == 2) {


            $user_name = $_SESSION["Username"];
            $arr['fname'] = $POST['fname'];
            $arr['sname'] = $POST['sname'];
            $arr['email'] = $POST['email'];
            $arr['address'] = $POST['address'];
            $arr['city'] = $POST['city'];
            $arr['postcode'] = $POST['postcode'];
            $arr['dob'] = $POST['dob'];
            $arr['profileSummary'] = $POST['profileSummary'];
            $arr['companyName'] = $POST['companyName'];

            $query = "UPDATE clients SET fname=:fname, sname=:sname, email=:email, address=:address,  city=:city,  postcode=:postcode, dob=:dob, profileSummary=:profileSummary, companyName=:companyName WHERE username='$user_name'";
            $DB = new Database();
            $data = $DB->write($query, $arr);
            if (is_array($data)) {

                return $data[0];

            }

        } else {
            $arr['user_name'] = "";
            header("location:" . ROOT . "home");
        }

        if (isset($_POST["editClient"])) {
            header("location:" . ROOT . "clientsProfile");
            die;
        }

        return false;

    }


}