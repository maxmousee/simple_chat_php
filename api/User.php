<?php
require_once 'connect.php';

final class User
{
    public static function createUser($username) {
        $user_exists = User::getUserIdByUserName($username);

        if ($user_exists == true) {
            return false;
        }

        $db = getDB();
        // Add message to message table
        $db->exec('BEGIN');
        $result = $db->query("INSERT INTO 'users' (username)
            VALUES ('$username')");

        $db->exec('COMMIT');

        $db->close();

        return true;
    }

    public static function getUserIdByUserName($username) {
        $database = getDB();
        // Get by username.
        $sql = "SELECT id FROM 'users' WHERE username = '$username' ";
        return $database->querySingle($sql, false);
    }

    public static function getUserByUserName($username) {
        $database = getDB();
        // Get by username.
        $sql = "SELECT * FROM 'users' WHERE username = '$username' ";

        $result = $database->querySingle($sql, true);

        if(empty($result)) {
            return false;
        }

        $json = json_encode($result);

        return $json;
    }
}