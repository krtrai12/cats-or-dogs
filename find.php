<?php // Controller for the home page

session_start();

// Show the about us page
require('views/header.php');
if (isset($_SESSION['username'])) {
    require('views/findFriends.php');
    require('views/footersignedin.php');
} else {
    require('views/aboutus.php');
    require('views/footerSignedOut.php');
}