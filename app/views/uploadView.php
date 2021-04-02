<?php

$this->view("partialsHeader",$data);

?>

<section class="container" style="min-height: 400px;">

    <h2>Upload Project</h2>
    <section class="section background-white">

<!--        <p>--><?php //check_message() ?><!--</p>-->

        <div class="">
            <h4 class="">Upload Project</h4>
            <form method="post" enctype="multipart/form-data" name="contactForm" class="customform" method="post">

                <div class="">
                    <input name="title" class="subject" placeholder="Title" title="Title" type="text" required>
                    <p class="subject-error form-error">Please enter a title.</p>
                </div>
                <div class="">
                    <input name="file" class="subject" type="file" required>
                    <p class="subject-error form-error">Please select a file.</p>
                </div>

                <div class="">
                    <textarea name="description" class="required message" placeholder="Description" rows="3"></textarea>
                    <p class="message-error form-error">Please enter a description.</p>
                </div>
                <div class=""><button class="btn" type="submit">Submit Button</button></div>
            </form>
        </div>
    </section>

</section>


<?php

$this->view("partialsFooter",$data);
?>
