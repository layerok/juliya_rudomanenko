<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
  $username = "";
  if(isset($_POST['submit'])){
    $required_fields = array("username", "password");
    validate_presence($required_fields);

  if(empty($errors)){
    // Попытка входа

    $username = $_POST["username"];
    $password = $_POST["password"];

    $found_admin = attempt_login($username, $password);

    if($found_admin){
      // Успех
      // Пометить пользователя как авторизированый
      $_SESSION["admin_id"] = $found_admin["id"];
      $_SESSION["username"] = $found_admin["username"];
      redirect_to("admin.php");
    }else{
      //Failure
      $_SESSION["message"] = "Логин или пароль не найден.";
    }
  }
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
     <title>Вход</title>
     <link rel="stylesheet" href="css/login.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
   </head>
   <body>
     <div id="main">
       <?php echo message();?>
       <?php echo form_errors($errors); ?>
       <h1 id="loginTitle">Войти</h2>
       <form action="login.php" method="post">
         <p>Логин</p>
         <input type="text" name="username" value="<?php echo htmlentities($username);?>"><br>
         <p>Пароль</p>
         <input type="password" name="password" value="">
         <input id="loginButton" type="submit" name="submit" value="Ввойти">
       </form>
       <a href="index.php">
         <div class="exit">
           <div class="backslash"></div>
           <div class="forwardslash"></div>
         </div>
       </a>
     </div>
   </body>
 </html>
 <?php
 // 5. Закрываю соединение с базой данных
 if(isset($connection)){
   mysqli_close($connection);
 }
 ?>
