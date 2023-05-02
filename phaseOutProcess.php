<?php
  require_once ('resource/php/init.php');

  $phaseout = new phaseOut($_GET['id']);
  $phaseout->phaseOutItem();
  header('Location:viewTable.php?status=phaseout');
 ?>
