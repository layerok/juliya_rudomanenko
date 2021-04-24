<?php
  include("is_ajax_request.php");
  if(is_ajax_request()){
  //1.Создаем соединение с базой данных
  require_once("../includes/db_connection.php");
  header("Content-Type: text/html; charset=UTF-8");
  //часто это значение form в $_POST
  $customer_name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  if(isset($_POST['phone'])&& !empty($_POST['phone'])){
    $phone_number = trim($_POST['phone']);
  }else{
    $phone_number = "NULL";
  }
  if(isset($_POST['message']) && !empty($_POST['message'])){
    $message = trim($_POST['message']);
  }else{
    $message = "NULL";
  }

  $date = $_POST["date"];
  $time = $_POST["time"];
  $service = $_POST["service"];
  $service_id = $_POST["service_id"];

  // 2. Производим запрос к базеданным
  // Вносим данные в таблицу customers
  $query  = "INSERT INTO customers (";
  $query .= "customer_name, email, phone_number, message";
  $query .= ") VALUES (";
  $query .= "'{$customer_name}', '{$email}', '{$phone_number}','{$message}' ";
  $query .= ")";


  $result = mysqli_query($connection,$query);

  if($result){
    // Успех
    echo "Успех";
  }
    else{
      //Failure
      die("Database query failed. " . mysqli_error($connection)."{$query}");
  }
  $customer_id = mysqli_insert_id($connection);

  // Вносим данные в таблицу sessions
  $query1 = "INSERT INTO sessions (customer_id, service_id, date, time)
             VALUES ({$customer_id},{$service_id},'{$date}','{$time}' )";
  $result1 = mysqli_query($connection,$query1);
  if($result1){
    echo "успех";
  } else{
    die("Database query failed");
  };

 //5.закрытие соединения к базе данных
   mysqli_close($connection);
 }else{
   header("Location: offeringPage.php");
   die();;
 }
 ?>
