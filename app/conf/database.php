<?php

$db = new mysqli("localhost", "root", "root");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
