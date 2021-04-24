<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Создать публикацию</title>
    <link rel="stylesheet" href="css/CRUD.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>
    <?php $errors = errors();?>
    <?php echo form_errors($errors); ?>
    <div class="main">
      <div class="items"><h2>Написать пост</h2></div>
      <div class="items">
        <form enctype="multipart/form-data" action="create_post.php" method="post">
          <div class="form-items">
            <p>Заголовок</p>
            <input type="text" name="headline" value="<?php if(isset($_SESSION['headline'])){echo $_SESSION['headline'];}?>">
          </div>
          <div class="form-items">
            <p>Текст поста</p>
            <textarea name="content"><?php if(isset($_SESSION['content'])){echo $_SESSION['content'];}?></textarea>
          </div>
          <div class="form-items">
            <p>Изображение</p>
            <input type="file" name="picture">
          </div>
          <div class="form-items form-button"><br><input type="submit" name="submit" value="Опубликовать"></div>
        </form>
      </div>
      <div class="items"><br><a href="manage_content.php">Cancel</a></div>
    </div>
  </body>
  </html>
  <?php if(isset($connection)){mysqli_close($connection);} ?>
