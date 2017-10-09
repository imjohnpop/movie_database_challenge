<?php
    require_once 'db_config.php';

    function db_connect() {
        global $host;
        global $username;
        global $userpwd;
        global $dbname;
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $userpwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }