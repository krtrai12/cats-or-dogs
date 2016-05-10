<?php 

session_start(); 

/**
 * The adminposts.php file choose which files to display to an admin based on whether or not it has been reported
 **/
require('adminposts.php');


/**
 * This controller for the admin page can only be accessed when signed in and when an admin
 **/
require('views/header.php');
require('views/adminview.php');
require('views/footersignedin.php');