<?php
require 'connect.php';
require 'api/User.php';

// Sanitize
$username = $_GET['username'];

$user_created = $User->createUser($username);

if($user_created == true) {
    http_response_code(201);
} else {
    http_response_code(400);
}
