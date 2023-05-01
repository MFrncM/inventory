<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  class subQuantity extends config{
    public $itemID;
    public $itemQuantity;

    public function __construct($itemID, $itemQuantity){
      $this->itemID=$itemID;
      $this->itemQuantity=$itemQuantity;
    }

    public function subQuantity(){
      $con = $this->con();

      $sql = "SELECT quantity FROM tbl_inventory WHERE id = $this->itemID";
      $result = $con->query($sql);

      if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $currentQuantity = (int) $row['quantity'];

        $newQuantity = $currentQuantity - $this->itemQuantity;

        if($newQuantity >= 0){
          if ($newQuantity == 0) {
            $sql = "UPDATE tbl_inventory SET `quantity` = $newQuantity, `status` = 'Zero Stocks' WHERE `id` = $this->itemID";
            $result = $con->query($sql);

            if ($result) {
              return true;
            } else {
              return false;
            }
          } else if ($newQuantity >= 100) {
            $sql = "UPDATE tbl_inventory SET `quantity` = $newQuantity, `status` = 'Full Stock' WHERE `id` = $this->itemID";
            $result = $con->query($sql);

            if ($result) {
              return true;
            } else {
              return false;
            }
          } else if ($newQuantity <= 20) {
            $sql = "UPDATE tbl_inventory SET `quantity` = $newQuantity, `status` = 'Low Stock' WHERE `id` = $this->itemID";
            $result = $con->query($sql);

            if ($result) {
              return true;
            } else {
              return false;
            }
          } else {
            $sql = "UPDATE tbl_inventory SET `quantity` = $newQuantity, `status` = 'In Stock' WHERE `id` = $this->itemID";
            $result = $con->query($sql);

            if ($result) {
              return true;
            } else {
              return false;
            }
          }
        } else {
          header('Location:viewTable.php?status=adding');
        }

      } else {
        return false;
      }
    }
  }
 ?>
