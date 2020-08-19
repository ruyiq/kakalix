<?php

require_once('includes/classes/FormSanitizer.php');
require_once('includes/config.php');
require_once('includes/classes/Account.php');
require_once('includes/classes/Constants.php');

    $account = new Account($con);
    if(isset($_POST["submitPassword"])) {

        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($username, $password);
        
        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
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
                    <img src="assets/images/logo.png" alt="Logo">
                    <h3> Sign in </h3>
                    <span> to continue to Kakalix </span>
                    

                </div>
                <form method="POST">
                
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="submit" name="submitPassword" value="SUBMIT" required>

                </form>

                <a href="register.php" class="signInMessage"> Do not have an account? Sign up here!</a>
            </div>

        </div>
    </body>

</html>