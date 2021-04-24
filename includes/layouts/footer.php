<footer>
  <div class='footerWrapper footer-items'><div class='phone'><p>0678300340</p></div></div>
  <div class="rights footer-items">
     <div class="rights-items"><p> ©<?php echo date("Y");?> by Юлия Рудоманенко.</p></div>
     <div class="rights-items">
       <div class="social-links">
         <div class="social-facebook"><a href="https://www.facebook.com/profile.php?id=100014064605939" target="_blank"><i class="fab fa-facebook-f"></i></a></div>
         <div class="social-b17"><a href="https://www.b17.ru/rudomanenko/" target="_blank"><p>B17</p></a></div>
       </div>
     </div>
  </div>
  <script src="js/small-menu.js"></script>
</footer>
</body>
</html>
<?php
// 5. Закрываю соединение с базой данных
if(isset($connection)){
  mysqli_close($connection);
}
?>
