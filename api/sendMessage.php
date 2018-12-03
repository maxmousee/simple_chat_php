<?php
require 'Message.php';

if (isset($_GET['to']) && isset($_GET['from']) && isset($_GET['text'])) {

    // Sanitize
    $to_username = $_GET['to'];
    $from_username = $_GET['from'];
    $msg_text = $_GET['text'];
    
    try {
        Message::sendMessage($from_username, $to_username, $msg_text);
        http_response_code(200);
    } catch (Exception $e) {
        http_response_code(400);
    }

} else {
    http_response_code(400);
}

