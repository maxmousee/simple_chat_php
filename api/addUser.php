<?php
require 'connect.php';

// Sanitize
$username = $_GET['username'];

$user_exists = getUserIdByUserName($username);

if ($user_exists == true) {
    http_response_code(400);
    exit;
}

// Add message to message table
$db->exec('BEGIN');
$result = $db->query("INSERT INTO 'users' (username)
    VALUES ('$username')");

$db->exec('COMMIT');

$db->close();

function getUserIdByUserName($username) {
    $database = getDB();
    // Get by username.
    $sql = "SELECT id FROM 'users' WHERE username = '$username' ";
    return $database->querySingle($sql, false);
}
