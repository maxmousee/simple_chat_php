<?php
/**
 * Returns the list of messages.
 */

require 'Message.php';

// Sanitize.
$username = $_GET['username'];

try {
    $result = Message::getMessagesFromUser($username);
    echo $result;
} catch (Exception $e) {
    http_response_code(400);
}
