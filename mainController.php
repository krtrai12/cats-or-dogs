<?php // Controller for the "main" page (home when logged in)

session_start(); 

// We must get the posts for this page using mainposts.php
require('mainposts.php');

// Show the main page
require('views/header.php');
require('views/main.php');
require('views/footersignedin.php');