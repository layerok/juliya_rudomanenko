(function(){
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  var form = document.querySelector("form[id='enroll']");
  var submitBtn =document.querySelector("input[form='enroll']");
  var continueBtn = document.querySelector("button[name='continue']");
  var validEmail = false;
  var validName = false;
  var emailField = document.forms.enroll.email;
  var nameField = document.forms.enroll.name;
  function error(target){
    target.nextElementSibling.innerHTML = "Это обязательное поле";
    target.style.borderColor ="red";
  }
  function success(target){
    target.nextElementSibling.innerHTML = "";
    target.style.borderColor ="";
  }
form.addEventListener("keyup", function (e) {
  if(e.target ==emailField){
     var address = emailField.value.trim();
     if(reg.test(address) == false ) {
        validEmail = false;

     }else{
       success(e.target);
       validEmail = true;
     }
   }
   if(e.target == nameField){
     if(e.target.value == ""){
       validName =false;
     }else{
       success(e.target);
       validName = true;
     }
   }
   if(validName&&validEmail){
     submitBtn.removeAttribute("disabled");
     submitBtn.classList.remove("disabled");
     submitBtn.style.display = "";
   }else{
     submitBtn.setAttribute("disabled","false");
     submitBtn.classList.add("disabled");
   }
  },false);
  form.addEventListener("focusout",function(e){
    if(e.target == nameField){
    if(validName == false){
      error(e.target);
    }
  }
  if(e.target == emailField){
    if(validEmail == false){
      error(e.target);
    }
  }
  })
})();
