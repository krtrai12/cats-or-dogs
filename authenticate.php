<?php // Controller for registration/login

session_start();

// Should have form inputs
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['first']) && isset($_POST['last'])) { 

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
            header('Location: signinController.php');
            exit();
        } else {
            $_SESSION['message'] = 'Sorry, that username is unavailable.';
            header('Location: signupController.php');
            exit();
        }
        
    }
}

if (isset($_POST['signinusername']) && isset($_POST['signinpassword'])) {
    
    // Connect to database
    require_once('/var/www/html/models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        $success = $user->login($_POST['signinusername'], $_POST['signinpassword']);
            
        if ($success) {
            session_regenerate_id(true); // New session for login
            $_SESSION['username'] = $_POST['signinusername'];
            $data = $user->getUserDetails($_POST['signinusername']);
            $_SESSION['first'] = $data['first'];
            $_SESSION['last'] = $data['last'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['animalchoice'] = $data['animal_choice'];
            $_SESSION['description'] = $data['description'];
            $_SESSION['admin'] = $data['admin'];
            header('Location: ./');
            exit();
        } else {
            $_SESSION['message'] = 'Invalid Account Credentials.';
            header('Location: signinController.php');
            exit();
        }        
    }
}
