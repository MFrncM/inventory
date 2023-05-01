<?php
  class pagination extends config {

    public function paginationView(){

        // define the number of results per page
        $results_per_page = 10;

        // get the current page number
        if (isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }

        // calculate the starting limit for the results on this page
        $starting_limit = ($page_number - 1) * $results_per_page;

        // perform the search query
        $search_query = "";
        if (isset($_GET['search'])) {
            $search_query = $_GET['search'];
        }
        $sql = "SELECT * FROM tbl_inventory WHERE id LIKE '%$search_query%' ORDER BY id DESC LIMIT $starting_limit, $results_per_page";
        $data = $con->prepare($sql);

        // output the results
        echo "<table>";
        while ($row = $data->fetchAll(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['item'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // create pagination links
        $sql = "SELECT COUNT(*) AS total FROM tbl_inventory WHERE id LIKE '%$search_query%'";
        $data = $con->prepare($sql);
        $row = $data->fetchAll(PDO::FETCH_ASSOC);
        $total_results = $row['total'];
        $total_pages = ceil($total_results / $results_per_page);
        echo "<div>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i&search=$search_query'>$i</a> ";
        }
        echo "</div>";

        // close the database connection
        mysqli_close($conn);


    }
  }

 ?>
