<?php
require_once('includes/header.php');

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createMoviePreviewVideo();

$containers = new categoryContainers($con, $userLoggedIn);
echo $containers->showMovieCategories();
?>