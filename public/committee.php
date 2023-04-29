<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5">
                <?php
                if(isset($mysqli)) {
                    $id = null;
                    $sqlA = "SELECT id FROM cabmin WHERE finished_date IS NULL";
                    if ($result = $mysqli -> query($sqlA)) {

                        while ($row = $result->fetch_row()) {
                            $id = $row[0];
                        }
                        $result->free_result();

                        $sql = sprintf("SELECT * FROM committee WHERE cabmin_id = %d", $id);

                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            echo "<h2>Committees: </h2>";
                            echo '<table class="table table-bordered">';
                            echo "<tr><td>Title</td>
                                    <td>Description</td>
                                    <td>Created date</td>
                                    <td>Finished date</td>
                                    </tr>";

                            while($row = $result->fetch_assoc()) {
                                printf("<tr>
                                        <td>%s</td> 
                                        <td>%s</td> 
                                        <td>%s</td> 
                                        <td>%s</td>
                                        
                                        </tr>\n",
                                    $row["title"],
                                    $row["description"],
                                    $row["created_date"],
                                    $row["finished_date"]);
                            }
                            echo "</table>\n";
                        } else {
                            echo "0 results";
                        }
                    }
                    $mysqli -> close();
                }
                ?>
                <a type="button" href="add_committee.php" class="btn btn-primary">Add Committee</a>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
