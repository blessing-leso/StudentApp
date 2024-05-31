<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "StudentDB";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
    // echo "Database created successfully";
} else {
    // echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, $db);
//users
$query_create_table = "CREATE TABLE IF NOT EXISTS `member` (
    `id` int(11) NOT NULL PRIMARY KEY  AUTO_INCREMENT,
    `email` varchar(400) DEFAULT NULL,
    `password` varchar(400) DEFAULT NULL,
    `name` varchar(400) DEFAULT NULL ,
    `surname` varchar(400) DEFAULT NULL
  ) ";

if (mysqli_query($conn, $query_create_table)) {
    //echo "table created successfully";
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//survey answers
$query_create_table = "CREATE TABLE IF NOT EXISTS `survey` (
    `id` int(11) NOT NULL PRIMARY KEY  AUTO_INCREMENT,
    `MemberEmail` varchar(400) DEFAULT NULL,
    `answer` varchar(400) DEFAULT NULL,
    `questionID` varchar(400) DEFAULT NULL
  ) ";

if (mysqli_query($conn, $query_create_table)) {
    //echo "table created successfully";
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

function makeMessage($status, $message)
{
    header('Content-Type: application/json; charset=utf-8');
    $res = json_encode(["status" => $status, "message" => $message]);
    print($res);
    exit();
}