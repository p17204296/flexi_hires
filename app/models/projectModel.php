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

            if(isset($_POST["pid"])){
                $_SESSION["projectID"]=$_POST["pid"];
                header("location:". ROOT . "projectDetails");

            }


            $DB = new Database();
            $data = $DB->read($query);
            if (is_array($data)) {

                return $data;
            }

            if(isset($_SESSION["projectID"])){
//                $_SESSION["projectID"]=$arr['projectID'];
//                $_SESSION["projectID"]=$_POST["pid"];
                header("location:". ROOT . "projectDetails");
            }


        } else {

            header("location:". ROOT . "home");
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

//        if(isset($_POST["pid"])){
//            $_SESSION["projectID"]=$_POST["pid"];
//            header("location:". ROOT . "projectDetails");
//        }

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
            if (is_array($data))
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

    //Project Details

    function projectDetailsSQL()
    {

        if (isset($_SESSION["Username"]) && isset( $_SESSION["projectID"]) ) {

            $query = "select * from projects where projectID=:projectID limit 1";
            $arr['projectID'] = $_SESSION["projectID"];

            $DB = new Database();
            $data = $DB->read($query, $arr);
            if (is_array($data)) {

                return $data[0];
            }

        } else {

            $arr['user_name'] = "";
            header("location:". ROOT . "home");
        }

        if(isset($_POST["f_user"])){
            $_SESSION["f_user"]=$_POST["f_user"];
            header("location:". ROOT . "viewFreelancer");
        }

        if(isset($_POST["c_letter"])){
            $_SESSION["c_letter"]=$_POST["c_letter"];
            header("location:". ROOT . "coverLetter");
        }

        return false;

    }


    function viewApplicants($table, $projectID)
    {
        if (isset($_SESSION["Username"]) && isset($_SESSION["projectID"]) ) {

            $query = "select * from $table where projectID='$projectID'";

            $DB = new Database();
            $data = $DB->read($query);

            if (is_array($data)) {

                return $data;
            }

        } else {

            header("location:". ROOT . "home");
        }

        return false;


    }


    function applicantActions($table, $projectID)
    {
        if (isset($_SESSION["Username"]) && isset($_SESSION["projectID"])) {

            if (isset($_POST["f_hire"])) {

                $query = "INSERT INTO $table (f_username, projectID, clientID, price, valid) VALUES (:f_user_hire, :projectID, :username,:f_price,1)";

            } elseif (isset($_POST["f_done"])){

                $sql = "UPDATE booked SET valid=0 WHERE projectID='$projectID'";

            } else {

                $query = "select * from $table where projectID='$projectID'";


            }
            if (isset($_POST["c_letter"])) {
                $_SESSION["c_letter"] = $_POST["c_letter"];
                header("location:" . ROOT . "coverLetter");
            }


            $DB = new Database();
            $data = $DB->read($query);

            if (is_array($data)) {

                return $data;
            }

        } else {

            header("location:". ROOT . "home");
        }

        return false;


    }


    function hireFreelancer()
    {

        if (isset($_SESSION["Username"]) && isset($_POST["f_hire"]) ) {

            $arr['f_hire']=$_POST["f_hire"];
            $arr['f_price']=$_POST["f_price"];

//            $sql = "INSERT INTO booked (f_username, projectID, e_username, price, valid) VALUES ('$f_hire', '$projectID', '$username','$f_price',1)";
            $query = "select * from projects where projectID=:projectID limit 1";
            $arr['projectID'] = $_SESSION["projectID"];

            $DB = new Database();
            $data = $DB->write($query, $arr);
            if (is_array($data)) {

                return $data[0];
            }

        } else {

            $arr['user_name'] = "";
            header("location:". ROOT . "404");
        }

        return false;


    }

    function projectCompleted()
    {


    }


    function viewRecruiter()
    {
        if (isset($_SESSION["Username"]) && isset( $_SESSION["projectID"])) {

            $query = "select * from projects,clients where projects.projectID=:projectID and projects.clientID=clients.clientID limit 1";
            $arr['projectID'] = $_SESSION["projectID"];

            $DB = new Database();
            $data = $DB->read($query, $arr);
            if (is_array($data)) {

                return $data[0];

            }

        } else {

            $arr['user_name'] = "";
            header("location:". ROOT . "home");
        }

        return false;

    }



}