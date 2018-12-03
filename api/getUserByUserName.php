<?php
require_once 'connect.php';
require_once 'User.php';

if (isset($_GET['username']) && count($_GET) == 1) {

    // Sanitize.
    $username = $_GET['username'];

    $result = User::getUserByUserName($username);

    if ($result == false) {
        http_response_code(404);
    }

    echo $result;

    exit;
} else {
    http_response_code(400);
}