
<?php
session_start();

$_SESSION['user_id']=1;
$db = new PDO('mysql:dbname=awidlak_abcd;host=88.198.33.199','awidlak_abcd','Abcdef1234!');
if(!isset($_SESSION['user_id'])){
    die('you are not signed in');
}