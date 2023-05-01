<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  class view extends config {

    public function viewData(){
      $con=$this->con();
      $sql = "SELECT * FROM tbl_inventory";
      $data = $con->prepare($sql);
      $data->execute();
      $results = $data->fetchAll(PDO::FETCH_ASSOC);

      echo "<table class='table table-bordered' id='myTable'>";
      echo "<thead class='thead-dark'>";
      echo "<th class='text-center'>Id</th>";
      echo "<th class='text-center'>Item Name</th>";
      echo "<th class='text-center'>Item Photo</th>";
      echo "<th class='text-center'>Item Description</th>";
      echo "<th class='text-center'>Quantity</th>";
      echo "<th class='text-center'>Status</th>";
      echo "<th class='text-center'>Action</th>";
      echo "</thead>";
      foreach ($results as $result) {
        echo "<tr>";
        echo "<td class='textID'>$result[id]</td>";
        echo "<td>$result[item]</td>";
        echo "<td>
              <img class='img-thumbnail' alt='100x100' src='data:".$result['type'].";base64,".base64_encode($result['img'])."'/>
              </td>";
        echo "<td>$result[description]</td>";
        echo "<td>$result[quantity]</td>";
        echo "<td>$result[status]</td>";
        echo "<td>
                <div class='container-fluid'>
                  <div class='row'>
                    <div class='col-md-9'>
                      <a class='btn btn-info col-md-12 mt-2' data-toggle='modal' data-target='#restockModal".$result['id']."'> Restock Item </a>
                      <a class='btn btn-primary col-md-12 mt-2' data-toggle='modal' data-target='#phaseOutModal".$result['id']."'> Phase Out Item </a>
                    </div>
                    <div class='col-md-3 align-self-center'>
                      <a class='btn btn-danger col-md-12 mt-2' data-toggle='modal' data-target='#deleteModal".$result['id']."'> <i class='fa-sharp fa-solid fa-trash'></i></a>
                    </div>
                  </div>
                </div>

              </td>";

              echo "<div class='modal fade' id='restockModal".$result['id']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title text-dark' id='exampleModalLongTitle'> Are you sure you want to restock this item? </h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                            <a href='restockProcess.php?id=".$result['id']."' class='btn btn-danger'>Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>";

              echo "<div class='modal fade' id='phaseOutModal".$result['id']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title text-dark' id='exampleModalLongTitle'> Are you sure you want to phase out this item? </h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                            <a href='phaseOutProcess.php?id=".$result['id']."' class='btn btn-danger'>Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>";

              echo "<div class='modal fade' id='deleteModal".$result['id']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title text-dark' id='exampleModalLongTitle'> Are you sure you want to dalete this item? </h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                            <a href='deleteProcess.php?id=".$result['id']."' class='btn btn-danger'>Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>";



        echo "</tr>";
      }
      echo "</table>";
    }
  }
 ?>
