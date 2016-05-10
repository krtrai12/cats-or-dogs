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
    
    // Should have form inputs
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
    
    if (isset($_POST['delete'])) {
        $user->removePost($_POST['postid']);
    }
    
    if (isset($_POST['report'])) {
        $user->report($_POST['postid'], $_POST['dateposted']);
    }
    
    $selection = $user->getAllPosts();
}