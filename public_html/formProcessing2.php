<?php
  include("is_ajax_request.php");
  //1.Создаем соединение с базой данных
  require_once("../includes/db_connection.php");
  require_once("../includes/functions.php");
  require_once("../includes/validation_functions.php");
  header("Content-Type: text/html; charset=UTF-8");
  //часто это значение form в $_POST
  $name = mysql_prep(trim($_POST["name"]));
  $email = mysql_prep(trim($_POST["email"]));
  if(isset($_POST['topic'])&& !empty($_POST['topic'])){
    $topic = trim($_POST['topic']);
  }else{
    $topic = "NULL";
  }
  $message = mysql_prep(trim($_POST['message']));
  $required_fields = array("name","email","message");

  validate_presence($required_fields);
  $fields_with_max_length = array("name" =>40,"email" =>50,"topic" =>60,);
  validate_max_length($fields_with_max_length);
  if(!empty($errors)){
    echo json_encode($errors, JSON_FORCE_OBJECT);
    return;
  }else{
  // 2. Производим запрос к базеданным
  // Вносим данные в таблицу customers
  $query  = "INSERT INTO messages (";
  $query .= "name, email, subject, message";
  $query .= ") VALUES (";
  $query .= "'{$name}', '{$email}', '{$topic}','{$message}' ";
  $query .= ")";

  $result = mysqli_query($connection,$query);
  confirm_query($result);
  echo json_encode($errors, JSON_FORCE_OBJECT);
}
 //5.закрытие соединения к базе данных
   mysqli_close($connection);

 ?>
