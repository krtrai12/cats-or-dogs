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
        
        $result = $select->fetchAll();
        return $result;
    }
    
    // Getting the Details for the users profile page
    function setUserDetails($username, $gender, $first, $last, $animalchoice, $description) {
        $select = $this->db->prepare('update users set gender=:gender, first=:first, last=:last, animal_choice=:animalchoice, description=:description where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->bindParam(':gender', $gender, PDO::PARAM_STR);
        $select->bindParam(':first', $first, PDO::PARAM_STR);
        $select->bindParam(':last', $last, PDO::PARAM_STR);
        $select->bindParam(':animalchoice', $animalchoice, PDO::PARAM_STR);
        $select->bindParam(':description', $description, PDO::PARAM_STR);
        $select->execute();
        return $select;
    }
    
    function addPost($username, $contents, $image, $name) {
        $insert = $this->db->prepare('insert into posts(posted_by,image_name,image,caption,timestamp,reported) values(:posted_by,:name,:image,:caption,NOW(),0)');
        $insert->bindParam(':posted_by', $username, PDO::PARAM_STR);
        $insert->bindParam(':caption', $contents, PDO::PARAM_STR);
        $insert->bindParam(':image', $image, PDO::PARAM_LOB);
        $insert->bindParam(':name', $name, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    function getPosts($username) {
        $select = $this->db->prepare('select * from posts where posted_by=:username order by timestamp desc');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    function getAllPosts() {
        $select = $this->db->prepare('select * from posts order by timestamp desc');
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    function removePost($pictureid) {
        $delete = $this->db->prepare('delete from posts where post_id=:picid');
        $delete->bindParam(':picid', $pictureid, PDO::PARAM_INT);
        $delete->execute();
    }
    
    function addComment($username, $content, $post_id) {
        $insert = $this->db->prepare('insert into comments(comment_by,timestamp,content,comment_on,reported) values(:comment_by,NOW(),:content,:comment_on,0)');
        $insert->bindParam(':comment_by', $username, PDO::PARAM_STR);
        $insert->bindParam(':comment_on', $post_id, PDO::PARAM_STR);
        $insert->bindParam(':content', $content, PDO::PARAM_STR);
        return $insert->execute();
    }
    

    function getComments($post_id) {
        $select = $this->db->prepare('select * from comments where comment_on=:post_id order by timestamp desc');
        $select->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $select->execute();
        $result = $select->fetchAll();
        return $result;

    }
}