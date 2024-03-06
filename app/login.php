<?php

require_once './models/user.class.php';

if(isset($_POST['login'])) {
    // In toekomst User opzoeken met username in database.
    $user = new User('admin', password_hash("admin123", PASSWORD_DEFAULT));

    // Wachtwoord controle
    if($user->checkPassword($_POST['login']['password'])) {
        echo "You shall pass";
    } else {
        echo "Access denied";
    }
}