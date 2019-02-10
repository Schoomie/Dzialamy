
<?php


$login=$_POST['login'];
$haslo=$_POST["haslo"];


session_start();
$db = new PDO('mysql:dbname=awidlak_abcd;host=88.198.33.199','awidlak_abcd','Abcdef1234!');


/*
$checkingQuery = $db->prepare("SELECT id from users WHERE username='$login' AND pass='$haslo'");
$checkingQuery->execute(array($login, $haslo));
$checkingQuery->fetchColumn();
*/

// select a particular user by id

$query=$db->prepare("SELECT id FROM users WHERE username='$login' AND pass='$haslo'");
$query->setFetchMode(PDO::FETCH_ASSOC);

$query->execute();
$lala=0;
while($row=$query->fetch()){

 $win=$row['id'];



}







$_SESSION['user_id'] =$win;

if(!isset($_SESSION['user_id'])){
    die('you are not signed in');
}







