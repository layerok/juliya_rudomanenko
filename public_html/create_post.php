<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])){
// Оброботка формы
$_SESSION['headline'] = $_POST["headline"];
$_SESSION['content'] = $_POST["content"];
$headline = mysql_prep($_POST["headline"]);
$content = mysql_prep($_POST["content"]);
$date = date('Y-m-d');
$author = "Юлия Рудоманенко";
$views = 0;
$path = 'img/';


// validation_function
$required_fields = array("headline","content");
validate_presence($required_fields);

$fields_with_max_length = array("headline" =>100);
validate_max_length($fields_with_max_length);

can_upload($_FILES['picture']);

if(!empty($errors)){
  $_SESSION["errors"] = $errors;
  redirect_to("new_post.php");
}else{
  //make_upload($_FILES['file']);
  $image = $path . make_upload($_FILES['picture'],$path);
// 2. Производим запрос к базеданных
// Вносим данные в таблицу customers
$query  = "INSERT INTO posts (";
$query .= "author, headline, content, date, views,image";
$query .= ") VALUES (";
$query .= "'{$author}', '{$headline}', '{$content}','{$date}',{$views},'{$image}' ";
$query .= ")";

$result = mysqli_query($connection,$query);
$id = mysqli_insert_id($connection);


if($result){
  // Успех
  $_SESSION["message"] = "Публикация создана.";
  redirect_to("manage_content.php");
}else{
  //Failure
  $_SESSION["message"] = "Публикация не создана.";
  redirect_to("new_post.php");
}
}
}else{
  // это get запрос
  redirect_to("new_post.php");
}

 ?>

<?php
if(isset($connection)){mysqli_close($connection);}
?>
