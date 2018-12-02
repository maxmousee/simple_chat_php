<?php

// Create a new database, if the file doesn't exist and open it for reading/writing.
// The extension of the file is arbitrary.

$db = new SQLite3('messenger.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
// Create a table.
$db->query('CREATE TABLE IF NOT EXISTS "messages" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "user_id" INTEGER,
    "message" VARCHAR,
    "time" DATETIME
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
    VALUES (43, "someonelse")');
$db->exec('COMMIT');
