<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!isset($_GET["post_id"]) || empty($_GET["post_id"])){
  redirect_to("manage_content.php");
} ?>
<?php $id = mysql_prep($_GET['post_id']);?>
<?php $current_post = find_post_by_id($id);?>
<?php if(isset($_POST['submit'])){
// Оброботка формы

// validation_function
  $path = "img/";
  $required_fields = array("headline","content");
  validate_presence($required_fields);

  $fields_with_max_length = array("headline" =>100);
  validate_max_length($fields_with_max_length);

  if($_FILES['picture']['name']==''){
    $image = $current_post['image'];
  }else{
    can_upload($_FILES['picture']);
    if(empty($errors)){
      $image = $path . make_upload($_FILES['picture'],$path);
      if(is_file($current_post['image'])) {
          unlink($current_post['image']);
      }
    }

  }
  if(empty($errors)){

    // Обновновление поста
    $headline = mysql_prep($_POST["headline"]);
    $content = mysql_prep($_POST["content"]);
    $date = date('Y-m-d');
    $author = "Юлия Рудоманенко";
    $views = 0;
    // 2. Производим запрос к базеданных
    // Вносим данные в таблицу customers
    $query  = "UPDATE posts SET ";
    $query .= "author = '{$author}', ";
    $query .= "headline = '{$headline}', ";
    $query .= "content = '{$content}', ";
    $query .= "date = '{$date}', ";
    $query .= "views = '{$views}', ";
    $query .= "image = '{$image}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection,$query);

    if($result && mysqli_affected_rows($connection)>=0){
      // Успех
      $_SESSION["message"] = "Публикация обновлена.";
      redirect_to("manage_content.php");
    }else{
      //Failure
      $message = "Обновление публикации провалено.";
    }
  }
}else{
  // это get запрос
}// end: if(isset($_POST['submit']))

 ?>
<?php if(!$current_post){
  redirect_to("manage_content.php");
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Редактировать публикацию</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/CRUD.css">
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
    <div class="main">
      <div class="items"><h2>Редактировать пост</h2></div>
      <div class="items">
        <form enctype="multipart/form-data" action="edit_post.php?post_id=<?php echo urlencode($current_post['id'])?>" method="post">
          <div class="form-items">
            <p>Заголовок</p>
            <input type="text" name="headline" value="<?php echo htmlentities($current_post["headline"]); ?>">
          </div>
          <div class="form-items form-textarea">
            <p>Текст поста</p>
            <textarea name="content" ><?php echo htmlentities($current_post["content"]); ?></textarea>
          </div>
          <div class="form-items">
            <img src="<?php echo htmlentities($current_post["image"]); ?>" >
          </div>
          <div class="form-items">
            <input type="file" name="picture">
          </div>

          <div class="form-items form-button"><input type="submit" name="submit" value="Изменить пост"></div>
       </form>
      </div>
      <div class="items">
        <a href="manage_content.php">Назад</a>
        <a href="delete_post.php?post_id=<?php echo urlencode($current_post["id"])?>" onclick ="return confirm('Мама, ты уверена, что хочешь удалить пост?');">Удалить</a>
      </div>
      <div class="items"></div>
    </div>
  </body>
  </html>
    <?php
    // 5. Закрываю соединение с базой данных
    if(isset($connection)){
      mysqli_close($connection);
    }
    ?>
