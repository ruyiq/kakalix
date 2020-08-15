<?php
require_once("../includes/config.php");
require_once("../includes/classes/entityProvider.php");
require_once("../includes/classes/entity.php");
require_once("../includes/classes/previewProvider.php");
require_once("../includes/classes/searchResultProvider.php");
require_once("../includes/classes/VideoProvider.php");

if(isset($_POST["term"]) && isset($_POST["username"])) {
        $srp = new SearchResultProvider($con, $_POST["username"]);
        echo $srp-> getResult($_POST["term"]);
}

else {
    echo "No term or username passed into file";
} 
?>