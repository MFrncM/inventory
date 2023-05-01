<?php
  require_once ('resource/php/init.php');

  $insert = new insert($_GET['itemName'], $_GET['itemImg'], $_GET['itemDescription'], $_GET['itemQuantity']);
  $insert->insertTask();

  header('Location:viewTable.php?status=Y');
 ?>
