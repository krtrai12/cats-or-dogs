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
    
    // Should have form inputs
    if (isset($_POST['addComment'])) {
        if ($_POST['newcomment'] != "") {
            $success = $user->addComment($_SESSION['username'], $_POST['newcomment'], $_POST['addComment']);
        } else {
            $_SESSION['message'] = "Please enter a comment before submitting.";
        }
        
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}