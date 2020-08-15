<?php
require_once("../includes/config.php");
require_once("../classes/searchResultProvider.php");
require_once("../classes/entityProvider.php");
require_once("../classes/entity.php");

if(isset($_POST["term"]) && isset($_POST["username"])) {
        $srp = new SearchResultProvider($con, $_POST["username"]);
        echo $srp-> getResult($POST["term"]);
}

else {
    echo "No term or username passed into file";
} 
?>