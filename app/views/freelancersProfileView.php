<?php

$this->view("partialsHeader",$data);
$row=$data['content'];//Freelancer details from table

 ?>

<div class="container">
        <div class="card welcome-panel">
            <h2>Welcome! <?=$row->fname .' '. $row->sname ?></h2>
            <p class="panel-body"> <?php echo "Username: $row->username; Minimum Rate: £$row->minimumRate per hour"; ?></p>
            <div class="card panel-body">
                <a href="<?=ROOT?>editFreelancerProfile" class="tomato-hover">Edit Profile</a>
                <a href="<?=ROOT?>message" class="tomato-hover">Messages</a>
                <a href="<?=ROOT?>logout" class="tomato-hover">Logout</a>
            </div>
        </div>


</div>
<!--End main body-->


<?php $this->view("partialsFooter",$data); ?>