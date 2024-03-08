<?php

$db = new mysqli("mariadb", "root", "root", "2swd_php7");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
