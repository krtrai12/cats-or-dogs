<?php // Controller for the home page

session_start(); 

require('mainposts.php');

// Show the about us page
require('views/header.php');
require('views/main.php');
require('views/footersignedin.php');