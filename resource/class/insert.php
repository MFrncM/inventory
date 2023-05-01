<?php
  class insert extends config {
    public $itemName, $itemImg, $itemDescription, $itemQuantity;

    public function __construct($itemName, $itemImg, $itemDescription, $itemQuantity){
      $this->itemName=$itemName;
      $this->itemImg=$itemImg;
      $this->itemDescription=$itemDescription;
      $this->itemQuantity=$itemQuantity;
    }

    public function insertTask(){
      $con=$this->con();

      $sql = "INSERT INTO `tbl_inventory` (`item`, `img`, `description`,`quantity`) VALUES ('$this->itemName', '$this->itemImg', '$this->itemDescription','$this->itemQuantity')";
      $data = $con->prepare($sql);

      // var_dump($data);
      // die();

      if ($data->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }
 ?>
