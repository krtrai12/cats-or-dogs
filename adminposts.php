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
    
    if (isset($_POST['delete'])) {
        $user->removePost($_POST['postid']);
    }
    
    if (isset($_POST['unreport'])) {
        $user->unreport($_POST['postid'], $_POST['dateposted']);
    }
    
    $selection = $user->getReportedPosts();
}