<?php // Controller for profile information/changes

session_start();

// Should have form inputs
if (isset($_POST['newdescription']) || isset($_POST['newgender']) || isset($_POST['newfirst']) || isset($_POST['newlast']) || isset($_POST['newanimalchoice'])) {
    
    // Connect to database
    require_once('/var/www/html/models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        unset($_SESSION['message']);
        
        $username = $_SESSION['username'];
        
        if ($_POST['newgender'] == NULL || $_POST['newfirst'] == NULL || $_POST['newlast'] == NULL) {
            $_SESSION['message'] = 'Changes Unsuccessful.';
            header('Location: editController.php');
            exit();
        }
        
        if ($_POST['newdescription'] != NULL) { 
            $description = $_POST['newdescription'];
        } else {
            if ($_SESSION['description'] != NULL) { 
                $description = $_SESSION['description'];
            } else {
                $description = NULL;
            }
        }
        
        if ($_POST['newanimalchoice'] != NULL) { 
            $animalchoice = $_POST['newanimalchoice'];
        } else {
            if ($_SESSION['animalchoice'] != NULL) { 
                $animalchoice = $_SESSION['animalchoice'];
            } else {
                $animalchoice = NULL;
            }
        }
            
        if ($_POST['newgender'] != NULL) {
            $gender = $_POST['newgender'];
        } else {
            if ($_SESSION['gender'] != NULL) { 
                $gender = $_SESSION['gender'];
            } else {
                $gender = NULL;
            }
        }
        
        if ($_POST['newfirst'] != NULL) {
            $first = $_POST['newfirst'];
        } else {
            if ($_SESSION['first'] != NULL) { 
                $first = $_SESSION['first'];
            } else {
                $first = NULL;
            }
        }
            
        if ($_POST['newlast'] != NULL) {
            $last = $_POST['newlast'];
        } else {
            if ($_SESSION['last'] != NULL) { 
                $last = $_SESSION['last'];
            } else {
                $last = NULL;
            }
        }
        
        $success = $user->setUserDetails($username, $gender, $first, $last, $description, $animalchoice);   
            
        if ($success) {
            $_SESSION['message'] = 'Changes Saved!'; 
        }
        
        if (!($_SESSION['message'] == 'Changes Saved!')) {
            $_SESSION['message'] = 'Changes Unsuccessful.';
        } else {
            $data = $user->getUserDetails($username);
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