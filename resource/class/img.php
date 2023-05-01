<?php
  class img extends config {
    public $id;

    public function __construct($id){
      $this->id=$id;
    }

    public function imgItem(){
      $con = $this->con();
      $sql = "SELECT `img` FROM `tbl_inventory` WHERE `id` = $this->id";
      $result = $con->prepare($sql);
      $row = $result->fetch(PDO::FETCH_ASSOC);

      if ($row) {
      		$image_data = $row['img'];
      		// Display the image
      		echo '<img src="data:image/png;base64,' . base64_encode($image_data) . '" />';
      	} else if ($row){
          $image_data = $row['img'];
      		echo '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" />';
      	} else if ($row){
          $image_data = $row['img'];
      		echo '<img src="data:image/gif;base64,' . base64_encode($image_data) . '" />';
      	} else {
      		echo 'No image found.';
      	}
      }
    }

 ?>
