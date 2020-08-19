
<?php
require_once('includes/config.php');
require_once('includes/classes/previewProvider.php');
require_once('includes/classes/entityProvider.php');
require_once('includes/classes/entity.php');
require_once('includes/classes/categoryContainers.php');
require_once('includes/classes/errorMessage.php');
require_once('includes/classes/seasonProvider.php');
require_once('includes/classes/video.php');
require_once('includes/classes/season.php');
require_once('includes/classes/categoryContainers.php');
require_once("includes/classes/VideoProvider.php");
require_once("includes/classes/user.php");

if(!isset($_SESSION["userLoggedIn"])){
    header("Location: register.php");
}
$userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>

<html>
    <head>
        <title> Welcome to Kakalix!</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" title="logo" alt="Site logo"/>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/86ee88a39e.js" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <div class="wrapper">

        <div class="topBar">
            <div class="logo Container">
                <a href="index.php">
                    <img src="assets/images/logo.png" alt="Logo">
                </a>
            </div>

            <ul class="navLinks">
                <li> <a href="index.php"> Home </a> </li>
                <li> <a href="shows.php"> TV Shows </a> </li>
                <li> <a href="movies.php"> Movies </a> </li>
                <li> <a href="added.php"> Recently Added </a> </li>
            </ul>

            <div class="rightItems">
                <a href="search.php">
                    <i class='fas fa-search'></i>
                </a>

                <a href="profile.php">
                <i class='fas fa-user-circle'></i>
                </a>

                <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>