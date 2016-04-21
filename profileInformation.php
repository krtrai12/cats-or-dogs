<?php // Controller for profile information/changes

session_start();

// Should have form inputs
if (isset($_POST['description']) || isset($_POST['gender']) || isset($_POST['first']) || isset($_POST['last'])
    isset($_POST['animalchoice']) {
    
    // Connect to database
    require_once('/var/www/html/models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        $data = $user->getUserDetails($_SESSION['user_info']);
        
        if (!isset($_POST['description'])) {
            $_POST['description'] = $data['description'];
        }
        
        if (!isset($_POST['gender'])) {
            $_POST['gender'] = $data['gender'];
        }
        
        if (!isset($_POST['first'])) {
            $_POST['first'] = $data['first'];
        }
        
        if (!isset($_POST['last'])) {
            $_POST['last'] = $data['last'];
        }
        
        if (!isset($_POST['animalchoice'])) {
            $_POST['animalchoice'] = $data['animal_choice'];
        }
        
        $success = $user->setUserDetails($_SESSION['username'], $_POST['gender'],
                                         $_POST['first'], $_POST['last'], $_POST['animalchoice'], $_POST['description']);
            
        if ($success) {
            $_SESSION['message'] = 'Changes Saved!';
            header('Location: editController.php');
            exit();
        } else {
            $_SESSION['message'] = 'Changes Unsuccessful.';
            header('Location: editController.php');
            exit();
        }
        
    }
}