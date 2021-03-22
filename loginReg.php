<?php include('partials/header.php');


?>

<section class="">
  <div class="container">
    <div class="form-reglogin">
      <h2>Login</h2>
      <form id="loginForm" method="post" class="">
        <p style="color:red;"><?php echo $errorMsg; ?></p>
        <div class="form-group">
          <label class="">Username</label>
          <div class="">
            <input type="text" class="form-control" name="username" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Password</label>
          <div class="">
            <input type="password" class="form-control" name="password" required />
          </div>
        </div>

        <div class="form-group">
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

        <div class="form-group">
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
        <div class="form-group">
          <label class="regLogin-label">Username</label>
          <div class="">
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="regLogin-label">First Name</label>
          <div class="">
            <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Surname</label>
          <div class="">
            <input type="text" class="form-control" name="sname" value="<?php echo $sname; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Email Address</label>
          <div class="">
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Password</label>
          <div class="">
            <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Retype Password</label>
          <p style="color:red;"><?php echo  $passwordError ?></p>
          <div class="">
            <input type="password" class="form-control" name="repassword" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Address</label>
          <div class="">
            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="">Date of birth</label>
          <div class="">
            <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" placeholder="YYYY-MM-DD" />
          </div>
        </div>
        <br>
        <div class="form-group">
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
        <div class="form-group">
          <div class="">
            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
            <button type="submit" name="register" class="btn">Sign up</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>


<?php include('partials/footer.php'); ?>
