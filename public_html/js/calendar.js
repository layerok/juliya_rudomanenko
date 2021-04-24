
(function(){
  var zero;
  var json;
  var spinner = document.querySelector(".spinner-cube");
  var timeOfDay = document.querySelector(".sidebar-time-of-day");
  var continueBtn = document.querySelector("button[name='continue']");
  var submitBtn = document.querySelector("input[form='enroll']");
  var stickyPanel = false;
  var shownMonth = true;
  var i,j;
  var visibleWeak;
  var myNode = document.querySelector("table")
  var previousTd;
  var previousSlot;
  var isSelected = false;
  var isSelectedSlot=false;
  var year1 = new Date().getFullYear();
  var month1 = new Date().getMonth();
  monthArr=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
  monthArrR=["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"];
  monthArrM=["01","02","03","04","05","06","07","08","09","10","11","12"];

  document.querySelector("#calendar-collapse-switch").addEventListener("click",function(){
    document.getElementById("calendar-collapse-switch").children[1].classList.toggle("fa-angle-up");
    document.getElementById("calendar-collapse-switch").children[1].classList.toggle("fa-angle-down");
    if(shownMonth ===true){
      document.querySelector(".sticky-container").style.top="0";
      document.getElementById("calendar-switch-label").innerHTML = "Показать месяц";
    if(document.querySelector(".selected")===null){
      for(i=2;i<7;i++){
      document.querySelectorAll("tr")[i].style.display ="none";
    }
    document.querySelectorAll("tr")[1].classList.add("visible-weak");
  }else{
      for(i=1;i<7;i++){
        if(document.querySelector(".selected").parentNode === document.getElementsByTagName("tr")[i]){

        }else{
          document.getElementsByTagName("tr")[i].style.display ="none";
        }
    }
    }
    shownMonth = false;
  }else{
    document.getElementById("calendar-switch-label").innerHTML = "Показать неделю";
     for(i=1;i<7;i++){
          document.querySelectorAll("tr")[i].style.display ="";
          document.querySelectorAll("tr")[i].classList.remove("visible-weak");
     }
     shownMonth = true;
  }

  },false);
  document.querySelector(".calendar-hours").addEventListener("click",function(e){
    if(e.target.classList.contains("time-slots-list__slot")){
      continueBtn.classList.remove("disabled");
      continueBtn.removeAttribute("disabled");
      document.querySelector("#day-and-hour").innerHTML = timeOfDay.innerHTML = e.target.innerHTML;
      e.target.classList.add("selected");
      if(isSelectedSlot===true && previousSlot!=e.target){
      previousSlot.classList.remove("selected");
    }
      previousSlot = e.target;
      isSelectedSlot=true;
    }
  },false);
  myNode.addEventListener("click",function(e){
    if(e.target.tagName ==="TD" && !e.target.classList.contains("past")){
      // Убирание выделение предидущего выбраного времени;
      if(isSelectedSlot===true){
        // Делаю кнопку продолжить неактивной
        continueBtn.classList.add("disabled");
        continueBtn.setAttribute("disabled","true");
        previousSlot.classList.remove("selected");
        isSelectedSlot=false;
        timeOfDay.innerHTML = "";
      }


      document.querySelector(".calendar-hours").style.display ="";
      document.getElementById("calendar-switch-label").innerHTML = "Показать месяц";
      document.querySelector("#booked-time-info_day-of-month").innerHTML = e.target.innerHTML;
      document.querySelector("#booked-time-info__month").innerHTML = monthArr[e.target.dataset.month];
      document.querySelector(".sidebar-date").innerHTML =e.target.innerHTML+" "+ monthArrR[e.target.dataset.month] + " "+e.target.dataset.year;
      if(e.target.innerHTML<10){
        document.querySelector("input[name='date']").value =""+e.target.dataset.year+"-"+ monthArrM[e.target.dataset.month] + "-0"+e.target.innerHTML;
      }else{
        document.querySelector("input[name='date']").value =""+e.target.dataset.year+"-"+ monthArrM[e.target.dataset.month] + "-"+e.target.innerHTML;
      }

      if(shownMonth===true){
        document.getElementById("calendar-collapse-switch").children[1].classList.add("fa-angle-down");
        document.getElementById("calendar-collapse-switch").children[1].classList.remove("fa-angle-up");
      }

      for(i=1;i<7;i++){
        if(e.target.parentNode === document.getElementsByTagName("tr")[i]){
          e.target.parentNode.classList.add("visible-weak");
        }else{
          document.getElementsByTagName("tr")[i].style.display ="none";
        }
      }
      shownMonth = false;
      if(isSelected===true){
      previousTd.classList.remove("selected");
      }
      e.target.classList.add("selected");
      previousTd = e.target;
      isSelected = true;
      //Снимаю скрытие занятых часов
      for(i=0;i<document.querySelectorAll(".time-slots-list__slot").length;i++){
        document.querySelectorAll(".time-slots-list__slot")[i].style.display ="";
      }
      //Скрываю занятые часы
      for(i = 0;i<json.length;i++){
        for(var j =0;j<document.querySelectorAll(".time-slots-list__slot").length;j++){
          //Формирую строку даты "ГГГГ-ММ-ДД"
          //Добавляю ноль перед числами которые идут до 10:
          if(e.target.dataset.day<10){
             zero ="0";
          }else{
             zero ="";
          }
          if(json[i].date === ""+e.target.dataset.year+"-"+monthArrM[e.target.dataset.month]+"-"+zero+""+e.target.dataset.day){
          if((document.querySelectorAll(".time-slots-list__slot")[j].dataset.timeslot)===json[i].time.slice(0,-3)){
            document.querySelectorAll(".time-slots-list__slot")[j].style.display ="none";
          }
         }
        }
      }
    }

  },false);

window.addEventListener("scroll",function(){
  if(stickyPanel){
    if(window.pageYOffset>200 && window.pageYOffset< document.querySelector("#choiceOfDate").clientHeight - document.querySelector(".sticky-container").clientHeight ){
      document.querySelector(".sticky-container").style.top = window.pageYOffset-200 +"px";
    }
  }
},false);
function calendar(year,month){
  var from,to;
  var dateNow = new Date(Date.now());
  var yearNow = dateNow.getFullYear();
  var monthNow = dateNow.getMonth();
  var dayNow = dateNow.getDate();
  var numberOfCellNextMonth =0;
  var numberOfCell = 0;
  var D = new Date(year,month);
  var DprevMonth = new Date(D.getFullYear(),D.getMonth()-1).getFullYear();
  var DnextMonth = new Date(D.getFullYear(),D.getMonth()+1).getFullYear();
  var tdNod = document.getElementsByTagName("td");
  var firstDayOfMonth = new Date(D.getFullYear(),D.getMonth(),1).getDay();
  var currentMonth = D.getMonth();
  var currentYear = D.getFullYear();
  var prevMonth = currentMonth - 1;
  if(currentMonth ==0){
    prevMonth =11;
  }
  var nextMonth = currentMonth + 1;
  if(currentMonth == 11){
    nextMonth =0;
  }

  lastDayOfWeak = new Date(D.getFullYear(),D.getMonth()+1,0).getDate();
  lastDayOfPrevMonth = new Date(D.getFullYear(),D.getMonth(),0).getDate();
  firstMondayOfCalendar = lastDayOfPrevMonth - (firstDayOfMonth -2);
  document.querySelector("#calendar-header__title").innerHTML = ""+monthArr[currentMonth]+" "+D.getFullYear();
  from = DprevMonth+"-"+("0"+(prevMonth+1)).slice(-2)+"-"+("0"+firstMondayOfCalendar).slice(-2);
  for(var i=0;i<firstDayOfMonth -1;i++){
    if((prevMonth<monthNow && DprevMonth==yearNow)||DprevMonth<yearNow||(prevMonth==monthNow && DprevMonth==yearNow && (firstMondayOfCalendar+i)<dayNow)){
      tdNod[i].classList.add("past");
    }else{
      tdNod[i].classList.remove("past");
    }
    tdNod[i].innerHTML=(firstMondayOfCalendar+i)+"";
    tdNod[i].dataset.day=firstMondayOfCalendar+i;
    tdNod[i].dataset.month = prevMonth;
    tdNod[i].dataset.year = DprevMonth;
    numberOfCell++;
  }
  for(var i=1;i<=lastDayOfWeak;i++){
    if((currentMonth==monthNow && currentYear==yearNow && i<dayNow)||currentYear<yearNow||(currentMonth<monthNow && currentYear==yearNow)){
      tdNod[numberOfCell].classList.add("past");
    }else{
      tdNod[numberOfCell].classList.remove("past");
    }
    tdNod[numberOfCell].innerHTML=i+"";
    tdNod[numberOfCell].dataset.day=i+"";
    tdNod[numberOfCell].dataset.month = currentMonth;
    tdNod[numberOfCell].dataset.year = currentYear;
    numberOfCell++;
  }
  numberOfCellNextMonth = 43 - numberOfCell;
  for(var i=1;i<numberOfCellNextMonth;i++){
    if((nextMonth<monthNow && DnextMonth<=yearNow)||DnextMonth<yearNow||(nextMonth==monthNow && DnextMonth == yearNow && i<dayNow)){
      tdNod[numberOfCell].classList.add("past");
    }else{
      tdNod[numberOfCell].classList.remove("past");
    }
    tdNod[numberOfCell].innerHTML=i+"";
    tdNod[numberOfCell].dataset.day=i+"";
    tdNod[numberOfCell].dataset.month = nextMonth;
    tdNod[numberOfCell].dataset.year = DnextMonth;
    numberOfCell++;
  }
  to = DnextMonth+"-"+("0"+(nextMonth+1)).slice(-2)+"-"+("0"+(numberOfCellNextMonth-1)).slice(-2);
  //Ajax запрос
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "freeHours.php?from="+from+"&to="+to,true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function (){
    if(xhr.readyState == 2){
      spinner.style.display = "";
    }
    if(xhr.readyState ==  4 && xhr.status == 200){
      json = JSON.parse(xhr.responseText);
      spinner.style.display = "none";
    }
  }
  xhr.send();
  for(i=1;i<7;i++){
    if(document.querySelectorAll("tr")[i].classList.contains("visible-weak")){
      document.querySelectorAll("tr")[i].classList.remove("visible-weak");
    }
    for(j=0;j<7;j++){
      if(document.querySelectorAll("tr")[i].children[j].classList.contains("selected")){
        document.querySelectorAll("tr")[i].children[j].classList.remove("selected");
      }
    }
  }


}
  document.querySelector("button[name='prev']").addEventListener("click",function(e){
    if(shownMonth===false){
       for(i=1;i<7;i++){
         if(document.querySelectorAll("tr")[i].classList.contains("visible-weak")){
           if(i===1){
             document.querySelectorAll("tr")[1].style.display = "none";
             document.querySelectorAll("tr")[1].classList.remove("visible-weak");
             calendar(year1,month1-1);
             month1--;
             document.querySelectorAll("tr")[5].style.display = "";
             document.querySelectorAll("tr")[5].classList.add("visible-weak");

           }else{
             document.querySelectorAll("tr")[i].style.display = "none";
              document.querySelectorAll("tr")[i].classList.remove("visible-weak");
             document.querySelectorAll("tr")[i-1].style.display = "";
             document.querySelectorAll("tr")[i-1].classList.add("visible-weak")
           }
           break;
         }
       }
    }else{
    calendar(year1,month1-1);
    month1--;
    }
  },false)
  document.querySelector("button[name='next']").addEventListener("click",function(e){
    if(shownMonth===false){
       for(i=1;i<7;i++){
         if(document.querySelectorAll("tr")[i].classList.contains("visible-weak")){
           if(i===6){
             document.querySelectorAll("tr")[6].style.display = "none";
             document.querySelectorAll("tr")[6].classList.remove("visible-weak");
             calendar(year1,month1+1);
             month1++;
             document.querySelectorAll("tr")[2].style.display = "";
             document.querySelectorAll("tr")[2].classList.add("visible-weak");

           }else{
             document.querySelectorAll("tr")[i].style.display = "none";
              document.querySelectorAll("tr")[i].classList.remove("visible-weak");
             document.querySelectorAll("tr")[i+1].style.display = "";
             document.querySelectorAll("tr")[i+1].classList.add("visible-weak");
           }
           break;

         }
       }
    }else{
    calendar(year1,month1+1);
    month1++;
  }
},false);
function writefor(target){
  document.getElementById("calendar-switch-label").innerHTML = "Показать неделю";
  for(i=1;i<7;i++){
    document.querySelectorAll("tr")[i].style.display ="";
    document.querySelectorAll("tr")[i].classList.remove("visible-weak");
  }
  shownMonth = true;
  document.querySelector("input[form='enroll']").style.display = "none";
  document.querySelector("button[name='continue']").style.display = "";
  document.querySelector(".sidebar-date").innerHTML = "";
  document.querySelector(".sidebar-time-of-day").innerHTML = "";
  calendar(new Date().getFullYear(),new Date().getMonth());
  document.querySelector(".temp-header-title").innerHTML="Расписание";
  document.querySelector(".sub-temp-header-title").innerHTML="";
  stickyPanel = true;
  window.scrollTo(0,100);
  continueBtn.innerHTML="Продолжить";
  document.getElementById("content").style.display="none";
  document.querySelector(".form").style.display="none";
  document.querySelector(".sidebar-container").style.display = "";
  document.querySelector(".calendar-controls__content").style.display = "";
  document.querySelector("#choiceOfDate").style.display = "";
  document.querySelector("input[name='service']").value = target.dataset.service;
  document.querySelector("#booked-details__service-name").innerHTML = document.querySelector(".sidebar-header").innerHTML = target.dataset.service;
  document.querySelector("#booked-details__price").innerHTML = document.querySelector(".session-price").innerHTML = target.dataset.price;
  document.querySelector("#schedule-summary-info-text").innerHTML = document.querySelector(".session-time").innerHTML = target.dataset.time;
  document.querySelector(".session-price").innerHTML = target.dataset.price;
  document.querySelector(".session-time").innerHTML = target.dataset.time;
  document.querySelector("input[name='service_id']").value = target.dataset.serviceid;
  document.querySelector(".calendar-hours").style.display ="none";
}
  var writeForArr = document.querySelectorAll("button[name='writefor']");
  for(i=0;i<writeForArr.length;i++){
    document.querySelectorAll("button[name='writefor']")[i].addEventListener("click",function(e){
      writefor(e.target);
    },false);
  }

document.querySelector("button[name='back']").addEventListener("click",function(){
  stickyPanel = false;
  continueBtn.classList.remove("disabled");
  continueBtn.removeAttribute("disabled");
  continueBtn.innerHTML="Продолжить";
  document.querySelector(".form").style.display="none";
  document.querySelector(".calendar-controls__content").style.display = "";
  document.getElementById("content").style.display="";
  document.getElementById("choiceOfDate").style.display = "none";
})
document.getElementById("back").addEventListener("click",function(){
  stickyPanel = false;
  continueBtn.classList.remove("disabled");
  continueBtn.removeAttribute("disabled");
  document.getElementById("content").style.display="";
  document.getElementById("choiceOfDate").style.display = "none";
  document.querySelector(".sticky-container").style.display ="none";
  document.querySelector(".form").style.display ="none";

})
  calendar(new Date().getFullYear(),new Date().getMonth());
  continueBtn.addEventListener("click",function(e){
    document.querySelector("input[name='name']").value="";
    document.querySelector("input[name='email']").value="";
    document.querySelector("input[name='phone']").value="";
    document.querySelector("textarea[name='message']").value="";
    window.scrollTo(0,100);
    document.querySelector("input[name='time']").value =""+timeOfDay.innerHTML;
    document.querySelector(".temp-header-title").innerHTML="Укажите ваши данные";
    document.querySelector(".sub-temp-header-title").innerHTML="Пожалуйста, расскажите о себе";
    continueBtn.classList.add("disabled");
    continueBtn.setAttribute("disabled","true");
    continueBtn.style.display = "none";
    submitBtn.classList.add("disabled");
    submitBtn.setAttribute("disabled","true");
    submitBtn.style.display ="";
    document.querySelector(".calendar-controls__content").style.display="none";
    document.querySelector(".form").style.display="inline-block";
  },false);
})();
