<?php // Controller for user posts (specifically for the current user's posts)

session_start();

// Connect to database
require_once('/var/www/html/models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
} else {
    
    // Create user model
    require_once('models/user.php');
    $user = new User($db);
    
    // Gets the users profile picture to display
    $profpic = $user->getProfilePicture($_SESSION['username']);
    
    // If the user tries to add a new post, we need to get all of the information from the form and insert them into the database
    if (isset($_POST['add'])) {
        if (getimagesize($_FILES['image']['tmp_name']) == FALSE) {
            echo "Please select an image.";
        } else {
            $image = addslashes($_FILES['image']['tmp_name']);
            $name = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
            $success = $user->addPost($_SESSION['username'], $_POST['newpost'], $image, $name);
        }
    }
    
    // If the delete button is pressed on a post, we send a request to delete the post and it is removed
    if (isset($_POST['delete'])) {
        $user->removePost($_POST['postid']);
    }
    
    // If the user tries to add a comment, we must validate that it is not an empty string and then send a request to add it to the database
    if (isset($_POST['comment'])) {
        $user->addComment($_SESSION['username'], $_POST['newcomment'], $_POST['addComment']);
    }
    
    // The user can report a post, which will get sent to the admin
    if (isset($_POST['report'])) {
        $user->report($_POST['postid'], $_POST['dateposted']);
    }
    
    // We need to get all of the current user's posts in order to display them 
    $selection = $user->getPosts($_SESSION['username']);
}