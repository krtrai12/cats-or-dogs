<?php // Controller for the home page

session_start();

// Show the home page only if logged in
//require(isset($_SESSION['user_id']) ? 'views/main.php' : 'views/home.php');
require('views/header.php');
if (isset($_SESSION['username'])) {
    require('views/main.php');
    require('views/footersignedin.php');
} else {
    require('views/home.php');
    require('views/footerSignedOut.php');
}

