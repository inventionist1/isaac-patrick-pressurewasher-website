<?php

if(isset($_POST["submit"]))
{

    //getting data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdReapeat = $_POST["pwdrepeat"];
    $email = $_POST["email";]

    //init signupcontra class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contra.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //running error handlers and user signup
    $signup->signupUser();

    //going back to sign up page
    //TODO: make it so it automaticly logs in the user as well
    header("location: ../signup.php?error=none");
}