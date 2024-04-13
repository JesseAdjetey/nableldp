<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'nable';

$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

if($connection -> connect_error){
    throw new Exception("Sorry! Connection failed." . $connection -> connect_error);
    die("Connection failed" . $e->getMessage());
}
?>
