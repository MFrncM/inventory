<?php
  require_once ('resource/php/init.php');
 ?>

 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="resource/css/style.css" />
    <script src="https://kit.fontawesome.com/a535aa2181.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" relstyle="css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" relstyle="css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Righteous&display=swap" rel="stylesheet">

    <title>Inventory System</title>
  </head>
  <body>
    <div class="container pt-5">
      <div class="row">

        <div class="col-md-10">
          <h1 class="invText">Inventory System</h1>
        </div>

        <div class="button_container col-md-2">

          <button type='button' name='age' id='age' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-success float-right col-md-12 mt-2' align='right'>Insert</button>

          <button type='button' name='quantity' data-toggle='modal' data-target='#edit_quantity_Modal' class='btn btn-warning float-right col-md-12 mt-2' align='right'>Quantity</button>

        </div>
      </div>
    </div>
    <div class="container table_container mb-5">
      <?php
      $view = new view();
      $view->viewData();
      ?>
    </div>

    <div id="add_data_Modal" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title"> Insert Item </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
        <form action="insertProcess.php" method="GET">
         <label>Item Name</label>
         <input type="text" name="itemName" id="name" class="form-control" placeholder="Name of the Item" required>
         <small class="form-text text-muted">Please input the name of the item</small>
         <br />
         <label>Item Image</label>
         <input type="file" class="form-control" name="itemImg"  accept="image/jpeg,image/png,image/gif" required>
         <small class="form-text text-muted">Please upload the image of the item</small>
         <br />
         <label>Item Description</label>
         <input type="text" class="form-control" placeholder="Description of the Item"  name="itemDescription" required>
         <small class="form-text text-muted">Please input the description of the item</small>
         <br />
         <label>Quantity</label>
         <input type="number" class="form-control" placeholder="Quantity of the Item" name="itemQuantity" required>
         <small class="form-text text-muted">Kindly set the quantity of the item</small>
         <br />
         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
         <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
        </form>
       </div>
      </div>
     </div>
    </div>

    <div id="edit_quantity_Modal" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title"> Edit Quantity </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
        <form action="add_subtract_quantity.php" method="GET">
         <label>ID</label>
         <input type="number" name="itemID" class="form-control" placeholder="ID of the Item" required>
         <small class="form-text text-muted">Please input the ID of the item</small>
         <br />
         <label>Quantity</label>
         <input type="number" class="form-control" placeholder="Quantity of the Item" name="itemQuantity" required>
         <small class="form-text text-muted">Kindly set the quantity of the item</small>
         <br />
         <input type="submit" name="increase" value="Increase" class="btn btn-success" />
         <input type="submit" name="reduce" value="Reduce" class="btn btn-info" />
        </form>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
     </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
    </script>
  </body>
</html>
