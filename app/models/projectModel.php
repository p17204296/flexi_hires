<?php 

Class projectModel
{

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