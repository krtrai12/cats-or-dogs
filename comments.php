<?php 

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
    
    // Here, we check if the user clicked the 'addComment' button
    if (isset($_POST['addComment'])) {
        // before we send the comment to the database, we must check to see if the comment is more than just an empty string
        if ($_POST['newcomment'] != "") {
            $success = $user->addComment($_SESSION['username'], $_POST['newcomment'], $_POST['addComment']);
        } else {
            $_SESSION['message'] = "Please enter a comment before submitting.";
        }
        
    }
    
    // after the comment is added, we return to the page which "referred" us to the comments.php
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}