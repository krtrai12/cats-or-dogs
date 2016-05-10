<?php // Controller for the home page

session_start();

/**
 * Here is the controller for our "about" page, where we determine which footer to use based on whether or not the username is set in the session data
 * ( so, if the user has logged in recently )
 */
require('views/header.php');
if (isset($_SESSION['username'])) {
    require('views/aboutus.php');
    require('views/footersignedin.php');
} else {
    require('views/aboutus.php');
    require('views/footerSignedOut.php');
}