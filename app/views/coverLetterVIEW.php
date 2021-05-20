<?php

$this->view("partialsHeader", $data);

$row = $data['liveApplicants'];//Projects details from table

if (isset($_SESSION["coverLetter"])) {
    $coverLetter = $_SESSION["coverLetter"];
}

show($row);


?>


    <div class="container">
        <h2>Cover Letter</h2>
        <h4>Username: <a href="<?= ROOT ?>projectDetails"><?= $row[0]->f_username ?> </a></h4>
        <p><?= $coverLetter; ?></p>
    </div>


<?php

$this->view("partialsFooter", $data);

