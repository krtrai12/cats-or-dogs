<?php

session_start();

// Connect to database
require_once('models/database.php');


if (isset($_SESSION['sort'])){
    $sort = $_SESSION['sort'];
    $selection = $db->query("select * from students order by " . $sort);
} else {
    $sort = 'last';
    $selection = $db->query("select * from students order by " . $sort);
}

require('views/header.php');
require('views/table.php');// 'require' is importing from this file [as if header.php was written directly into this file]
require('views/forms.php');
