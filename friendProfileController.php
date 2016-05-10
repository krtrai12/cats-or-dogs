<?php // Controller for friend page (after searching)

session_start();

require_once('/var/www/html/models/database.php');
$db = databaseConnection();

// Here we get the username of the profile we want to view from the URLs
$name = $_GET["friendUsername"];
$_SESSION['name'] = $name;

// Send a response if we can
if (isset($db)) {
  
  // Create user model
  require_once('models/user.php');
  $user = new User($db);
  
  // We search the database using the friend's unique username to get their user details
  $row = $user->getUserDetails($name); 
  
  $friendFirst = $row['first'];
  $friendLast = $row['last'];
  $friendGender = $row['gender'];
  $friendAnimal = $row['animal_choice'];
  $friendDescription = $row['description'];
  
  // Then, user that information to get their posts
  $selection = $user->getPosts($name);
  
  // and if a post has been while on the page, we report the post
  if (isset($_POST['report'])) {
    $user->report($_POST['postid']);
  }
}

// Show the firend's page
require('views/header.php');
require('views/friendProfile.php');
require('views/footersignedin.php');
