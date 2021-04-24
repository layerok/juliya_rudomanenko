<?php
//Устанавливаем соединение с базой данных
header("Content-Type: text/html; charset=UTF-8");
define("DB_SERVER", "localhost");
define("DB_NAME", "juliya_rudomanenko");
define("DB_PASS", "root");
define("DB_USER", "root");
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$connection->query( "SET CHARSET utf8" );

if(mysqli_connect_errno()){
  die("Database connection failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno() . ")"
  );
} 
$domain = "juliyarudomanenko.com";
?>