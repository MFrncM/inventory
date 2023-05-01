<?php
  class delete extends config {
    public $id;

    public function __construct($id){
      $this->id=$id;
    }

    public function deleteItem(){
      $con = $this->con();
      $sql = "DELETE FROM `tbl_inventory` WHERE `id` = $this->id";
      $data = $con->prepare($sql);
      if ($data->execute()){
        return true;
      } else {
        return false;
      }
    }

  }
 ?>
