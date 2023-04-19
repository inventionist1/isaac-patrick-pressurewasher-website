<?php
    session_start();
?>

<!DOCTYPE html>
<html lan="en">
    <head>
        <title> PressureWashing Company </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
    </head>
    <body>
            <nav>
                <ul class="nav-bar">
                    <li><a href="index.php">Home</a></li>
                    <?php
                        if(isset($_SESSION["useruid"])) {
                            echo "<li><a href="profile.php">Profile</a></li>";
                            echo "<li><a href="logout.php">Log out</a></li>";
                        } else {
                            echo "<li><a href="login.php">Login</a></li>";
                            echo "<li><a href="signup.php">Signup</a></li>";
                        }
                    ?>
                </ul>
            </nav>