<?php


// Check if receiving an AJAX request
if (isset($_POST['people'])) {
  $pattern = $_POST['people'] . '%';
  $_SESSION['friendUsername']  = $_GET['peopleForm'];
  
  require_once('/var/www/html/models/database.php');
  $db = databaseConnection();
  
  // Send a response if we can
  if (isset($db)) {
    $selection = $db->prepare('select * from users where username like :people');
    $selection->bindParam(':people', $pattern);
    $selection->execute();
    
    
        // Response is in HTML format
    foreach ($selection as $row) {
      echo ("<li>$row[first] $row[last] $row[username]</li>");
    }
  }
  
  exit();
}

// Only get down here for normal (non-AJAX) requests
?>