<?php 

// Connect to database
require_once('/var/www/html/models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
} else {
    
    // Create user model
    require_once('models/user.php');
    $user = new User($db);
    
    // If the 'delete' button is pressed, we call "removePost" on the post by passing in the unique post id
    if (isset($_POST['delete'])) {
        $user->removePost($_POST['postid']);
    }
    
    // Like the 'delete' button, this marks the post as unreported (which means the post is safe)
    if (isset($_POST['unreport'])) {
        $user->unreport($_POST['postid'], $_POST['dateposted']);
    }
    
    // This fetches all of the reported posts from the database to be displayed on the admin page
    $selection = $user->getReportedPosts();
}