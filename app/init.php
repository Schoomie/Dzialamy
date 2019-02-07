<?php

session_start();

$_SESSION['user_id'] = 1;


try {
//    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    $db = new PDO('mysql:dbname=awidlak_abcd;host=88.198.33.199','awidlak_abcd','Abcdef1234!');

    // set the PDO error mode to exception
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die("Connection failed: " . $e->getMessage());
}

if(!isset($_SESSION['user_id'])) {
    die('You are not signed in');
}



?>