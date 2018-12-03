<?php
require 'connect.php';

// Sanitize.
$uid = $_GET['user_id'];

// Get by id.
$sql = "SELECT * FROM 'users' WHERE id = $uid ";

$result = $db->querySingle($sql, true);

$json = json_encode($result);

echo $json;

$db->close();

exit;