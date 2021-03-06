<?php

//Class User
//{
//
//    function register($POST)
//    {
//
//        $DB = new Database();
//
//        $_SESSION['error'] = "";
////        if(isset($POST['username']) && isset($POST['password']))
//        if(isset($_POST['register']))
//        {
//
//            $arr['username'] = $POST['username'];
//            $arr['password'] = $POST['password'];
//            $arr['email'] = $POST['email'];
////            $arr['url_address'] = get_random_string_max(60);
//            $arr['date'] = date("Y-m-d H:i:s");
//
//            $query = "insert into users (username,password,email,url_address,date) values (:username,:password,:email,:url_address,:date)";
//            $data = $DB->write($query,$arr);
//            if($data)
//            {
//
//                header("Location:". ROOT . "login");
//                die;
//            }
//
//        }else{
//
//            $_SESSION['error'] = "please enter a valid username and password";
//        }
//    }
//
//
//    function login($POST)
//	{
//		$DB = new Database();
//
//		$_SESSION['error'] = "";
////		if(isset($POST['username']) && isset($POST['password']) && isset($POST['usertype']))
//        if(isset($_POST['login']))
//        {
//
//			$arr['username'] = $POST['username'];
//			$arr['password'] = $POST['password'];
//            $arr['usertype'] = $POST['usertype'];
//
//            //Check if usertype is selected
//            if($arr['usertype']=='')
//            {
//
//                $_SESSION['error'] = "Please select usertype";
//
//            }elseif ($arr['usertype']=='freelancers'){ //If usertype is freelancer
//
//                $query = "select * from freelancers where username = :username && password = :password limit 1";
//                $data = $DB->read($query,$arr);
//                if(is_array($data))
//                {
//                    //logged in
////                    show(data);
//                    $_SESSION['freelancerID'] = $data[0]->freelancerID;
//                    $_SESSION['Username'] = $data[0]->username;
//                    $_SESSION['Usertype'] = 1;
//
//                    header("Location:". ROOT . "freelancersProfile");
//                    die;
//
//                }else{
//
//                    $_SESSION['error'] = "wrong username or password";
//                }
//
//            }elseif ($arr['usertype']=='clients'){ //If usertype is client
//
//                $query = "select * from clients where username = :username && password = :password limit 1";
//                $data = $DB->read($query,$arr);
//                if(is_array($data))
//                {
//                    //logged in
//                    $_SESSION['clientID'] = $data[0]->clientID;
//                    $_SESSION['Username'] = $data[0]->username;
//                    $_SESSION['Usertype'] = 2;
//
//                    header("Location:". ROOT . "clientsProfile");
//                    die;
//
//                }else{
//
//                    $_SESSION['error'] = "wrong username or password";
//                }
//
//            }
//
//		}else{
//
//			$_SESSION['error'] = "please enter valid login details";
//		}
//
//	}
//
//	function check_logged_in()
//	{
//
//		$DB = new Database();
//
//        //Freelancer
//		if(isset($_SESSION['Username']) && $_SESSION["Usertype"]==1)
//		{
//
//			$arr['username'] = $_SESSION['Username'];
//
//
////            $query = "select * from freelancers where url_address = :user_url limit 1";
//            $query = "select * from freelancers where username = :username 1";
//			$data = $DB->read($query,$arr);
//			if(is_array($data))
//			{
//				//logged in
//                $_SESSION['freelancerID'] = $data[0]->freelancerID;
//                $_SESSION['Username'] = $data[0]->username;
////				$_SESSION['user_url'] = $data[0]->url_address;
//
//				return true;
//			}
//        //Client
//		}elseif (isset($_SESSION['Username']) && $_SESSION["Usertype"]==2){
//
////            $arr['user_url'] = $_SESSION['user_url'];
//            $arr['username'] = $_SESSION['Username'];
//
//
////            $query = "select * from clients where url_address = :user_url limit 1";
//            $query = "select * from clients where username = :username 1";
//            $data = $DB->read($query,$arr);
//            if(is_array($data))
//            {
//                //logged in
//                $_SESSION['clientID'] = $data[0]->clientID;
//                $_SESSION['Username'] = $data[0]->username;
////				$_SESSION['user_url'] = $data[0]->url_address;
//
//                return true;
//
//            }
//
//        }
//
//		return false;
//
//	}
//
//	function logout()
//	{
//		//logged in
//		unset($_SESSION['user_name']);
//		unset($_SESSION['user_url']);
//
//		header("Location:". ROOT . "login");
//		die;
//	}
//
//
//}


class userProfile
{

    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";

        //CHECK IF USERTYPE SELECTED BEFORE LOGIN
        if (!isset($POST['usertype'])) {

            $_SESSION['error'] = "Please select usertype";


        } elseif (isset($POST['login']) && $POST['usertype'] === "freelancers") { //START FREELANCER LOGIN

            $arr['user_name'] = $POST['username'];
            $arr['password'] = md5($POST['password']);

            $query = "select * from freelancers where username = :user_name && password = :password limit 1";
            $data = $DB->read($query, $arr);
            if (is_array($data)) {
                //logged in
                $_SESSION['freelancerID'] = $data[0]->freelancerID;
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['Usertype'] = 1;

                header("Location:" . ROOT . "freelancersProfile");
                die;

            } else {

                $_SESSION['error'] = "please enter valid login details";

            }

            //END FREELANCER LOGIN

        } elseif (isset($POST['login']) && $POST['usertype'] === "clients") { //START CLIENT LOGIN

            $arr['user_name'] = $POST['username'];
            $arr['password'] = md5($POST['password']);

            $query = "select * from clients where username = :user_name && password = :password limit 1";
            $data = $DB->read($query, $arr);
            if (is_array($data)) {
                //logged in
                $_SESSION['clientID'] = $data[0]->clientID;
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['Usertype'] = 2;

                header("Location:" . ROOT . "clientsProfile");
                die;

            } else {

                $_SESSION['error'] = "please enter valid login details";

            }
        }//END CLIENT LOGIN

    }

    function register($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";

        //CHECK IF USERTYPE SELECTED BEFORE REGISTERING
        if (!isset($POST['usertype'])) {

            $_SESSION['error'] = "Please select usertype";


        } elseif ($POST['password'] !== $POST['repassword']) {

            $_SESSION['error'] = "Password does not match";

        } elseif ($POST['username'] == $POST['password']) {

            $_SESSION['error'] = "Username and Password cannot be the same. Please Try Again.";

        } elseif (isset($POST['register']) && $POST['usertype'] === "freelancers") {
            //START FREELANCER REGISTRATION

            $arr['user_name'] = $POST['username'];

            $query = "select * from freelancers,clients where freelancers.username = :user_name or clients.username = :user_name ";
            $data = $DB->read($query, $arr);
            if (count($data) > 0) {
                $_SESSION['error'] = "The username is already taken.";
            } else {

                $arr['user_name'] = $POST['username'];
                $arr['fname'] = $POST['fname'];
                $arr['sname'] = $POST['sname'];
                $arr['email'] = $POST['email'];
                $arr['password'] = md5($POST['password']);

                //FREELANCER REGISTRATION SQL
                $query = "insert into freelancers (username, fname, sname, email, password) values (:user_name, :fname, :sname, :email, :password)";
                $data = $DB->write($query, $arr);
                if ($data) {
                    //logged in
                    //                    $_SESSION['freelancerID'] = $data[0]->freelancerID;
                    //                    $_SESSION['Username'] = $data[0]->username;
                    //                    $_SESSION['Usertype'] = 1;

                    header("Location:" . ROOT . "editFreelancersProfile");
                    die;
                }

            }

        } elseif (isset($POST['register']) && $POST['usertype'] === "clients") {
            //START CLIENT REGISTRATION

            $arr['user_name'] = $POST['username'];

            $query = "select * from freelancers,clients where freelancers.username = :user_name or clients.username = :user_name ";
            $data = $DB->read($query, $arr);

            if (count($data) > 0) {
                $_SESSION['error'] = "This username is already taken.";
            } else {

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

        } else {

            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function check_logged_in()
    {

        $DB = new Database();
        if (isset($_SESSION['freelancerID'])) {

            $arr['freelancerID'] = $_SESSION['freelancerID'];

            $query = "select * from freelancers where freelancerID = :freelancerID limit 1";
            $data = $DB->read($query, $arr);
            if (is_array($data)) {
                //logged in
                $_SESSION['Username'] = $data[0]->username;
                $_SESSION['freelancerID'] = $data[0]->freelancerID;

                return true;
            }

        } elseif (isset($_SESSION['clientID'])) {

            $arr['clientID'] = $_SESSION['clientID'];

            $query = "select * from clients where clientID = :clientID limit 1";
            $data = $DB->read($query, $arr);
            if (is_array($data)) {
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
        if (isset($_SESSION['freelancerID'])) {

            unset($_SESSION['Username']);
            unset($_SESSION['freelancerID']);
            unset($_SESSION['Usertype']);

        } elseif (isset($_SESSION['clientID'])) {

            unset($_SESSION['Username']);
            unset($_SESSION['clientID']);
            unset($_SESSION['Usertype']);

        }

        header("Location:" . ROOT . "loginReg");
        die;
    }


}