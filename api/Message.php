<?php
require_once 'connect.php';
require_once 'api/User.php';

final class Message
{
    public static function sendMessage($from_username, $to_username, $text) {
        $to_uid = User::getUserIdByUserName($to_username);

        if ($to_uid == false) {
            throw new Exception('Recipient user does NOT exist.');
            exit;
        }

        $from_userid = User::getUserIdByUserName($from_username);

        if ($from_userid == false) {
            throw new Exception('Sender user does NOT exist.');
            exit;
        }

        $db = getDB();
        // Add message to message table
        $db->exec('BEGIN');
        $result = $db->query("INSERT INTO 'messages' (user_id, from_user, message)
            VALUES ('$to_uid', '$from_userid', '$msg_text')");

        $db->exec('COMMIT');

        $db->close();

        return $result;
    }

    public static function getMessagesFromUser($username) {
        $uid = User::getUserIdByUserName($username);

        if ($uid == false) {
            throw new Exception('User does NOT exist.');
        }

        // Get by user_id

        $pdo = getPDO();

        $all_msgs = $pdo -> query("SELECT * FROM 'messages' WHERE user_id = '$uid' ORDER BY time DESC");

        $all_results = $all_msgs->fetchAll();

        $json = json_encode($all_results);

        $db->close();

        return $json;
    }
}