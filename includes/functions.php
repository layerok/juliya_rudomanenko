<?php
function confirm_query($result_set){
  if(!$result_set){
    return false;
    die("Database query failed.");
  }
}
function find_all_columns_from($table){
  global $connection;
  $table = mysql_prep($table);
  $query = "SHOW COLUMNS FROM ".$table;
  $columns_set = mysqli_query($connection, $query);
  confirm_query($columns_set);
  return $columns_set;
}

function find_all($table) {
  global $connection;

  $table = mysql_prep($table);
  $query = "SELECT * ";
  $query .= "FROM ". $table ;
  $query .= " ORDER BY id ASC";
  $table_set = mysqli_query($connection, $query);
  confirm_query($table_set);
  return $table_set;
}

function find_admin_by_id($admin_id){
  global $connection;

  $safe_admin_id = mysqli_real_escape_string($connection,$admin_id);
  $query = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "WHERE id = {$safe_admin_id} ";
  $query .= "LIMIT 1";
  $admin_set = mysqli_query($connection, $query);
  confirm_query($admin_set);
  if($admin = mysqli_fetch_assoc($admin_set)){
    return $admin;
  }else{
    return null;
  }
}
function find_admin_by_username($username){
  global $connection;

  $safe_username = mysqli_real_escape_string($connection,$username);
  $query = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "WHERE username = '{$safe_username}' ";
  $query .= "LIMIT 1";
  $admin_set = mysqli_query($connection, $query);
  confirm_query($admin_set);
  if($admin = mysqli_fetch_assoc($admin_set)){
    return $admin;
  }else{
    return null;
  }
}
function find_post_by_id($id){
  global $connection;
  $query  = "SELECT * ";
  $query .= "FROM posts ";
  $query .= "WHERE id={$id}";
  $result = mysqli_query($connection,$query);
  //Тестирует если есть ошибка запроса
  confirm_query($result);
  $result = mysqli_fetch_assoc($result);
  return $result;
}
function find_service_by_id($id){
  global $connection;
  $query  = "SELECT * ";
  $query .= "FROM services ";
  $query .= "WHERE id={$id}";
  $result = mysqli_query($connection,$query);
  //Тестирует если есть ошибка запроса
  confirm_query($result);
  $result = mysqli_fetch_assoc($result);
  return $result;
}
function find_all_admins() {
  global $connection;

  $query = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "ORDER BY username ASC";
  $admin_set = mysqli_query($connection, $query);
  confirm_query($admin_set);
  return $admin_set;
}
function find_all_services() {
  global $connection;

  $query = "SELECT * ";
  $query .= "FROM services ";
  $query .= "ORDER BY id ASC";
  $service_set = mysqli_query($connection, $query);
  confirm_query($service_set);
  return $service_set;
}
function find_all_posts(){
  global $connection;

  $query  = "SELECT * ";
  $query .= "FROM posts ";
  $query .= "ORDER BY id DESC";
  $result = mysqli_query($connection,$query);
  //Тестирует если есть ошибка запроса
  confirm_query($result);
  return $result;
}

function redirect_to($location){
  header('Location:'.$location);
}
function mysql_prep($string){
  global $connection;
  $escaped_string = mysqli_real_escape_string($connection, $string);
  return $escaped_string;
}
function form_errors($errors=array()){
  $output = "";
  if(!empty($errors)){
    $output .= "<div class=\"error\">";
    $output .= "Пожалуйста исправьте следущие ошибки:";
    $output .= "<ul>";
    foreach($errors as $key => $error){
      $output .= "<li>";
      $output .= htmlentities($error);
      $output .= "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}
function password_encrypt($password){
  $hash_format = "$2y$10$";
  $salt_length = 22;
  $salt = generate_salt($salt_length);
  $format_and_salt = $hash_format . $salt;
  $hash = crypt($password, $format_and_salt);
  return $hash;
}
function generate_salt($length){
  $unique_random_string = md5(uniqid(mt_rand(), true));
  $base64_string = base64_encode($unique_random_string);

  $modified_base64_string = str_replace('+', '.', $base64_string);

  $salt = substr($modified_base64_string, 0, $length);

  return $salt;
}
function password_check($password, $existing_hash){
  $hash = crypt($password, $existing_hash);
  if($hash === $existing_hash){
    return true;
  }else{
    return false;
  }
}
function attempt_login($username, $password){
  $admin = find_admin_by_username($username);
  if($admin){
    // Администратор найден, сейчас проверка пароля
    if(password_check($password, $admin["hashed_password"])){
      return $admin;
    } else{
      // пароль не подходит
      return false;
    }
  }else{
    // Администратор не найден
    return false;
  }
}
function logged_in(){
  return isset($_SESSION['admin_id']);
}
function confirm_logged_in(){
  if(!logged_in()){
    redirect_to("login.php");
  }
}
function getExtension($filename) {
  return end(explode(".", $filename));
}

?>
