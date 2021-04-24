function submitData(fdata){
  var xhttp = new XMLHttpRequest();
  var choiceOfDate = document.getElementById("choiceOfDate");
  var check = document.getElementById("check-container");
  var submit_btn = document.querySelector("input[form='enroll']");
  var continue_btn = document.querySelector("button[name='continue']");

  xhttp.open(fdata.method, fdata.action,true);
  xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState ==2){
    }
    if(xhttp.readyState == 4){
      continue_btn.style.display = "";
      submit_btn.style.display = "none";
      choiceOfDate.style.display = "none";
      check.style.display ="";
    }
  }
  xhttp.send(new FormData(fdata));
  return false;
}
