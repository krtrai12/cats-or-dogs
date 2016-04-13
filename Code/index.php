<?php // Controller for the home page

session_start();

// Show the home page only if logged in
require('views/header.php');
require(isset($_SESSION['user_id']) ? 'views/home.php' : 'views/signup.php');
require('views/footerSignedOut.php');
