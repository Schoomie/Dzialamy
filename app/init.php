<?php

session_start();

$SESSION['user_id'] = 1;

 $db = new PDO('mysql:dbname=todo;host=localhost','root','root');



?>