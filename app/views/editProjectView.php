<?php

$this->view("partialsHeader", $data);

$row = $data['projectDetailsTable'];

?>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Edit Job Offer</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Project Title</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="projectTitle"
                                   value="<?= $row->projectTitle; ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Category</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="category" value="<?= $row->category; ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Project Description</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" rows="12" cols="100"
                                      name="description"> <?= $row->description; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Budget</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="budget" value="<?= $row->budget; ?>"/>
                        </div>
                    </div>

                    <!--                <div class="form-group">-->
                    <!--                    <label class="col-sm-4 control-label">Required Skills</label>-->
                    <!--                    <div class="col-sm-5">-->
                    <!--                        <input type="text" class="form-control" name="skills" value="-->
                    <?php //echo $skills; ?><!--" />-->
                    <!--                    </div>-->
                    <!--                </div>-->

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Deadline</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="dueDate" value="<?= $row->dueDate; ?>"
                                   placeholder="YYYY-MM-DD"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                            <button type="submit" name="editProject" class="btn">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php

$this->view("partialsFooter", $data);

