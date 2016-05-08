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
  
  $row = $user->getUserDetails($name); 
  
  $friendFirst = $row['first'];
  $friendLast = $row['last'];
  $friendGender = $row['gender'];
  $friendAnimal = $row['animal_choice'];
  $friendDescription = $row['description'];
  
  $selection = $user->getPosts($name);
  
  if (isset($_POST['report'])) {
    $user->report($_POST['postid']);
  }
}

// Show the about us page
require('views/header.php');
require('views/friendProfile.php');
require('views/footersignedin.php');
