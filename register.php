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
                    <h3> Sign Up </h3>
                    <span> to continue to Kakalix </span>
                    

                </div>
                <form method="POST">

                    <input type="text" name="firstName" placeholder="First name" required> 

                    <input type="text" name="lastName" placeholder="Last name" required>

                    <input type="text" name="username" placeholder="Username" required>

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="email" name="email2" placeholder="Confirm Email" required>

                    <input type="password" name="passowrd" placeholder="Password" required>

                    <input type="password" name="passoword2" placeholder="Confirm Password" required>

                    <input type="submit" name="SubmitPassword" value="SUBMIT" required>

                </form>

                <a href="login.php" class="signInMessage"> Already have an account? Sign in here!</a>
            </div>

        </div>
    </body>

</html>