<?php
  require_once ('resource/php/init.php');

  $phaseout = new phaseout($_GET['id']);
  $phaseout->phaseOutItem();
  header('Location:viewTable.php?status=phasedout')
 ?>
