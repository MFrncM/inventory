<?php
  require_once ('resource/php/init.php');

  $img = new img($_GET['id']);
  $img->imgItem();
  header('Location:viewTable.php?status=img');
 ?>
