<?php // Controller for posts on the main page (displays all posts from all users on the website and allows the user to add posts)

// Connect to database
require_once('/var/www/html/models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
} else {
    
    // Create user model
    require_once('models/user.php');
    $user = new User($db);
    
    // if the delete button is pressed, send a request to delete the post
    if (isset($_POST['delete'])) {
        $user->removePost($_POST['postid']);
    }
    
    // if the report button is pressed, send request to report the post to an admin
    if (isset($_POST['report'])) {
        $user->report($_POST['postid'], $_POST['dateposted']);
    }
    
    // This returns all posts in the database to post all 
    $selection = $user->getAllPosts();
}