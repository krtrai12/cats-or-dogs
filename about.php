<?php // Controller for the home page

session_start();

// Show the about us page
require('views/header.php');
require('views/aboutus.php');
require('views/footerSignedOut.php');