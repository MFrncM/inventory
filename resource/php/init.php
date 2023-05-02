<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/mmontecillo/resource/projects/inventory/resource/php/function.php';

  spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/mmontecillo/resource/projects/inventory/resource/class/'.$class.'.php';
  })

 ?>
