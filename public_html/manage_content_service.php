<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Управлять услугами</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/offeringPage.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://i.twic.pics/v1/script" async></script>
    <header class="clearfix">
      <div class="header_container">
        <div class="Logo_text">
          <p><a href="#">Юлия Рудоманенко</a></p>
        </div>
        <div class="burger">
          <div class="layer"></div>
          <div class="layer"></div>
          <div class="layer"></div>
        </div>
        <nav id="mainNav" role="navigation">
          <ul>
            <a href="#"><li>Главная</li></a>
            <a href="manage_content_service"><li>Онлайн-запись</li></a>
            <a href="manage_content.php"><li>Блог</li></a>
          </ul>
        </nav>
      </div>
    </header>
    <div style="margin-left:80px" class="admin_menu">
      <?php echo message();?>
      <a class="btn-primary" href="admin.php">&laquo; Главное меню</a>
      <a class="btn-primary" href="new_service.php">Добавить услугу</a>
    </div>
    <?php $service_set = find_all_services();?>
    <div  id="content" >
      <div class="offering-content">
        <div class="myServices">
          <div class="login"><a href="logout.php">Выйти</a></div>
          <p>Мои услуги</p>
        </div>
          <?php
            while($service = mysqli_fetch_assoc($service_set)){
          ?>
          <div class="Service">

              <div class="service-items service_img twic" style="background-image: url('<?php echo $service['image']; ?>')"></div>

              <div class="service-items service_title">
                <p><?php echo $service['service']; ?></p>
              </div>
              <div class="service-items service_price">
                <p><?php echo $service['duration'] ?> | <?php echo $service['price']; ?></p>
              </div>
              <div class="service-items service_action">
                  <a href="edit_service.php?service_id=<?php echo $service['id']; ?>"><button class="btn-primary" type="button">Редактировать</button></a>
              </div>
          </div>
          <?php } ?>
    </div>
  </div>
    <script src="js/small-menu.js"></script>
  </body>
</html>
