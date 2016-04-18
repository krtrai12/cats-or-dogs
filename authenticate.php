<?php // Controller for registration/login

session_start();

// Should have form inputs
if (isset($_POST['username']) && isset($_POST['password'])) { // add rest of params

    // Connect to database
    require_once('/var/www/html/models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        $success = $user->register($_POST['username'], $_POST['gender'], $_POST['first'], $_POST['last'], $_POST['password']);
            
        if ($success) {
            $_SESSION['message'] = 'Registered! You can now log in.';
            header('signinContoller.php');
            exit();
        } else {
            $_SESSION['message'] = 'Sorry, that username is unavailable.';
            header('signupContoller.php');
            exit();
        }
        
    }
    echo $_SESSION['message'];
}
