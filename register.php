<?php

require_once('includes/classes/FormSanitizer.php');
require_once('includes/config.php');
require_once('includes/classes/Account.php');
require_once('includes/classes/Constants.php');

    $account = new Account($con);

    if(isset($_POST["submitPassword"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email1 = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName, $lastName, $username, $email1, $email2, $password, $password2);
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
                    <img src="assets/images/logo.png"/>
                    <h3> Sign Up </h3>
                    <span> to continue to Kakalix </span>
                    

                </div>
                <form method="POST">
                    
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName"); ?>" required> 

                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" required>
                    
                    <?php echo $account->getError(Constants::$userNameCharacters); ?>
                    <?php echo $account->getError(Constants::$userNameTaken); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username");?>" required>

                    <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$invalidEm); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email");?>" required>

                    <input type="email" name="email2" placeholder="Confirm Email" value="<?php getInputValue("email2");?>" required>

                    <?php echo $account->getError(Constants::$pwdsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>
                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm Password" required>

                    <input type="submit" name="submitPassword" value="SUBMIT" required>

                </form>

                <a href="login.php" class="signInMessage"> Already have an account? Sign in here!</a>
            </div>

        </div>
    </body>

</html>