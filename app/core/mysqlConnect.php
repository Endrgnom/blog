<?php
$servername = "192.168.200.13";
$username = "root";
$password = "";
$DBname = "db_blog";

$mysqli = new mysqli($servername, $username, $password, $DBname);

if ($mysqli -> connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
    exit();
};