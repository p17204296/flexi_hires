<?php

$this->view("partialsHeader",$data);


?>

<section class="container">
  <div class="">
    <div class="form-reglogin">
      <h2>Login</h2>
      <form id="loginForm" method="post" class="">
        <p style="color:red;"><?php echo $errorMsg; ?></p>
        <div class="">
          <label class="">Username</label>
          <div class="">
            <input type="text" class="" name="username" required />
          </div>
        </div>

        <div class="">
          <label class="">Password</label>
          <div class="">
            <input type="password" class="" name="password" required />
          </div>
        </div>

        <div class="">
          <label class="">I am a: </label>
          <p style="color:red;"><?php echo  $userLoginError ?></p>
          <div class="">
            <div class="radio">
              <label>
                <input type="radio" name="usertype" value="freelancers" /> Freelancer
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="usertype" value="clients" /> Client
              </label>
            </div>
          </div>
        </div>

        <div class="">
          <div class="">
            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
            <button type="submit" name="login" class="btn">Login</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Register Section Starts Here -->
    <br><br><br><br><br>

    <div class="formRegister">
      <h2>Register</h2>
      <form id="registrationForm" method="post" class="">
        <p style="color:red;"><?php echo $errorMsg2; ?></p>
        <div class="">
          <label class="regLogin-label">Username</label>
          <div class="">
            <input type="text" class="" name="username" value="<?php echo $username; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="regLogin-label">First Name</label>
          <div class="">
            <input type="text" class="" name="fname" value="<?php echo $fname; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="">Surname</label>
          <div class="">
            <input type="text" class="" name="sname" value="<?php echo $sname; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="">Email Address</label>
          <div class="">
            <input type="text" class="" name="email" value="<?php echo $email; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="">Password</label>
          <div class="">
            <input type="password" class="" name="password" value="<?php echo $password; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="">Retype Password</label>
          <p style="color:red;"><?php echo  $passwordError ?></p>
          <div class="">
            <input type="password" class="" name="repassword" required />
          </div>
        </div>

        <div class="">
          <label class="">Address</label>
          <div class="">
            <input type="text" class="" name="address" value="<?php echo $address; ?>" required />
          </div>
        </div>

        <div class="">
          <label class="">Date of birth</label>
          <div class="">
            <input type="date" class="" name="dob" value="<?php echo $dob; ?>" placeholder="YYYY-MM-DD" />
          </div>
        </div>
        <br>
        <div class="">
          <label class="">I am a:</label>
          <p style="color:red;"><?php echo  $userRegError ?></p>
          <div class="">
            <label class="radio">
              <div class="">
                <input type="radio" name="usertype" value="freelancers" /> Freelancer
              </div>
            </label>
            <label class="radio">
              <div class="">
                <input type="radio" name="usertype" value="clients" /> Client
              </div>
            </label>
          </div>
        </div>
        <br>
        <div class="">
          <div class="">
            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
            <button type="submit" name="register" class="btn">Sign up</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>


<?php

$this->view("partialsFooter",$data);

?>
