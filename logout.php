<?php
session_start();
session_destroy();
header("Location: login.php"); //redirect the user to the login page
?>