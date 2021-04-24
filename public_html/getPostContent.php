<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php");
 $id = mysql_prep($_GET['post_id']);
?>

<?php $post_set = find_all_posts(); ?>
<?php
  while($post = mysqli_fetch_assoc($post_set)){
    if($post['id']==$id){
      $post['content']=nl2br(htmlentities($post['content']));
      echo json_encode($post,JSON_FORCE_OBJECT);
    }
  }
?>
