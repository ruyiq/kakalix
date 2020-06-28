<?php
class Account {

    private $errorArray = array();
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    public function register($fn, $ln, $un ,$em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUserName($un);
        $this->validateEmail($em, $em2);
        $this->validatePassword($pw, $pw2);
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return $error;
        }
    }

    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUserName($un) {
        if(strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$userNameCharacters);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query -> bindValue(":un", $un);
        $query -> execute();

        if ($query -> rowCount() != 0){
            array_push($this->errorArray, Constants::$userNameTaken);
        }
    }
    
    private function validateEmail($em, $em2){
        if($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$invalidEm);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query -> bindValue(":em", $em);
        $query -> execute();

        if ($query -> rowCount() != 0){
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePassword($pw, $pw2){
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$pwdsDoNotMatch);
            return;
        }

        if(strlen($pw) < 2 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }
    }
}
?>