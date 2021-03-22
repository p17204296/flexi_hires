<?php

session_start();
session_unset();
$loggedin=false;
header("location: loginReg.php");
?>
