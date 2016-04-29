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
        
        if (!isset($_POST['newgender']) || !isset($_POST['newfirst']) || !isset($_POST['newlast'])) {
            $_SESSION['message'] = 'Changes Unsuccessful.';
            header('Location: profileController.php');
            exit();
        }
        
        if (isset($_POST['newdescription'])) { 
            $description = $_POST['newdescription'];
        } else {
            $description = $_SESSION['description'];
        }
        
        if (isset($_POST['newanimalchoice'])) { 
            $animalchoice = $_POST['newanimalchoice'];   
        } else {
            $animalchoice = $_SESSION['animalchoice'];
        }
            
        if (isset($_POST['newgender'])) {
            $gender = $_POST['newgender'];
        } else {
            $gender = $_SESSION['gender'];
        }
        
        if (isset($_POST['newfirst'])) {
            $first = $_POST['newfirst'];
        } else {
            $first = $_SESSION['first'];
        }
            
        if (isset($_POST['newlast'])) {
            $last = $_POST['newlast'];
        } else {
            $last = $_SESSION['last'];
        }
        
        $success = $user->setUserDetails($username, $gender, $first, $last, $description, $animalchoice);   
            
        if ($success) {
            $_SESSION['message'] = 'Changes Saved!'; 
        }
        
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
        
        header('Location: profileController.php');
        exit();
        
    }
}