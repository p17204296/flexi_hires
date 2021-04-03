<?php 

Class User
{

    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";

        //CHECK IF USERTYPE SELECTED BEFORE LOGIN
        if(!isset($POST['usertype']))
        {

            $_SESSION['error'] = "Please select usertype";


        }elseif (isset($POST['login']) && $POST['usertype']==="freelancers"){ //START FREELANCER LOGIN

            $arr['user_name'] = $POST['username'];
            $arr['password'] = md5($POST['password']);

            $query = "select * from freelancers where username = :user_name && password = :password limit 1";
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['freelancerID'] = $data[0]->freelancerID;
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['Usertype'] = 1;

                header("Location:". ROOT . "freelancersProfile");
                die;

            }else{

                $_SESSION['error'] = "please enter valid login details";

            }

        //END FREELANCER LOGIN

        }elseif (isset($POST['login']) && $POST['usertype']==="clients"){ //START CLIENT LOGIN

        $arr['user_name'] = $POST['username'];
            $arr['password'] = md5($POST['password']);

            $query = "select * from clients where username = :user_name && password = :password limit 1";
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['clientID'] = $data[0]->clientID;
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['Usertype'] = 2;

                header("Location:". ROOT . "clientsProfile");
                die;

            }else{

                $_SESSION['error'] = "please enter valid login details";

            }
        }//END CLIENT LOGIN

    }

    function register($POST)
    {
//        $user_name = $POST['username'];
//        $password = $POST['password'];
//        $repassword = $POST['repassword'];

        $DB = new Database();

        $_SESSION['error'] = "";

        //CHECK IF USERTYPE SELECTED BEFORE REGISTERING
        if(!isset($POST['usertype']))
        {

            $_SESSION['error'] = "Please select usertype";


        }elseif($POST['password']!==$POST['repassword']){

            $_SESSION['error'] = "Password does not match";

        }elseif ($POST['username']==$POST['password']){

            $_SESSION['error'] = "Username and Password cannot be the same. Please Try Again.";

        }elseif (isset($POST['register']) && $POST['usertype']==="freelancers"){
            //START FREELANCER REGISTRATION

            $arr['user_name'] = $POST['username'];

            $query = "select * from freelancers,clients where freelancers.username = :user_name or clients.username = :user_name ";
            $data = $DB->read($query,$arr);
            if(count($data) > 0)
            {
                $_SESSION['error'] = "The username is already taken.";
            }else{

                $arr['user_name'] = $POST['username'];
                $arr['fname'] = $POST['fname'];
                $arr['sname'] = $POST['sname'];
                $arr['email'] = $POST['email'];
                $arr['password'] = md5($POST['password']);

                //FREELANCER REGISTRATION SQL
                $query = "insert into freelancers (username, fname, sname, email, password) values (:user_name, :fname, :sname, :email, :password)";
                $data = $DB->write($query,$arr);
                if($data)
                {
                    //logged in
    //                    $_SESSION['freelancerID'] = $data[0]->freelancerID;
    //                    $_SESSION['Username'] = $data[0]->username;
    //                    $_SESSION['Usertype'] = 1;

                    header("Location:". ROOT . "editFreelancersProfile");
                    die;
                }

            }

        }elseif (isset($POST['register']) && $POST['usertype']==="clients"){
            //START CLIENT REGISTRATION

            $arr['user_name'] = $POST['username'];

            $query = "select * from freelancers,clients where freelancers.username = :user_name or clients.username = :user_name ";
            $data = $DB->read($query,$arr);

            if(count($data) > 0)
            {
                $_SESSION['error'] = "This username is already taken.";
            }else {

                $arr['user_name'] = $POST['username'];
                $arr['fname'] = $POST['fname'];
                $arr['sname'] = $POST['sname'];
                $arr['email'] = $POST['email'];
                $arr['password'] = md5($POST['password']);

                //CLIENT REGISTRATION SQL
                $query = "insert into clients (username, fname, sname, email, password) values (:user_name, :fname, :sname, :email, :password)";
                $data = $DB->write($query, $arr);
                if ($data) {
                    //logged in
                    $_SESSION['clientID'] = $data[0]->clientID;
                    $_SESSION['Username'] = $data[0]->username;
                    $_SESSION['Usertype'] = 2;

                    header("Location:" . ROOT . "editClientsProfile");
                    die;
                }
            }

        }else{

            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function check_logged_in()
    {

        $DB = new Database();
        if(isset($_SESSION['freelancerID'])) {

            $arr['freelancerID'] = $_SESSION['freelancerID'];

            $query = "select * from freelancers where freelancerID = :freelancerID limit 1";
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['freelancerID'] = $data[0]->freelancerID;

                return true;
            }

        }elseif (isset($_SESSION['clientID'])){

            $arr['clientID'] = $_SESSION['clientID'];

            $query = "select * from clients where clientID = :clientID limit 1";
            $data = $DB->read($query,$arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['clientID'] = $data[0]->clientID;

                return true;
            }

        }

        return false;

    }

    function logout()
    {
        //logged in
        if(isset($_SESSION['freelancerID'])) {

            unset($_SESSION['Username']);
            unset($_SESSION['freelancerID']);
            unset($_SESSION['Usertype']);

        }elseif (isset($_SESSION['clientID'])){

            unset($_SESSION['Username']);
            unset($_SESSION['clientID']);
            unset($_SESSION['Usertype']);

        }

        header("Location:". ROOT . "loginReg");
        die;
    }


    function viewProfile($userTypeCondition, $userTable)
    {

        if (isset($_SESSION["Username"]) && $userTypeCondition) {

            $query = "select * from $userTable where username = :user_name limit 1";
            $arr['user_name'] = $_SESSION["Username"];

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