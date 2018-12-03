<?php
/**
 * Returns the list of messages.
 */

require 'connect.php';

// Sanitize.
$username = $_GET['username'];

$uid = getUserIdByUserName($username);

if ($uid == false) {
    http_response_code(404);
    exit;
}

// Get by user_id

$result = $db->querySingle("SELECT * FROM 'messages' WHERE user_id = '$uid' ORDER BY time DESC", true);

$json = json_encode($result);

echo $json;

$db->close();

function getUserIdByUserName($username) {
    $database = getDB();
    // Get by username.
    $sql = "SELECT id FROM 'users' WHERE username = '$username' ";
    return $database->querySingle($sql, false);
}