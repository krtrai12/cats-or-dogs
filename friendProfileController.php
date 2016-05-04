<?php // Controller for the home page

session_start();

require_once('/var/www/html/models/database.php');
$db = databaseConnection();

$name = $_GET["friendUsername"];

// Send a response if we can
if (isset($db)) {
  $selection = $db->prepare('select * from users where username = :name');
  $selection->bindParam(':name', $name);
  $selection->execute();
  
  
  // the query should only return one row
  foreach ($selection as $row) {
    $friendFirst = $row['first'];
    $friendLast = $row['last'];
    $friendLast = $row['last'];
    $friendGender = $row['gender'];
    $friendAnimal = $row['animal_choice'];
    $friendDescription = $row['description'];
    break;
  }
}


// Show the about us page
require('views/header.php');
require('views/friendProfile.php');
require('views/footersignedin.php');
