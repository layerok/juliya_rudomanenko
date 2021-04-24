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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/jquery.littlelightbox.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/jquery.littlelightbox.js"></script>
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
    <div class="about_content">
        <div class="about_content_headline"><h2>Сертификаты</h2></div>
        <div class="about_certificates_container container content">
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_1.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_1.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_2.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_2.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_3.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_3.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_4.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_4.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_5.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_5.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_6.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_6.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_7.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_7.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_8.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_8.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_9.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_9.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_10.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_10.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_11.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_11.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_12.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_12.jpg" alt="" /></a></div>
            <div class="certificate"><a class="lightbox thumbnail" href="img/certificate_13.jpg" data-littlelightbox-group="gallery" title=""><img src="img/certificate_13.jpg" alt="" /></a></div>
        </div>
    </div>
    <script>
        $('.lightbox').littleLightBox();
    </script>
  <?php
  include("../includes/layouts/footer.php");
  ?>