<?php

class User {
    
    private $db; // PDO connection
    
    function __construct($db) {
        $this->db = $db;
    }
    
    // Attempt to add this user and return whether it worked
    function register($username, $gender, $first, $last, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $this->db->prepare('insert into users(username,gender,first,last,password)
                                     values(:username,:gender,:first,:last,:password)');
        $insert->bindParam(':username', $username, PDO::PARAM_STR);
        $insert->bindParam(':gender', $gender, PDO::PARAM_STR);
        $insert->bindParam(':first', $first, PDO::PARAM_STR);
        $insert->bindParam(':last', $last, PDO::PARAM_STR);
        $insert->bindParam(':password', $hash, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    // Attempt to return the ID of this user
    function login($username, $password) {
        $select = $this->db->prepare('select * from users where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->execute();
        
        $row = $select->fetch(PDO::FETCH_ASSOC);
        if (isset($row) && password_verify($password, $row['password'])) {
            return $row['user_id'];
        } else {
            return NULL;
        }
    }
}