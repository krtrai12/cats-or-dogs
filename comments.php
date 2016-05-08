<?php 

session_start();

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
    if (isset($_POST['addComment'])) {
        $success = $user->addComment($_SESSION['username'], $_POST['newcomment'], $_POST['addComment']);
    }
    
    //if (isset($_POST['delete'])) {
    //    $user->removePost($_POST['postid']);
        
    //    header('Location: profileController.php');
    //    exit();
    //}
    
    //$result = $user->getComments($_POST['addComment']);
    
    
    if (isset($_SESSION['fromFriend'])) {
        ?>
        <script>
            var name = <?php $_SESSION['fromFriend']; ?>
        </script> <?php 
        unset($_SESSION['fromFriend'])?>
        <script type="text/javascript">
        window.location.href = name;
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
        window.location.href = '../index.php';
        </script>
        <?php
    }
}