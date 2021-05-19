<?php

$this->view("partialsHeader",$data);


?>

<section class="container">
    <div class="login-page">
        <div class="form-loginReg">
            <h2>Login</h2>
            <?php if (isset($_POST['login'])): ?>
                <p class="red-text"><?php check_message() ?></p>
              <?php endif; ?>
              <?php if (isset($_SESSION['RegSuccess'])): ?>
                <p class="green-text"><?= $_SESSION['RegSuccess'] ?></p>
              <?php endif; ?>
            <form class="login-form" method="post">
                <input type="text" name="username" placeholder="username" required />
                <input type="password" name="password" placeholder="password" required />
                <p class="">I am a: </p>
                <input type="radio" name="usertype" value="freelancers" />
                <label>Freelancer</label>
                <input type="radio" name="usertype" value="clients" />
                <label>Client</label>
                <button type="submit" name="login">Login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
        <div class="form-loginReg">
            <h2>Register</h2>
            <?php if (isset($_POST['register'])): ?>
                <p class="red-text"><?php check_message() ?></p>
            <?php endif; ?>
            <?php if (isset($_SESSION['RegSuccess'])): ?>
              <p class="green-text"><?= $_SESSION['RegSuccess'] ?></p>
            <?php endif; ?>
        <form class="register-form" method="post">
            <input type="text" name="username" placeholder="username" required />
            <input type="text" name="fname" placeholder="first name" required />
            <input type="text" name="sname" placeholder="surname" required />
            <input type="text" name="email" placeholder="email address" required />
            <input type="password" name="password" placeholder="password" required />
            <input type="password" name="repassword" placeholder="retype password" required/>
            <p>I am a:</p>
            <input type="radio" name="usertype" value="freelancers" />
            <label>Freelancer - I want to work</label>
            <input type="radio" name="usertype" value="clients" />
            <label>Client - I want to hire for projects</label>
            <button type="submit" name="register">Sign Up!</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        </div>
    </div>


</section>

<?php

$this->view("partialsFooter",$data);

?>
