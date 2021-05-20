<?php

$this->view("partialsHeader", $data);


?>

    <div class="container">
    <div class="row">
    <h2>Apply for Project</h2>
<?php if (!empty($_SESSION["appliedMSG"])) { ?>
    <?= $_SESSION["appliedMSG"]; ?>
<?php } else { ?>

    <form id="registrationForm" method="post" class="form-horizontal">
        <div class="">
            <label class="">Write A Cover Letter</label>
            <div class="">
                <textarea class="form-control" rows="17" name="coverLetter"></textarea>
            </div>
        </div>

        <div class="">
            <label class="">Place a bid</label>
            <div class="">
                <input type="text" class="form-control" name="bidPrice" value=""/>
            </div>
        </div>

        <div class="">
            <div class="">
                <button type="submit" name="applyProject" class="btn btn-info btn-lg">Submit</button>
            </div>
        </div>

    </form>
    </div>
    </div>

<?php } ?>

<?php $this->view("partialsFooter", $data); ?>