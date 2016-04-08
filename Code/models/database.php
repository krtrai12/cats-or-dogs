<?php

// Return a PDO connection
    
    // Connection parameters
    $host = 'localhost';
    $dbname = 'cs332';
    $user = 'web';
    $password = 'kaylat';
    
    // Attempt connection
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // For development only
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    }
    
    // If it doesn't work
    catch (PDOException $e) {
        echo $e->getMessage(); // For development only
    
    }
