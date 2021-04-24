<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Психолог</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
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
            <a class="current_page" href="#"><li>Главная</li></a>
            <a href="offeringPage.php"><li>Онлайн-запись</li></a>
            <a href="blog.php"><li>Блог</li></a>
            <a href="about.php"><li>Обо мне</li></a>
          </ul>
        </nav>
      </div>
    </header>
    <div class="top-image-container">
      <div class="top-image twic" style="background-image: url('/img/water.jpg')"></div>
      <div class="top-image_text">
        <h1>Юлия Рудоманенко</h1>
        <p>Психолог, психотерапевт</p>
      </div>
    </div>
      <div class="content-wrapper">
        <?php $service_set = find_all_services(); ?>
        <div class="services">
          <?php
            while($service = mysqli_fetch_assoc($service_set)){
          ?><div class="service">
            <picture >
              <img src="/<?php echo $service['image'] ?>">
            </picture>
          <a href="service.php?service_id=<?php echo $service['id'] ?>"><h5><?php echo $service['service'];?></h3>
          <h6><?php echo $service['sub_headline'];?></h4></a>
        </div><?php }?>
        </div>
        </div><div class="feedback">
        <div class="form">
          <div class="form_inner">
            <h1>Контакты</h1>
            <p>juliyarud19.75@gmail.com</p>
            <p>0678300340</p>
          </div>
          <form class="form1" action="formProcessing2.php" onsubmit="return submitData(this)" method="post">
            <input id="field1" class="input" type="text" name="name" placeholder="Имя"
            ><input id="field2" class="input" type="text" name="email" placeholder="Эл. почта">
            <input id="field3" class="input" type="text" name="topic" placeholder="Тема">
            <textarea id="field4" placeholder="Cообщение" class="input" name="message" ></textarea>
            <button type="submit" name="button">Отправить</button>
            <div class="notification"></div>
          </form>
        </div>
        <div class="feedback_image clearfix">
          <img src="img/profile.jpg" alt="Юлия Рудоманенко">
        </div>
        <div class="about"></div>
      </div>
  <script src="js/sendMessage.js"></script>
  <?php
  include("../includes/layouts/footer.php");
  ?>
