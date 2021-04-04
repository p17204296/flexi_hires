<?php
$this->view("partialsHeader",$data);

$row=$data['freelancerTable'];//Freelancer details from table



?>

<section class="container form-editProfile">
		<h2>Edit Profile</h2>
		<form id="registrationForm" method="post" class="">
			<div class="">
				<label class="">First Name</label>
				<div class="">
					<input type="text" class="" name="fname" value="<?php echo $row->fname ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Surname</label>
				<div class="">
					<input type="text" class="" name="sname" value="<?php echo $row->sname ?>" />
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
					<input type="date" class="" name="dob" value="<?= $row->dob ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Profile Summary</label>
				<div class="">
					<textarea class="" rows="12" name="profileSummary"> <?= $row->profileSummary ?></textarea>
				</div>
			</div>

			<div class="">
				<label class="">Skills</label>
				<div class="">
					<input type="text" class="" name="skills" value="<?= $row->skills ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Experience</label>
				<div class="">
					<input type="text" class="" name="experience" value="<?= $row->experience ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Education</label>
				<div class="">
					<input type="text" class="" name="education" value="<?= $row->education ?>" />
				</div>
			</div>

			<div class="">
				<label class="">Minimum Rate (£)</label>
				<div class="">
					<input type="text" class="" name="minimumRate" value="<?= $row->minimumRate ?>" />
				</div>
			</div>

			<br>
			<div class="">
				<!-- Do NOT use name="submit" or id="submit" for the Submit button -->
				<button type="submit" name="editFreelancer" class="btn">Save changes</button>
			</div>
		</form>

</section>

<?php $this->view("partialsFooter",$data); ?>
