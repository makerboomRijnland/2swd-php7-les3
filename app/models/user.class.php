<?php

class User {

    public $username;
    private $passwordHash;

    public function __construct($username, $passwordHash) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
    }

    public function checkPassword($password) {
        return password_verify($password, $this->passwordHash);
    }
}

// $admin = new User('admin', password_hash("admin123", PASSWORD_DEFAULT));