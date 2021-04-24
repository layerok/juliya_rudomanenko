<?php
  $errors = array();

  $ru_fields = array(
  'headline'=>'"Заголовок"',
  'topic'=>'"Тема"',
  'content'=>'"Текст поста"',
  'username' =>'"Имя пользователя"',
  'password' =>'"Пароль"',
  'message' => '"Сообщение"',
  'email' => '"Эл. почта"',
  'name' => '"Имя"',
  'service_name' => '"Название услуги"' ,
  'service_content' => '"Описание услуги"',
  'service_price' => '"Цена услуги"',
  'service_sub_headline' => '"Подзагаловок"',
  'service_duration' => '"Продолжительность сеанса"'
  );

  function fieldname_as_text($fieldname){
    $fieldname = str_replace("_"," ", $fieldname);
    $fieldname = ucfirst($fieldname);
    return $fieldname;
  }
  function has_presence($value){
    return isset($value) && $value !== "";
  }
  function validate_presence($required_fields){
    global $ru_fields;
    global $errors;
    foreach($required_fields as $field){
      $value = trim($_POST[$field]);
      if(!has_presence($value)){
        $errors[$field] ="Поле ". fieldname_as_text($ru_fields[$field]) ." не может быть пустым";
      }
    }
  }
  function has_max_length($value, $max){
    return strlen($value) <= $max;
  }
  function validate_max_length($fields_with_max_length){
    global $ru_fields;
    global $errors;
    foreach($fields_with_max_length as $field =>$max){
      $value = trim($_POST[$field]);
      if(!has_max_length($value, $max)){
        $errors[$field] ="Поле ". fieldname_as_text($ru_fields[$field]). " очень длинное";
      }
    }
  }
  function has_inclusion_in($value, $set){
    return in_array($value, $set);
  }
  function can_upload($file){
    global $errors;
    if($file['name'] == ''){
      $errors['image'] = 'Вы не выбрали изображение';
      return;
    }
    if($file['size'] == ''){
      $errors['image'] =  'Размер файла превышает 5МБ';
      return;
    }
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if(!in_array($mime, $types)){
      $errors['image'] =  'Недопустимый тип файла';
      return;
    }
    return true;
  }
  function make_upload($file,$path){
    $name = mt_rand(0, 100000) . $file['name'];
    $name = str_replace(" ","",$name);
    copy($file['tmp_name'], $path . $name);
    return $name;
  }

?>
