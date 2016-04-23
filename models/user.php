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
            return $row['username'];
        } else {
            return NULL;
        }
    }
    
    // Getting the Details for the users profile page
    function getUserDetails($username) {
        $select = $this->db->prepare('select * from users where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->execute();
        
        $row = $select->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    // Getting the Details for the users profile page
    function setUserDetails($username, $gender, $first, $last) {
        $select = $this->db->prepare('update users set gender=:gender, first=:first, last=:last where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->bindParam(':gender', $gender, PDO::PARAM_STR);
        $select->bindParam(':first', $first, PDO::PARAM_STR);
        $select->bindParam(':last', $last, PDO::PARAM_STR);
        return $select->execute();
    }
    
    function setDescription($username, $description) {
        $select = $this->db->prepare('update users set description=:description where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->bindParam(':description', $description, PDO::PARAM_STR);
        return $select->execute();
    }
    
    function setAnimalChoice($username, $animalchoice) {
        $select = $this->db->prepare('update users set animal_choice=:animalchoice where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->bindParam(':animalchoice', $animalchoice, PDO::PARAM_STR);
        return $select->execute();
    }
}