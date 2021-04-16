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

            header("location:". ROOT . "home");
        }

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

            header("location:". ROOT . "home");
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

            if(isset($_POST["f_username"])){

                $_SESSION["f_user"]=$_POST["f_username"];
                header("location:" . ROOT . "viewFreelancerProfile");

            }elseif (isset($_POST["coverLetter"])) {

                $_SESSION["coverLetter"] = $_POST["coverLetter"];
                header("location:" . ROOT . "coverLetter");

            } elseif (isset($_POST["f_done"])){

                $_SESSION["f_done"] = $_POST["f_done"];
                header("location:" . ROOT . "projectDetails");
            }

        } else {

            header("location:". ROOT . "home");
        }

        return false;

    }


    function applicantActions($projectID)
    {
        if (isset($_SESSION["Username"]) && isset($_SESSION["projectID"])) {

            if (isset($_POST["f_user_hire"])) {

                $arr['freelancerID'] = $_POST['freelancerID'];
                $arr['f_user_hire'] = $_POST['f_user_hire'];
                $arr['clientID'] = $_SESSION["clientID"];
                $arr['c_username'] = $_SESSION["Username"];
                $arr['bidPrice'] = $_POST["bidPrice"];

                //Insert into Booked table
                $query = "INSERT INTO booked (freelancerID, f_username, projectID, clientID, c_username, price, valid) VALUES (:freelancerID, :f_user_hire, '$projectID', :clientID, :c_username, :bidPrice, 1)";

                //Delete from Applied table
                $query2 = "DELETE FROM applied WHERE projectID='$projectID'";

                $DB = new Database();
                $data = $DB->write($query2);

                if (is_array($data)) {

                    return $data;
                }

                //Update Projects table
                $query3 = "UPDATE projects SET projectStatus='Ongoing', valid=2 WHERE projectID='$projectID'";

                $DB = new Database();
                $data = $DB->write($query3);

                if (is_array($data)) {

                    return $data;
                }

            } elseif (isset($_POST["f_done"])){

                $arr['freelancerID'] = $_POST['freelancerID'];
                //Update Booked table
                $query = "UPDATE booked SET valid=0 WHERE projectID='$projectID' AND freelancerID=:freelancerID";

                //Update Projects table
                $query2 = "UPDATE projects SET projectStatus='Completed', valid=3 WHERE projectID= '$projectID'";

                $DB = new Database();
                $data = $DB->read($query2);

                if (is_array($data)) {

                    return $data;
                }

            }

            $DB = new Database();
            $data = $DB->read($query,$arr);

            if (is_array($data)) {

                return $data[0];
            }

        } else {

            header("location:". ROOT . "home");
        }

        return false;

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

            header("location:". ROOT . "home");
        }

        return false;

    }


    //Edit Project Page

    function editProject($POST)
    {
        if (isset($_POST["editProject"]) && isset($_SESSION["projectID"])) {

            $projectID=$_SESSION["projectID"];
            $arr['projectTitle'] = $POST['projectTitle'];
            $arr['category'] = $POST['category'];
            $arr['description'] = $POST['description'];
            $arr['budget'] = $POST['budget'];
            $arr['dueDate'] = $POST['dueDate'];

            $query = "UPDATE projects SET projectTitle=:projectTitle, category=:category, description=:description, budget=:budget, dueDate=:dueDate, projectStatus='Advertised', valid=1 WHERE projectID=$projectID";

            $DB = new Database();
            $data = $DB->read($query, $arr);
            if (is_array($data)) {

                return $data[0];

            }

            if (isset($_POST['editProject'])):

            header("location:". ROOT . "projectDetails");
            endif;

        } else {

            header("location:". ROOT . "home");
        }

        return false;

    }



}