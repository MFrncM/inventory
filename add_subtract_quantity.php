<?php
  require_once ('resource/php/init.php');

  if(isset($_GET['increase'])){
    $addQuantity = new addQuantity($_GET['itemID'], $_GET['itemQuantity']);
    $addQuantity->addQuantity();
  } else if(isset($_GET['reduce'])){
    $subQuantity = new subQuantity($_GET['itemID'], $_GET['itemQuantity']);
    $subQuantity->subQuantity();
  }

  header('Location:viewTable.php?status=adding');
 ?>
