<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Админка</title>
    <link rel="stylesheet" href="css/cms.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>

    <div class="left-side-panel">

      <nav>
        <p>Добро пожаловать в админскую зону, <?php echo htmlentities($_SESSION["username"]); ?></p>
        <ul>
          <a href="manage_content.php"><li>Управлять содержимым сайта</li></a>
          <a href="manage_admins.php"><li>Управлять администраторами</li></a>
          <a href="data.php?table_name=customers"><li>Клиенты</li></a>
          <a href="data.php?table_name=sessions"><li>Записи</li></a>
          <a href="data.php?table_name=messages"><li>Сообщения</li></a>
          <a href="logout.php"><li>Выход</li></a>
        </ul>
      </nav>
    </div>
  </body>
</html>
