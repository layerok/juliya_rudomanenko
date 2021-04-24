<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
  if(isset($_POST['submit'])){
    $required_fields = array("username", "password");
    validate_presence($required_fields);

    $fields_with_max_length = array("username" => 30);
    validate_max_length($fields_with_max_length);

  if(empty($errors)){
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);

    $query = "INSERT INTO admins (";
    $query .= " username, hashed_password";
    $query .= ") VALUES (";
    $query .= "'{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if($result){
      // Успех
      $_SESSION["message"] = "Администратор создан.";
      redirect_to("manage_admins.php");
    }else{
      //Failure
      $_SESSION["message"] = "Создание администратора провалилось";
    }
  }
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div id="main">
       <h2>Создать админстратора</h2>
       <form action="new_admin.php" method="post">
         <p>Логин:
         <input type="text" name="username" value="">
         </p>
         <p>Пароль:
         <input type="password" name="password" value="">
         </p>
         <input type="submit" name="submit" value="Создать администратора">
       </form>
     <br>
     <a href="manage_admins.php">Cancel</a>
     </div>
   </body>
 </html>
 <?php
 // 5. Закрываю соединение с базой данных
 if(isset($connection)){
   mysqli_close($connection);
 }
 ?>
