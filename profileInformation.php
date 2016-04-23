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
        
        unset($_SESSION['message']);
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        if (!isset($_POST['description'])) {
            if (!isset($_SESSION['description'])) 
                $_SESSION['description'] = NULL;
        } else { 
            $SESSION['description'] = $_POST['description'];
            $descriptionsuccess = $user->setDescription($_SESSION['username'], $_SESSION['description']);
            if ($descriptionsuccess) {
                $_SESSION['message'] = 'Changes Saved!';
            }
        }
        
        if (!isset($_POST['animalchoice'])) {
            if (!isset($_SESSION['animalchoice'])) 
                $_SESSION['animalchoice'] = NULL;
        } else { 
            $SESSION['animalchoice'] = $_POST['animalchoice'];
            $animalsuccess = $user->setAnimalChoice($_SESSION['username'], $_SESSION['animalchoice']);
            if ($animalsuccess)
                $_SESSION['message'] = 'Changes Saved!';
        }
            
        if (!isset($_POST['gender'])) 
            $SESSION['gender'] = $_POST['gender'];
            
        if (!isset($_POST['first'])) 
            $SESSION['first'] = $_POST['first'];
            
        if (!isset($_POST['last'])) 
            $SESSION['last'] = $_POST['last'];
        
        if (isset($_POST['gender']) || isset($_POST['first']) || isset($_POST['last'])) {
            $success = $user->setUserDetails($_SESSION['username'], $_SESSION['gender'], $_SESSION['first'], $_SESSION['last']);
        }
            
        if ($success)
            $_SESSION['message'] = 'Changes Saved!'; 
        
        if (!($_SESSION['message'] == 'Changes Saved!')) {
            $_SESSION['message'] = 'Changes Unsuccessful.';
        } else {
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