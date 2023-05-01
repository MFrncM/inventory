<?php
  require_once ('resource/php/init.php');

  $delete = new delete($_GET['id']);
  $delete->deleteItem();
  header('Location:viewTable.php?status=deleted');
 ?>
