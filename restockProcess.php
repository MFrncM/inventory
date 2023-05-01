<?php
  require_once ('resource/php/init.php');

  $restock = new restock($_GET['id']);
  $restock->restockItem();
  
  header('Location:viewTable.php?status=restock');
 ?>
