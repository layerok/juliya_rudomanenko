(function(){
  var bookAnother = document.getElementById("check-look-another");
  var checkContainer = document.getElementById("check-container");
  var content = document.getElementById("content");
  bookAnother.addEventListener("click", function(){
    content.style.display = "";
    checkContainer.style.display = "none";
  },false);
})();
