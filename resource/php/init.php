<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/inventory/resource/php/function.php';

  spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inventory/resource/class/'.$class.'.php';
  })

 ?>
