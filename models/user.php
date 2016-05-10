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
        
        $result = $select->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    // Setting the Details for the users profile page
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
    
    // Add a post to a persons profile
    function addPost($username, $contents, $image, $name) {
        $insert = $this->db->prepare('insert into posts(posted_by,image_name,image,caption,timestamp,reported) values(:posted_by,:name,:image,:caption,NOW(),0)');
        $insert->bindParam(':posted_by', $username, PDO::PARAM_STR);
        $insert->bindParam(':caption', $contents, PDO::PARAM_STR);
        $insert->bindParam(':image', $image, PDO::PARAM_LOB);
        $insert->bindParam(':name', $name, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    // Get the posts from a certain user
    function getPosts($username) {
        $select = $this->db->prepare('select * from posts where posted_by=:username order by timestamp desc');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    // Get posts from every user on the website
    function getAllPosts() {
        $select = $this->db->prepare('select * from posts order by timestamp desc');
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    // Get all the posts that have been reported
    function getReportedPosts() {
        $select = $this->db->prepare('select * from posts where reported=1 order by timestamp desc');
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    // Remove a post 
    function removePost($pictureid) {
        // First delete all of the comments on a post
        // Otherwise, there is a foreign key restraint violated
        $delete = $this->db->prepare('delete from comments where comment_on=:picid');
        $delete->bindParam(':picid', $pictureid, PDO::PARAM_INT);
        $delete->execute();
        
        // Delete the actual post
        $delete = $this->db->prepare('delete from posts where post_id=:picid');
        $delete->bindParam(':picid', $pictureid, PDO::PARAM_INT);
        $delete->execute();
    }
    
    // Add a profile picture for a certain user
    function addProfilePicture($username, $image, $name) {
        $insert = $this->db->prepare('update users set profilepic=:image, profilepic_name=:name where username=:username');
        $insert->bindParam(':username', $username, PDO::PARAM_STR);
        $insert->bindParam(':image', $image, PDO::PARAM_LOB);
        $insert->bindParam(':name', $name, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    // Get the profile picture from the database
    function getProfilePicture($username) {
        $select = $this->db->prepare('select profilepic from users where username=:username');
        $select->bindParam(':username', $username, PDO::PARAM_STR);
        $select->execute();
        $pic = $select->fetch(PDO::FETCH_ASSOC);
        return $pic['profilepic'];
    }
    
    // Add a comment to a certain post
    function addComment($username, $content, $post_id) {
        $insert = $this->db->prepare('insert into comments(comment_by,timestamp,content,comment_on,reported) values(:comment_by,NOW(),:content,:comment_on,0)');
        $insert->bindParam(':comment_by', $username, PDO::PARAM_STR);
        $insert->bindParam(':comment_on', $post_id, PDO::PARAM_STR);
        $insert->bindParam(':content', $content, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    // Get all the comments on a post
    function getComments($post_id) {
        $select = $this->db->prepare('select * from comments where comment_on=:post_id order by timestamp');
        $select->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
    
    // Set a post as reported
    function report($post_id, $date) {
        $insert = $this->db->prepare('update posts set reported=1, timestamp=:date where post_id=:id');
        $insert->bindParam(':id', $post_id, PDO::PARAM_STR);
        $insert->bindParam(':date', $date, PDO::PARAM_STR);
        return $insert->execute();
    }
    
    // Unreport a post
    function unreport($post_id, $date) {
        $insert = $this->db->prepare('update posts set reported=0, timestamp=:date where post_id=:id');
        $insert->bindParam(':id', $post_id, PDO::PARAM_STR);
        $insert->bindParam(':date', $date, PDO::PARAM_STR);
        return $insert->execute();
    }
}