<?php // Controller for registration/login

session_start();

// Should have form inputs
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['task'])) {

    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db, $_POST['username'], $_POST['password']);
        
        // Attempt registration
        if ($_POST['task'] == 'register') {
            $success = $user->register();
            
            if ($success) {
                $_SESSION['message'] = 'Registered! You can now log in.';
            } else {
                $_SESSION['message'] = 'Sorry, that username is unavailable.';
            }
        }
        
        // Or attempt login
        elseif ($_POST['task'] == 'login') {
            $user_id = $user->login();
            
            // whenever you have a successful login, it's a good idea to start a new session
            if (isset($user_id)) {
                session_regenerate_id(true); // New session for login
                $_SESSION['user_id'] = $user_id;
            } else {
                $_SESSION['message'] = 'Wrong username or password.';
            }
        }
    }
}

// Return home
header('Location: ./');         // ./ refers to index.php
exit();