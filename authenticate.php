<?php // Controller for registration/login

session_start();

// If all fields are filled in when validate is called, we continue
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
        
        // This will pass parameters into the database to store user information
        $success = $user->register($_POST['username'], $_POST['gender'], $_POST['first'], $_POST['last'], $_POST['password']);
            
        if ($success) {
            // if inserting their information works, we will let them know with a confirmation message and a redirect so they can log in with their new credentials
            $_SESSION['message'] = 'Registered! You can now log in.';
            header('Location: signinController.php');
            exit();
        } else {
            // otherwise, they must try again with a new username (since the username is the only unique credential, this is the only case where there will be conflict)
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
        
        // Here, we pass the information into the login method in order to determine if they are valid credentials
        $success = $user->login($_POST['signinusername'], $_POST['signinpassword']);
            
        if ($success) {
            // if we reach this point, the user passed in valid credentials
            session_regenerate_id(true); // New session for login
            // here, we store all of the user information in session data to use later
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
            // if we get here, the user did not pass in valid credentials
            $_SESSION['message'] = 'Invalid Account Credentials.';
            header('Location: signinController.php');
            exit();
        }        
    }
}
