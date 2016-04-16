<?php // Controller for the sign up page

session_start();

// Show the sign up page
require('views/header.php');
require('views/signup.php');
require('views/footerSignedOut.php');