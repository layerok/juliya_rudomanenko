function submitData(fdata){
  var xhttp = new XMLHttpRequest();
  var notification = document.querySelector(".notification");

  xhttp.open(fdata.method, fdata.action,true);
  xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState ==2){
    }
    if(xhttp.readyState == 4){
      json = JSON.parse(xhttp.responseText);
      if(Object.entries(json).length === 0 && json.constructor === Object){
        notification.style.color = "";
        notification.innerHTML = "Ваше сообщение отправлено, спасибо!";
      }else{
        notification.style.color = "red";
        for (var x in json) {
          notification.innerHTML += json[x]+"<br><br>";
        }
      }
    }
  }
  xhttp.send(new FormData(fdata));
  return false;
}
