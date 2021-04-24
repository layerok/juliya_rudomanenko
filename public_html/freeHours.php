<?php
include("is_ajax_request.php");
if(is_ajax_request()){
require_once("../includes/db_connection.php");
  // 2. Производим запрос к базеданныx
  $query  = "SELECT date,time ";
  $query .= "FROM sessions ";
  $query .= "WHERE date >= '{$_GET['from']}' AND date <= '{$_GET['to']}' ";
  $result = mysqli_query($connection,$query);
  //Тестирует если есть ошибка запроса
  if(!$result){
    die("Database query failed.");
  }

    $array = array();
    $count = 0;
      //3. Использование возращаемых данный (если такие есть)
      while($services = mysqli_fetch_assoc($result)){
        $array[$count]= $services;
        $count=$count+1;
        // Вывод данных с каждого ряда
        //echo json_encode($services, JSON_FORCE_OBJECT)
      }
      $array['length']= $count;
      echo json_encode($array, JSON_FORCE_OBJECT);


      // 4. Освободить возращаемые данные
      mysqli_free_result($result);



//5.закрытие соединения к базе данных
  mysqli_close($connection);
}else{
  header("Location: offeringPage.php");
  die();;
}

?>
