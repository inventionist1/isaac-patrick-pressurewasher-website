<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php 
        if (isset($_GET["error"])) {
            switch ($_GET["error"]) {
                case "emptyinput":
                    echo "<p>Please fill in all fields.</p>";
                    break;
                case "invaliduid":
                    echo "<p>Usernames may only contain letters, numbers, and _.</p>";
                    break;
                case "invalidemail":
                    echo "<p>Please enter a proper email!</p>";
                    break;
                case "pwddontmatch":
                    echo "<p>Passwords don't match.</p>";
                    break;
                case "usernameoremailtaken":
                    echo "<p>This username is taken.</p>";
                    break;
                case "stmtfailed":
                    echo "<p>Something went wrong, Please try again later.</p>";
                    break;
                case "none":
                    echo "<p>You have succesfully signed up.</p>";
                    break;
                default:
                    echo "<p>An unknown error has occured. Please try again later.</p>";
                    break;
                }
            }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>