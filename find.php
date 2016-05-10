<?php // Controller for the search page

session_start();

// If we are logged in, we can see the search page
require('views/header.php');
if (isset($_SESSION['username'])) {
    require('views/findFriends.php');
    require('views/footersignedin.php');
} else {
    // Otherwise, we see the about page
    require('views/aboutus.php');
    require('views/footerSignedOut.php');
}