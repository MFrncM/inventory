<?php
  class config {
    private $user = 'port7639_montecillomarco';
    private $password = 'marco123';
    private $pdo = null;

    public function con(){
      try {
        $this->pdo = new PDO('mysql:local=109.106.254.158:3306;dbname=port7639_inventorysystem_MMontecillo', $this->user, $this->password);
      } catch (PDOException $e){
        die($e->getMessage());
      }
      return $this->pdo;
    }
  }
 ?>
