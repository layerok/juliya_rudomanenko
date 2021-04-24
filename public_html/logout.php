<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
  //session_start();
  $_SESSION["admin_id"] = null;
  $_SESSION["username"] = null;
  redirect_to("login.php");
 ?>
