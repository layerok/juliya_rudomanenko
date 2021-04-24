<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in();
  $table = "{$_GET['table_name']}";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>База данных</title>
    <link rel="stylesheet" href="css/cms.css">
  </head>
  <?php $table_set = find_all($table);
        $table_columns_set = find_all_columns_from($table);
  ?>
  <body>
    <div class="left-side-panel">
      <nav>
        <ul>
          <a href="admin.php"><li>&laquo; Главное меню</li></a>
        </ul>
      </nav>
    </div>
    <div class="table">
      <div class="row"></div>
      <div class="row">
        <?php
          while($table_columns = mysqli_fetch_assoc($table_columns_set)){
        ?>
        <div class="fields"><h4><?php echo $table_columns['Field']; ?></h4></div>

      <?php
         $result_array[] = $table_columns;
        }
         ?>
      </div>
      <?php $table_set = find_all($table); ?>
      <?php while($table = mysqli_fetch_assoc($table_set)){ ?>
      <div class="row">
        <?php foreach($result_array as $value){ ?>
          <div class="fields"><p><?php echo $table["{$value['Field']}"]; ?></p></div>
        <?php } ?>
      </div>
    <?php } ?>
    </div>
    <?php
    //4. Освободить возращаюмые данные
    //mysqli_free_result($message_set);
     ?>
  </body>
</html>
