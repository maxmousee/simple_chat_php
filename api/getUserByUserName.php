<?php
require 'connect.php';

// Sanitize.
$username = $_GET['username'];

// Get by username.
$sql = "SELECT * FROM 'users' WHERE username = '$username'";

$result = $db->querySingle($sql, true);

if ($result == false) {
    http_response_code(404);
    exit;
}

$json = json_encode($result);

echo $json;

$db->close();

exit;