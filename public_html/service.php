<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $id = mysql_prep($_GET['service_id']) ?>
<?php $service = find_service_by_id($id);
  if(!$service){
    redirect_to("offeringPage.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/service.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <script src="https://i.twic.pics/v1/script" async></script>
    <?php require_once("../includes/layouts/spinner.php"); ?>
    <header class="clearfix">
      <div class="header_container">
      <div class="Logo_text">
        <p><a href="index.php">Юлия Рудоманенко</a></p>
      </div>
      <div class="burger">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
      </div>
      <nav id="mainNav" role="navigation">
        <ul>
          <a href="index.php"><li>Главная</li></a>
          <a href="offeringPage.php"><li>Онлайн-запись</li></a>
          <a  href="blog.php"><li>Блог</li></a>
        </ul>
      </nav>
      </div>
    </header>
    <div class="content-wrapper">
      <div class="content">
        <div class="service-headline"><h3><?php echo $service['service']?></h3></div>
        <div class="service-price"><p><?php echo $service['duration']?> | <?php echo $service['price']?></p></div>
        <div class="service-action btn-primary"><a href="offeringPage.php">Записаться</a></div>
        <div class="service-description"><p><?php echo $service['description']?></div>
        <div class="service-image">
          <picture>
            <source srcset="https://i.twic.pics/v1/cover=2:1/resize=100p/http://<?php echo $domain ?>/<?php echo $service['image'] ?> 320w,
                            https://i.twic.pics/v1/cover=16:9/resize=100p/http://<?php echo $domain ?>/<?php echo $service['image'] ?> 768w,
                            https://i.twic.pics/v1/cover=16:9/resize=100p/http://<?php echo $domain ?>/<?php echo $service['image'] ?> 1080w">
            <img src="https://i.twic.pics/v1/cover=16:9/resize=1024/http://<?php echo $domain ?>/<?php echo $service['image'] ?>">
          </picture>
        </div>
      </div>
    </div>
    <?php
    include("../includes/layouts/footer.php");
    ?>
  </body>
</html>
