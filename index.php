<?php // Controller for the home page

session_start();

// Show the home page only if logged in
//require(isset($_SESSION['user_id']) ? 'views/main.php' : 'views/home.php');
require('views/header.php');
if (isset($_SESSION['user_id'])) {
    require('views/main.php');
    require('views/footersignedIn.php');
} else {
    require('views/home.php');
    require('views/footerSignedOut.php');
}

