<?php
require 'connect.php';

// Sanitize
$to_username = $_GET['to'];

$to_uid = getUserIdByUserName($to_username);

if ($to_uid == false) {
    http_response_code(404);
    exit;
}

$from_username = $_GET['from'];

$from_userid = getUserIdByUserName($from_username);

if ($from_userid == false) {
    http_response_code(400);
    exit;
}

$msg_text = $_GET['text'];

// Add message to message table
$db->exec('BEGIN');
$result = $db->query("INSERT INTO 'messages' (user_id, from_user, message)
    VALUES ('$to_uid', '$from_userid', '$msg_text')");

$db->exec('COMMIT');

$db->close();

function getUserIdByUserName($username) {
    $database = getDB();
    // Get by username.
    $sql = "SELECT id FROM 'users' WHERE username = '$username' ";
    return $database->querySingle($sql, false);
}
