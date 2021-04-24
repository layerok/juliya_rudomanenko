<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!isset($_GET["service_id"]) || empty($_GET["service_id"])){
  redirect_to("manage_content_service.php");
} ?>
<?php $id = mysql_prep($_GET['service_id']);?>
<?php $current_service = find_service_by_id($id);?>
<?php if(isset($_POST['submit'])){
// Оброботка формы

// validation_function
$required_fields = array("service_name","service_content","service_price","service_duration");
validate_presence($required_fields);

$fields_with_max_length = array("service_name" =>100);
validate_max_length($fields_with_max_length);
$path = "img/services/";
  if($_FILES['picture']['name']==''){
    $image = $current_service['image'];
  }else{
    can_upload($_FILES['picture']);
    if(empty($errors)){
      $image = $path . make_upload($_FILES['picture'],$path);
        if(is_file($current_service['image'])) {
            unlink($current_service['image']);
        }

    }

  }
  if(empty($errors)){

    // Обновновление услуги
    $service_name = mysql_prep($_POST["service_name"]);
    $service_description = mysql_prep($_POST["service_content"]);
    $service_price = mysql_prep($_POST["service_price"]);
    $service_duration = mysql_prep($_POST["service_duration"]);
    $service_sub_headline = mysql_prep($_POST["service_sub_headline"]);
    // 2. Производим запрос к базеданных
    // Вносим данные в таблицу customers
    $query  = "UPDATE services SET ";
    $query .= "service = '{$service_name}', ";
    $query .= "description = '{$service_description}', ";
    $query .= "price = '{$service_price}', ";
    $query .= "duration = '{$service_duration}', ";
    $query .= "sub_headline = '{$service_sub_headline}', ";
    $query .= "image = '{$image}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection,$query);

    if($result && mysqli_affected_rows($connection)>=0){
      // Успех
      $_SESSION["message"] = "Услуга обновлена";
      redirect_to("manage_content_service.php");
    }else{
      //Failure
      $message = "Обновление услуги провалилось.";
    }
  }
}else{
  // это get запрос
}// end: if(isset($_POST['submit']))

 ?>
<?php if(!$current_service){
  redirect_to("manage_content_service.php");
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Редактировать услугу</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
      .error {
        color:#8D0D19;
        border: 2px solid #8D0D19;
        margin: 1em 0; padding:1em;
      }
    </style>
  </head>
  <body>
    <?php if(!empty($message)){
      echo "<div class=\"message\">" . htmlentities($message) . "</div>";
    }?>

    <?php echo form_errors($errors); ?>
    <h2>Редактировать услугу</h2>
    <form enctype="multipart/form-data" action="edit_service.php?service_id=<?php echo urlencode($current_service["id"])?>" method="post">
      <p>Название услуги</p>
      <input type="text" name="service_name" value="<?php echo htmlentities($current_service["service"]); ?>">
      <p>Подзагаловок</p>
      <input type="text" name="service_sub_headline" value="<?php echo htmlentities($current_service["sub_headline"]); ?>">
      <p>Цена</p>
      <input type="text" name="service_price" value="<?php echo htmlentities($current_service["price"]); ?>">
      <p>Продолжительность сеанса</p>
      <input type="text" name="service_duration" value="<?php echo htmlentities($current_service["duration"]); ?>">
      <p>Описание услуги</p>
      <textarea name="service_content"><?php echo htmlentities($current_service["description"]); ?></textarea>
      <p>Изображение</p>
      <input type="file" name="picture"><br/></br>
      <input type="submit" name="submit" value="Отредактировать услугу">
    </form>
    <br/>
    <a href="manage_content_service.php">Назад</a>
    &nbsp;
    &nbsp;
    <a href="delete_service.php?service_id=<?php echo urlencode($current_service["id"])?>" onclick ="return confirm('Мама, ты уверена, что хочешь удалить услугу?');">Удалить</a>
  </body>
  </html>

    <?php
    // 5. Закрываю соединение с базой данных
    if(isset($connection)){
      mysqli_close($connection);
    }
    ?>
