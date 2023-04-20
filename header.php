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
                        if(isset($_SESSION["userid"])) {
                    ?>
                            <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="includes/logout.inc.php">Log out</a></li>
                    <?php
                        } else {
                    ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>