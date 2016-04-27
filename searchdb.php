<?php

// Check if receiving an AJAX request
if (isset($_POST['people'])) {
  $pattern = $_POST['people'] . '%';
  
  require_once('/var/www/html/models/database.php');
  $db = databaseConnection();
  
  // Send a response if we can
  if (isset($db)) {
    $selection = $db->prepare('select * from users where username like :people');
    $selection->bindParam(':people', $pattern);
    $selection->execute();
    
    $_SESSION['friendUsername']   = $_GET['username'];
    $_SESSION['friendFirst']   = $_GET['first'];
    $_SESSION['friendLast']   = $_GET['last'];
    $_SESSION['friendGender']   = $_GET['gender'];
    $_SESSION['friendAnimalChoice']   = $_GET['animal_choice'];
    $_SESSION['friendDescription']   = $_GET['description'];
    
        // Response is in HTML format
    foreach ($selection as $row) {
      echo ("<li>$row[first] $row[last] $row[username]</li>");
    }
  }
  
  exit();
}

// Only get down here for normal (non-AJAX) requests
?>