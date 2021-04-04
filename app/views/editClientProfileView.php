<?php

$this->view("partialsHeader",$data);

$row=$data['clientTable'];//Client details from table



?>


<section class="container form-editProfile">
		<h2>Edit Profile</h2>

		<form id="registrationForm" method="post" class="">
			<div class="">
				<label class="">First Name</label>
				<div class="">
					<input type="text" class="" name="fname" value="<?php echo $row->fname; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Surname</label>
				<div class="">
					<input type="text" class="" name="sname" value="<?php echo $row->sname; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Email address</label>
				<div class="">
					<input type="text" class="" name="email" value="<?php echo $row->email; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Address</label>
				<div class="">
					<input type="text" class="" name="address" value="<?php echo $row->address; ?>" />
				</div>
			</div>

            <div class="">
                <label class="">City</label>
                <div class="">
                    <input type="text" class="" name="city" value="<?php echo $row->city; ?>" />
                </div>
            </div>

            <div class="">
                <label class="">Postcode</label>
                <div class="">
                    <input type="text" class="" name="postcode" value="<?php echo $row->postcode; ?>" />
                </div>
            </div>

			<div class="">
				<label class="">Date of birth</label>
				<div class="">
					<input type="date" class="" name="dob" value="<?php echo $row->dob; ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Profile Summary</label>
				<div class="">
					<textarea class="" rows="12" name="profileSummary"> <?php echo $row->profileSummary; ?></textarea>
				</div>
			</div>

			<div class="">
				<label class="">Company Name</label>
				<div class="">
					<input type="text" class="" name="companyName" value="<?php echo $row->companyName; ?>" />
				</div>
			</div>

			<br>

			<div class="">
				<!-- Do NOT use name="submit" or id="submit" for the Submit button -->
				<button type="submit" name="editClient" class="btn">Save changes</button>
			</div>
		</form>
</section>

<?php $this->view("partialsFooter",$data); ?>
