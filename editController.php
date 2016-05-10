<?php // Controller for the edit page

// this is a "helper" file for user information
require('profileInformation.php');

// This controller is only available when signed in, and shows us content from the edit.php page
require('views/header.php');
require('views/edit.php');
require('views/footersignedin.php');