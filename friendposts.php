<?php // Controller for displaying posts specific to the friend's page we are viewing

// Connect to database
require_once('/var/www/html/models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
} else {
    // Create user model
    require_once('models/user.php');
    $user = new User($db);
    
    // Here, we get the posts specific to that given user's page 
    $selection = $user->getPosts($_GET['friendUsername']);   
}