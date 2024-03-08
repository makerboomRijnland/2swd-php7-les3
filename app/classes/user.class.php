<?php

require_once 'conf/database.php';

class User {

    public $username;
    public $email;
    private $password;

    public function __construct($data = array()) {
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public function checkPassword($password) : bool {
        return password_verify($password, $this->password);
    }
}

function find_user($username) : User | null {
    
    global $db;

    //SELECT user from database
    $query = "SELECT `username`, `password`, `email` FROM `users` WHERE `username` = ?";
    
    $statement = $db->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if(!empty($row)) {
        return new User($row);
    } else {
        return null;
    }
}