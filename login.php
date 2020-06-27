<?php
    if(isset($_POST["submitPassword"])) {
        echo "Form was submitted";
    }

?>
<!DOCTYPE html>

<html>
    <head>
        <title> Welcome to Kakalix!</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" title="logo" alt="Site logo"/>
    </head>
    <body>
        <div class="signInContainer">

            <div class="column">
                <div class ="header">
                    <img src="assets/images/kakalix_logo.png"/>
                    <h3> Sign in </h3>
                    <span> to continue to Kakalix </span>
                    

                </div>
                <form method="POST">

                    <input type="text" name="username" placeholder="Username" required>

                    <input type="password" name="passowrd" placeholder="Password" required>

                    <input type="submit" name="SubmitPassword" value="SUBMIT" required>

                </form>

                <a href="register.php" class="signInMessage"> Do not have an account? Sign up here!</a>
            </div>

        </div>
    </body>

</html>