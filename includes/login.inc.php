<?php

if(isset($_POST["submit"]))
{

    //getting data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    //init signupcontra class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contra.classes.php";
    $login = new LoginContr($uid, $pwd);

    //running error handlers and user signup
    $login->loginUser();

    //going back to sign up page
    //TODO: make it so it automaticly logs in the user as well
    header("location: ../index.php?error=none");
}