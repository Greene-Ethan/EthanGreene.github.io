<?php

Class Database {
    private static $dsn = 'mysql:host=localhost;dbname=dukedom';
    private static $username = 'root';
    private static $password = 'password';
    private static $db;
    private function __construct() {}

public static function getDB() {
    if (!isset(self::$db)) {
        try {
            self::$db = new PDO(self::$dsn,
                                self::$username,
                                self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error1.php');
                exit();
            }
        }
        return self::$db;
    }
}
