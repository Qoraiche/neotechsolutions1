<?php

const DB_HOST = 'localhost';
const DB_USER = 'homestead';
const DB_PASS = 'secret';
const DB_NAME = 'neotechsolutions';

try {
    $database = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER, DB_PASS,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}