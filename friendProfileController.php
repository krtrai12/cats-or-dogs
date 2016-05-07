<?php // Controller for the home page

session_start();

require_once('/var/www/html/models/database.php');
$db = databaseConnection();

$name = $_GET["friendUsername"];
$_SESSION['name'] = $name;

// Send a response if we can
if (isset($db)) {
  
  // Create user model
  require_once('models/user.php');
  $user = new User($db);
  
  $selection = $user->getUserDetails($name); 
  
  // the query should only return one row
  
  foreach ($selection as $row) {
    $friendFirst = $row['first'];
    $friendLast = $row['last'];
    $friendGender = $row['gender'];
    $friendAnimal = $row['animal_choice'];
    $friendDescription = $row['description'];
    break;
  }
  
  $selection = $user->getPosts($name); 
}

// Show the about us page
require('views/header.php');
require('views/friendProfile.php');
require('views/footersignedin.php');
