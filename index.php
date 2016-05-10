<?php // Controller for the home page

session_start();

// Show the main page only if logged in
require('views/header.php');
if (isset($_SESSION['username'])) {
    require('mainposts.php');
    require('views/main.php');
    require('views/footersignedin.php');
} else {
    // Otherwise, show the "home" page (the cats/dogs slideshows)
    require('views/home.php');
    require('views/footerSignedOut.php');
}

