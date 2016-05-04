<?php

$name = $_GET['friendUsername'] . '%';

require_once('/var/www/html/models/database.php');
$db = databaseConnection();

// Send a response if we can
if (isset($db)) {
  $selection = $db->prepare('select * from users where username = :name');
  $selection->bindParam(':name', $name);
  $selection->execute();
  
  
  // the query should only return one row
  foreach ($selection as $row) {
    $_SESSION['friendFirst'] = $row[first];
    $_SESSION['friendLast'] = $row[last];
    $_SESSION['friendLast'] = $row[last];
    $_SESSION['friendGender'] = $row[gender];
    $_SESSION['friendAnimal'] = $row[animal_choice];
    $_SESSION['friendDescription'] = $row[description];
    break;
  }
}

exit();

?>