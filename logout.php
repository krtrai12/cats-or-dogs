<?php // Controller for the home page

session_start();

unset($_SESSION['username']);
unset($_SESSION['first']);
unset($_SESSION['last']);
unset($_SESSION['gender']);
unset($_SESSION['animalchoice']);
unset($_SESSION['description']);

// Show the home page only if logged in
require('views/header.php');
require('views/home.php');
require('views/footerSignedOut.php');
