<?php

// Create a new database, if the file doesn't exist and open it for reading/writing.
// The extension of the file is arbitrary.

$db = getDB();
// Create a table.
$db->query('CREATE TABLE IF NOT EXISTS "messages" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "user_id" INTEGER,
    "from_user" INTEGER,
    "message" VARCHAR NOT NULL,
    "time" DATETIME DEFAULT CURRENT_TIMESTAMP
)');

$db->query('CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "username" VARCHAR
)');

$db->exec('BEGIN');
$db->query('INSERT OR REPLACE INTO "users" ("id", "username")
    VALUES (42, "maxmouse")');
$db->exec('COMMIT');
$db->exec('BEGIN');
$db->query('INSERT OR REPLACE INTO "users" ("id", "username")
    VALUES (43, "john")');
$db->exec('COMMIT');

function getPDO() {
    try{
        $pdo = new PDO('sqlite:'.dirname(__FILE__).'/messenger.sqlite');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(Exception $e) {
        echo $e->getMessage();
        die();
    }
}

function getDB() {
    return new SQLite3('messenger.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
}
