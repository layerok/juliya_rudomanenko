<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$current_service = find_service_by_id($_GET["service_id"]);
if(!$current_service){
  redirect_to("manage_content_service.php");
}
if(is_file($current_service['image'])) {
  unlink($current_service['image']);
}

$id = $current_service["id"];
$query = "DELETE FROM services WHERE id = {$id} LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection)==1){
  // Успех
  $_SESSION["message"] = "Услуга удалена";
  redirect_to("manage_content_service.php");
  }else{
  //Failure
  $message = "Удаление услуги провалилось.";
  redirect_to("manage_content_service.php");
  }
?>
<?php
// 5. Закрываю соединение с базой данных
if(isset($connection)){
  mysqli_close($connection);
}
?>
