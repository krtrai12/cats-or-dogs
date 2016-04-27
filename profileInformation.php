<?php // Controller for profile information/changes

session_start();

// Should have form inputs
if (isset($_POST['description']) || isset($_POST['gender']) || isset($_POST['first']) || isset($_POST['last']) || isset($_POST['animalchoice'])) {
    
    // Connect to database
    require_once('/var/www/html/models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        $username = $_SESSION['username'];
        
        if (isset($_POST['description'])) { 
            $description = $_POST['description'];
        } else {
            $description = $_SESSION['description'];
        }
        
        if (isset($_POST['animalchoice'])) { 
            $animalchoice = $_POST['animalchoice'];   
        } else {
            $animalchoice = $_SESSION['animalchoice'];
        }
            
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = $_SESSION['gender'];
        }
        
        if (isset($_POST['first'])) {
            $first = $_POST['first'];
        } else {
            $first = $_SESSION['first'];
        }
            
        if (isset($_POST['last'])) {
            $last = $_POST['last'];
        } else {
            $last = $_SESSION['last'];
        }
        
        $success = $user->setUserDetails($username, $gender, $first, $last, $description, $animalchoice);
            
        unset($_SESSION['message']);    
            
        if ($success)
            $_SESSION['message'] = 'Changes Saved!'; 
        
        if (!($_SESSION['message'] == 'Changes Saved!')) {
            $_SESSION['message'] = 'Changes Unsuccessful.';
        } else {
            session_regenerate_id(true);
            $data = $user->getUserDetails($_SESSION['username']);
            $_SESSION['first'] = $data['first'];
            $_SESSION['last'] = $data['last'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['animalchoice'] = $data['animal_choice'];
            $_SESSION['description'] = $data['description'];
        }
        
        header('Location: editController.php');
        exit();
        
    }
}