<?php // Controller for the admin page

session_start(); 

require('adminposts.php');

// Show the about us page
require('views/header.php');
require('views/adminview.php');
require('views/footersignedin.php');