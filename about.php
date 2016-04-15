<?php // Controller for the home page

session_start();

// Show the home page only if logged in
require('views/header.php');
require('views/aboutus.php');