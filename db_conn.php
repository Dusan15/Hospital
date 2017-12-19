<?php

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'bolnica';

$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($conn->connect_errno > 0){
    die('Konekcija je prekinuta iz sledeceg razloga: ' . $conn->connect_error);
}