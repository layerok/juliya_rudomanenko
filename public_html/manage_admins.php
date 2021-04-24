<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
  $admin_set = find_all_admins();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Управление администраторами</title>
  </head>
  <body>
    <div id="main">
      <?php echo message(); ?>
      <a href="admin.php">&laquo; Главное меню</a></br></br>
      <h2>Управление администраторами</h2>
      <table>
        <tr>
          <th style="text-align: left; width:200px;">Имя пользователя</th>
          <th colspan="2" style="text-align:left;">Действия</th>
        </tr>
        <?php while($admin = mysqli_fetch_assoc($admin_set)){ ?>
        <tr>
          <td><?php echo htmlentities($admin["username"]);?>
          </td>
          <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]);?>">Редактировать</a></td>
          <td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]);?>" onclick="return confirm('Are you sure?');">Удалить</a></td>
        </tr>
        <?php } ?>
      </table>
      <br/>
      <a href="new_admin.php">Добавить нового администратора</a>

    </div>
  </body>
</html>
<?php
// 5. Закрываю соединение с базой данных
if(isset($connection)){
  mysqli_close($connection);
}
?>
