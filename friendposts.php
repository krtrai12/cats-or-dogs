<?php // Controller for registration/login

// Connect to database
require_once('/var/www/html/models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
} else {
    // Create user model
    require_once('models/user.php');
    $user = new User($db);
    
    $selection = $user->getPosts($_GET['friendUsername']);   
}