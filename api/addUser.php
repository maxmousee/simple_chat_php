<?php
require_once 'connect.php';
require_once 'User.php';

if (isset($_GET['username']) && count($_GET) == 1)
{
    // Sanitize
    $username = $_GET['username'];

    if (strlen($username) == 0) {
        http_response_code(400);
    }

    $user_created = User::createUser($username);

    if($user_created == true) {
        http_response_code(201);
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(400);
}


