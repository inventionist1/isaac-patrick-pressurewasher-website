<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php 
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Please fill in all fields.</p>";
            } elseif ($_GET["error"] == "invaliduid") {
                echo "<p>Usernames may only contain letters, numbers, and _.</p>";
            } elseif ($_GET["error"] == "invalidemail") {
                echo "<p>Please enter a proper email.</p>";
            } elseif ($_GET["error"] == "pwddontmatch") {
                echo "<p>Passwords don't match.</p>";
            } elseif ($_GET["error"] == "usernameoremailtaken") {
                echo "<p>This username is taken.</p>";
            } elseif ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, Please try again later.</p>";
            } elseif ($_GET["error"] == "none") {
                echo "<p>You have succesfully signed up.</p>";
            } else {
                echo "<p>An unknown error has occured. Please try again later.</p>";
            }
        }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>