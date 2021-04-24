<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Добавление услуги</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>
    <?php $errors = errors();?>
    <?php echo form_errors($errors); ?>
    <h2>Добавить услугу</h2>
    <form enctype="multipart/form-data" action="create_service.php" method="post">
      <p>Название услуги</p>
      <input type="text" name="service_name" value="">
      <p>Подзагаловок</p>
      <input type="text" name="service_sub_headline" value="">
      <p>Цена</p>
      <input type="text" name="service_price" value="">
      <p>Продолжительность сеанса</p>
      <input type="text" name="service_duration" value="">
      <p>Описание услуги</p>
      <textarea name="service_content"></textarea>
      <p>Изображение</p>
      <input type="file" name="picture"><br/></br>
      <input type="submit" name="submit" value="Добавить услугу">
    </form>
    <br/>
    <a href="manage_content_service.php">Отмена</a>
  </body>
  </html>

    <?php
    // 5. Закрываю соединение с базой данных
    if(isset($connection)){
      mysqli_close($connection);
    }
    ?>
