<?php
require_once('includes/header.php');

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createTVShowPreviewVideo(null);

$containers = new categoryContainers($con, $userLoggedIn);
echo $containers->showTVShowCategories();
?>