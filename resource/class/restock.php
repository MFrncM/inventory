<?php
  class restock extends config {
    public $id;

    public function __construct($id){
      $this->id=$id;
    }

    public function restockItem(){
      $con = $this->con();
      $sql = "UPDATE `tbl_inventory` SET `quantity`= 100,`status`='Full Stock' WHERE `id` = $this->id";
      $data = $con->prepare($sql);
      if ($data->execute()){
        return true;
      } else {
        return false;
      }
    }

  }
 ?>
