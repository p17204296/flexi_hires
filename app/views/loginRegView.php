<?php

$this->view("partialsHeader",$data);


?>
<style>

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin:40px 10px 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    /*.form .register-form {*/
    /*    display: none;*/
    /*}*/

</style>

<section class="container">
    <div class="login-page">
 <p><?=$_SESSION['Username'] . " | Usertype: " . $_SESSION['Usertype'] ?></p>
        <div class="form">
            <h2>Login</h2>
            <?php if (isset($_POST['login'])): ?>
                <p class="red-text"><?php check_message() ?></p>
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
        <div class="form">
            <h2>Register</h2>
            <?php if (isset($_POST['register'])): ?>
                <p class="red-text"><?php check_message() ?></p>
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

<!--<script>-->
<!--    $('.message a').click(function(){-->
<!--        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");-->
<!--    });-->
<!--</script>-->

<?php

$this->view("partialsFooter",$data);

?>
