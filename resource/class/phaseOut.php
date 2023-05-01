<?php
  class phaseOut extends config {
    public $id;

    public function __construct($id){
      $this->id=$id;
    }

    public function phaseOutItem(){
      $con = $this->con();
      $sql = "UPDATE `tbl_inventory` SET `quantity`=0, `status`='Phase Out' WHERE `id` = $this->id";
      $data = $con->prepare($sql);
      if ($data->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
 ?>
