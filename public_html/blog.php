<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Блог</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
          <a class="current_page" href="blog.php"><li>Блог</li></a>
        </ul>
      </nav>
      </div>
    </header>

    <div style="display:none" class="post-container-overlay">
      <div class="post-nav">
        <div class="all-posts">Все посты</br></div>
        <a href="blog.php">Назад</a>
      </div>
      <div class="post-inner-overlay">
        <div class="user">
          <div class="post_user_info inline">
            <div class="post_user_name">
              <span class="post_user_name-overlay"></span>
            </div>
            <div class="post_date">
              <span class="post_date-overlay"></span>
              <div class="dot inline">
              </div>
            </div>
          </div>
        </div>
        <div class="post_heading">
          <h6 class="post_heading-overlay"></h6>
        </div>
        <div class="post_description1">
          <p class="post_description-overlay"></p>
        </div>
        <picture>
          <source id="srcset-overlay" srcset="" >
          <img id="src-overlay" src="<?php echo $domain ?>">
        </picture>
      </div>
    </div>

    <section id="article-container">
      <div class="post-nav">
        <div class="all-posts">Все посты</br></div>
        <div id="login"><a href="login.php">Войти</a></div>
      </div>
      <?php $post_set = find_all_posts(); ?>
      <?php
        while($post = mysqli_fetch_assoc($post_set)){
      ?>
      <article data-post_id="<?php echo $post["id"]?>" >
        <div class="post-items">
          <picture>
            <img src="/<?php echo $post['image'] ?>">
          </picture>
        </div>
        <div class="post-items">
          <div class="description">
            <div class="user">
              <div class="post_user_info inline">
                <div class="post_user_name">
                  <span><?php echo htmlentities($post['author']); ?></span>
                </div>
                <div class="post_date">
                  <span><?php echo $post['date'] ?> </span>
                </div>
              </div>
            </div>
            <div class="post_heading">
              <h6 title="<?php echo htmlentities($post['headline']); ?>"><?php echo mb_strimwidth($post['headline'],0,25,"...");?></h6>
            </div>
            <div class="post_description">
              <p><?php echo htmlentities(mb_strimwidth($post['content'],0,210,"..."));?></p>
            </div>
          </div>
        </div>

      </article>
      <?php
    }
    ?>
  </section>
    <script>
      var src = document.getElementById("src-overlay");
      var srcset = document.getElementById("srcset-overlay");
      var spinner = document.querySelector(".spinner-cube");
      var login = document.getElementById("login");
      var views = document.querySelector(".post_views-overlay");
      var date = document.querySelector(".post_date-overlay");
      var author = document.querySelector(".post_user_name-overlay");
      var headline = document.querySelector(".post_heading-overlay");
      var content = document.querySelector(".post_description-overlay");
      var articleContainer = document.getElementById("article-container");
      var overlay = document.querySelector(".post-container-overlay");
      var allPostsBtn = document.querySelector(".all-posts");
      function showOverlay(event){
        var target = event.target;
        while(target != articleContainer){
          if(target.tagName == 'ARTICLE'){
            show(overlay);
            hide(articleContainer);
            hide(login);
            var xhr = new XMLHttpRequest();
            var link = "getPostContent.php?post_id="+target.dataset.post_id;
            xhr.open('GET',link,true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function (){
              if(xhr.readyState == 2){
                spinner.style.display = "";
              }
              if(xhr.readyState ==  4 && xhr.status == 200){
                spinner.style.display = "none";
                var json = JSON.parse(xhr.responseText);
                author.innerHTML = json.author;
                date.innerHTML = json.date;
                headline.innerHTML = json.headline;
                content.innerHTML = json.content;
                src.src = "<?php echo $domain ?>/"+json.image;
                srcset.srcset = "/"+json.image;
              }
            }
            xhr.send();
            return;
          }
          target = target.parentNode;
        }
      }
      function hide(object){
        object.style.display ="none";
      }
      function show(object){
        object.style.display ="";
      }
      articleContainer.addEventListener("click",function(e){
        showOverlay(e);
      },true);
      allPostsBtn.addEventListener("click",function (){
        show(login);
        hide(overlay);
        show(articleContainer);
      },false);

    </script>
    <?php
    //4. Освободить возращаюмые данные
    mysqli_free_result($post_set);
     ?>
    </section>
    <?php
    $layout_context = "public";
    include("../includes/layouts/footer.php");
    ?>
