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

$pdo = getPDO();

$all_msgs = $pdo -> query("SELECT * FROM 'messages' WHERE user_id = '$uid' ORDER BY time DESC");

$all_results = $all_msgs->fetchAll();

$json = json_encode($all_results);

echo $json;

$db->close();

function getUserIdByUserName($username) {
    $database = getDB();
    // Get by username.
    $sql = "SELECT id FROM 'users' WHERE username = '$username' ";
    return $database->querySingle($sql, false);
}