<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
  $admin = find_admin_by_id($_GET["id"]);

  if(!$admin){
    redirect_to("manage_admins.php");
  }
?>
<?php
  if(isset($_POST['submit'])){
    $required_fields = array("username", "password");
    validate_presence($required_fields);

    $fields_with_max_length = array("username" => 30);
    validate_max_length($fields_with_max_length);

  if(empty($errors)){
    $id = $admin["id"];
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);

    $query = "UPDATE admins SET ";
    $query .= "username = '{$username}', ";
    $query .= "hashed_password = '{$hashed_password}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if($result && mysqli_affected_rows($connection) == 1){
      // Успех
      $_SESSION["message"] = "Администратор обновлен.";
      redirect_to("manage_admins.php");
    }else{
      //Failure
      $_SESSION["message"] = "Обновление администратора провалилось";
    }
  }
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
     <title>Редактировать администратора</title>
   </head>
   <body>
     <div id="main">
       <h2>Редактирование админстратора</h2>
       <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]);?>" method="post">
         <p>Логин:
         <input type="text" name="username" value="<?php echo htmlentities($admin["username"]);?>">
         </p>
         <p>Пароль:
         <input type="password" name="password" value="">
         </p>
         <input type="submit" name="submit" value="Редактировать администратора">
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
