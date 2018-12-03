<?php
/**
 * Returns the list of messages.
 */

require_once 'Message.php';

if (isset($_GET['username']) && count($_GET) == 1) {

    // Sanitize.
    $username = $_GET['username'];

    try {
        $result = Message::getMessagesFromUser($username);
        echo $result;
    } catch (Exception $e) {
        http_response_code(400);
    }
} else {
    http_response_code(400);
}