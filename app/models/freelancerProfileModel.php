<?php 

Class freelancerProfileModel
{

    function editFreelancerDetails($POST)
    {
        if (isset($_SESSION["Username"]) && isset($POST["editFreelancer"]) && $_SESSION["Usertype"] == 1){


            $user_name=$_SESSION["Username"];
            $arr['fname'] = $POST['fname'];
            $arr['sname'] = $POST['sname'];
            $arr['email'] = $POST['email'];
            $arr['address'] = $POST['address'];
            $arr['city'] = $POST['city'];
            $arr['postcode'] = $POST['postcode'];
            $arr['dob'] = $POST['dob'];
            $arr['profileSummary'] = $POST['profileSummary'];
            $arr['skills'] = $POST['skills'];
            $arr['experience'] = $POST['experience'];
            $arr['education'] = $POST['education'];
            $arr['minimumRate'] = $POST['minimumRate'];

            $query = "UPDATE freelancers SET fname=:fname, sname=:sname, email=:email, address=:address,  city=:city,  postcode=:postcode, dob=:dob, profileSummary=:profileSummary, skills=:skills, experience=:experience,education=:education, minimumRate=:minimumRate  WHERE username='$user_name'";
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

        if (isset($_POST["editFreelancer"])) {
            header("location:". ROOT . "freelancersProfile");
            die;
        }

        return false;

    }


}