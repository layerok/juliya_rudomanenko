
  var layer = document.querySelectorAll('.layer');
  var burger = document.querySelector('.burger');
  var container = document.querySelector('.header_container');
  var nav = document.querySelector('#mainNav');
  var logo = document.querySelector('.Logo_text');
 burger.addEventListener("click",function(){
    layer[0].classList.toggle("layer1");
    layer[1].classList.toggle("layer2");
    layer[2].classList.toggle("layer3");
    container.classList.toggle("accordion");
    nav.classList.toggle("opacity100");
    logo.classList.toggle("hide");
  },false);
