<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/offeringPage.css">
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Услуги</title>
  </head>
  <body>
    <script src="https://i.twic.pics/v1/script" async></script>
    <?php
    require_once("../includes/layouts/spinner.php");
    ?>
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
            <a href="index.php"><li>Главная</li></a>
            <a class="current_page" id="back" href="offeringPage.php"><li>Онлайн-запись</li></a>
            <a href="blog.php"><li>Блог</li></a>
          </ul>
        </nav>
      </div>
    </header>
      <div  id="calendar_sidebar">
        <div style="display:none" id="choiceOfDate" >
          <div class="visitor-header">
            <div class="header-back-btn">
              <i class="fas fa-angle-left"></i>
              <button type="button" name="back"><div class="btn-back-txt">Назад</div></button>
            </div>
               <h3 class="temp-header-title">Расписание</h3>
               <p class="sub-temp-header-title"></p>
            </div>
          <div class="sectioned-page">
            <div class="calendar-controls__content">
              <div class="calendar-header">
                <div style="display:inline-block;width:60%" id="calendar-header__title"></div
               ><div style="display:inline-block;width:40%">
                  <button class="btn-default controls-range-btn-prev" type="button" name="prev"><i class="fas fa-angle-left"></i></button
                 ><button class="btn-default" type="button" name="next"><i class="fas fa-angle-right"></i></button>
                </div>
              </div>
              <table>
                <tr>
                  <th class="day-header">пн</th>
                  <th class="day-header">вт</th>
                  <th class="day-header">ср</th>
                  <th class="day-header">чт</th>
                  <th class="day-header">пт</th>
                  <th class="day-header">сб</th>
                  <th class="day-header">вс</th>
                </tr>
                <tr >
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr >
                <tr>
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr>
                <tr>
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr>
                <tr>
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr>
                <tr>
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr>
                <tr>
                  <td class="day mon" data-year="" data-month="" data-day=""></td>
                  <td class="day tue" data-year="" data-month="" data-day=""></td>
                  <td class="day wed" data-year="" data-month="" data-day=""></td>
                  <td class="day thu" data-year="" data-month="" data-day=""></td>
                  <td class="day fri" data-year="" data-month="" data-day=""></td>
                  <td class="day sat" data-year="" data-month="" data-day=""></td>
                  <td class="day sun" data-year="" data-month="" data-day=""></td>
                </tr>
              </table>
              <div id="calendar-collapse-switch">
                <div style="display:inline-block" id="calendar-switch-label">Показать неделю</div>
                <i style="width:30px;" class="fas fa-angle-up"></i>
              </div>
              <div class="calendar-hours" style ="display:none">
                <ul class="calendar-page-times-of-day">
                  <li class="time-slots-list1">
                    <div>Утром</div>
                    <div data-timeslot="10:00" class="time-slots-list__slot">10:00</div>
                    <div data-timeslot="10:30" class="time-slots-list__slot">10:30</div>
                    <div data-timeslot="11:00" class="time-slots-list__slot">11:00</div>
                    <div data-timeslot="11:30" class="time-slots-list__slot">11:30</div>
                  </li
                 ><li class="time-slots-list2">
                    <div>Днем</div>
                    <div data-timeslot="12:00" class="time-slots-list__slot">12:00</div>
                    <div data-timeslot="12:30" class="time-slots-list__slot">12:30</div>
                    <div data-timeslot="13:00" class="time-slots-list__slot">13:00</div>
                    <div data-timeslot="13:30" class="time-slots-list__slot">13:30</div>
                    <div data-timeslot="14:00" class="time-slots-list__slot">14:00</div>
                    <div data-timeslot="14:30" class="time-slots-list__slot">14:30</div>
                    <div data-timeslot="15:00" class="time-slots-list__slot">15:00</div>
                    <div data-timeslot="15:30" class="time-slots-list__slot">15:30</div>
                    <div data-timeslot="16:00" class="time-slots-list__slot">16:00</div>
                    <div data-timeslot="16:30" class="time-slots-list__slot">16:30</div>
                  </li
                 ><li class="time-slots-list3">
                    <div>Вечером</div>
                    <div data-timeslot="17:00"class="time-slots-list__slot">17:00</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <form action="form_processing.php" method="post" onsubmit="return submitData(this)" id="enroll" class="form" style="display:none">
            <div class="dynamic-form-attribute dynamic-form-attribute__name">
              <label class="label" for="">Имя*</label>
              <input id="name" class="dynamic-form-attribute__input" type="text" name="name" value="">
              <div class="notValidated"></div>
            </div>
            <div class="dynamic-form-attribute dynamic-form-attribute__email">
              <label class="label" for="">Эл.почта*</label>
              <input id="email" class="dynamic-form-attribute__input" type="text" name="email" value="" >
              <div class="notValidated"></div>
            </div>
            <div class="dynamic-form-attribute dynamic-form-attribute__phone">
              <label class="label" for="">Телефон</label>
              <input class="dynamic-form-attribute__input" type="text" name="phone" value="">
            </div>
            <div class="dynamic-form-attribute dynamic-form-attribute__message">
              <label class="label" for="">Добавьте сообщение</label>
              <textarea class="dynamic-form-attribute__textarea" type="text" name="message" value=""></textarea>
            </div>
            <input style="display:none" type="text" name="date" value="">
            <input style="display:none" type="text" name="time" value="">
            <input style="display:none" type="text" name="service" value="">
            <input style="display:none" type="text" name="service_id" value="">
            <br/>
            <div class="label requiredFields">*Обязательные поля</div>
          </form>
          <div class="sidebar-container sticky-container">
            <div class="sidebar-section">
              <div class="sidebar-header"></div>
              <div class="sidebar-price">
                <div class="session-time"></div>
                <div class="session-price"></div>
              </div>
            </div>
            <div style="display:inline-block" class="sidebar-date"></div>
            <div style ="display:inline-block"class="sidebar-time-of-day"></div>
            <div class="sidebar-action">
              <input class="btn-primary" style="display:none" type="submit" value="Записаться" form="enroll"/>
              <button class="btn-primary disabled" type="button" name="continue" disabled>Продолжить</button>
            </div>
          </div>
        </div>
      </div>
      <?php $service_set = find_all_services();?>
      <div  id="content" >
        <div class="offering-content">
            <div class="myServices">
              <div class="login"><a href="login.php">Войти</a></div>
              <p>Мои услуги</p>
            </div>
            <?php
              while($service = mysqli_fetch_assoc($service_set)){
            ?>
            <div class="Service">

                <div class="service-items service_img twic" style="background-image: url('/<?php echo $service['image']; ?>')" ></div>

                <div class="service-items service_title">
                  <a href="service.php?service_id=<?php echo $service['id']?>"><p><?php echo $service['service']; ?></p></a>
                </div>
                <div class="service-items service_price">
                  <p><?php echo $service['duration'] ?> | <?php echo $service['price']; ?> </p>
                </div>
                <div class="service-items service_action">
                    <button class="btn-primary" type="button" data-serviceid="<?php echo $service['id'];?>" name="writefor" data-time="<?php echo $service['duration'] ?>" data-price="<?php echo $service['price']; ?>" data-service="<?php echo $service['service']; ?>">Записаться</button></a>
                </div>
            </div>
            <?php } ?>

      </div>
    </div>
    <div style="display:none" id="check-container">
      <div id="check-content">
        <div id="check-congratulations">
          <h4>Отлично, вы записаны!</h4>
        </div>
        <div  id="check-border">
          <div id="appoitment-box__timing">
            <div id="booked-time-info">
              <div id="booked-time-info_day-of-month"></div>
              <div id="booked-time-info__month"></div>
              <div id="booked-time-info__separator"></div>
              <div id="day-and-hour"></div>
            </div>
          </div
          ><div id="booked-details">
            <div id="booked-details__service-name"></div>
            <div id="booked-details__duration-price">
              <div id="schedule-summary-info-text"></div><div class="booked-details__price-delimiter"></div><div id="booked-details__price"></div>
            </div>
          </div>
        </div>
        <div id="check-look-another">
            Смотреть другие услуги
        </div>
      </div>
    </div>
    <footer>
      <div class="footerWrapper">
        <div class="phone">
          <p>0678300340</p>
        </div>
      </div>
      <div class="rights">
         <p>©<?php echo date("Y")?> by Юлия Рудоманенко.</p>
      </div>
    </footer>
    <script src="js/small-menu.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/form.js"></script>
    <script src="js/insertUserData.js"></script>
    <script src="js/book-another-button.js"></script>
  </body>
</html>
