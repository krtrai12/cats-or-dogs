<?php // Controller for logging out

session_start();

// we must unset all of the user's session data so if they return to the page they will not be automatically signed in
unset($_SESSION['username']);
unset($_SESSION['first']);
unset($_SESSION['last']);
unset($_SESSION['gender']);
unset($_SESSION['animalchoice']);
unset($_SESSION['description']);

// Go to the signed out "home" page
require('views/header.php');
require('views/home.php');
require('views/footerSignedOut.php');
