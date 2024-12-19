<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'login';

$conn = mysqli_connect($host,$user,$password,$db);

if (!$conn) {
     echo 'Connection Failed'. mysqli_connect_error(); 
} 



?>