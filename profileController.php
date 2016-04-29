<?php // Controller for the home page

session_start();

require('posts.php');

// Show the about us page
require('views/header.php');
require('views/profile.php');
require('views/footersignedin.php');
