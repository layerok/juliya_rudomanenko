<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])){
// Оброботка формы
$service_name = mysql_prep($_POST["service_name"]);
$service_description = mysql_prep($_POST["service_content"]);
$service_price = mysql_prep($_POST["service_price"]);
$service_duration = mysql_prep($_POST["service_duration"]);
$service_sub_healine = mysql_prep($_POST["service_sub_headline"]);
$path = 'img/services/';


// validation_function
$required_fields = array("service_name","service_content","service_price","service_duration");
validate_presence($required_fields);

$fields_with_max_length = array("service_name" =>100);
validate_max_length($fields_with_max_length);

can_upload($_FILES['picture']);

if(!empty($errors)){
  $_SESSION["errors"] = $errors;
  redirect_to("new_service.php");
}else{
  //make_upload($_FILES['file']);
  $image = $path . make_upload($_FILES['picture'],$path);
// 2. Производим запрос к базеданных
// Вносим данные в таблицу customers
$query  = "INSERT INTO services (";
$query .= "service, price, duration, description, image, sub_headline";
$query .= ") VALUES (";
$query .= "'{$service_name}', '{$service_price}', '{$service_duration}','{$service_description}','{$image}','{$sub_headline}' ";
$query .= ")";

$result = mysqli_query($connection,$query);
$id = mysqli_insert_id($connection);


if($result){
  // Успех
  $_SESSION["message"] = "Услуга добавлена.";
  redirect_to("manage_content_service.php");
}else{
  //Failure
  $_SESSION["message"] = "Услуга не добавлена.";
  redirect_to("new_service.php");
}
}
}else{
  // это get запрос
  redirect_to("new_service.php");
}

 ?>

<?php
if(isset($connection)){mysqli_close($connection);}
?>
