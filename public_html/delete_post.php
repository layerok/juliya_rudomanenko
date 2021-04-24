<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$current_post = find_post_by_id($_GET["post_id"]);
if(!$current_post){
  redirect_to("manage_content.php");
}
unlink($current_post['image']);
$id = $current_post["id"];
$query = "DELETE FROM posts WHERE id = {$id} LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection)==1){
  // Успех
  $_SESSION["message"] = "Публикация удалена";
  redirect_to("manage_content.php");
  }else{
  //Failure
  $message = "Удаление публикации провалилось.";
  redirect_to("manage_content.php");
  }
?>
<?php
// 5. Закрываю соединение с базой данных
if(isset($connection)){
  mysqli_close($connection);
}
?>
