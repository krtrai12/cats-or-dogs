<?php // Controller for the sign in page

session_start();

// Show the sign in page
require('views/header.php');
require('views/signin.php');
require('views/footerSignedOut.php');