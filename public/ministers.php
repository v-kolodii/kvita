<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php
                if(isset($mysqli)) {
                    $id = null;
                    $sqlA = "SELECT id FROM cabmin WHERE finished_date IS NULL";
                    if ($result = $mysqli -> query($sqlA)) {

                        while ($row = $result->fetch_row()) {
                            $id = $row[0];
                        }
                        $result->free_result();

                        $sql = sprintf("SELECT minister.id, minister.description, 
                                                    minister.appointed_date, 
                                                    user.first_name, user.last_name, 
                                                    user.phone 
                                                FROM minister 
                                                INNER JOIN user ON minister.user_id = user.id
                                                WHERE cabmin_id = %d", $id);

                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            echo "<h2>Ministers: </h2>";
                            echo '<table class="table table-bordered">';
                            echo "<tr>	<td>Name</td>
                                    <td>Description</td>
                                    <td>Appointed Date</td>
                                    <td>Phone</td>
                                    <td>Action</td>
                                    </tr>";

                            while($row = $result->fetch_assoc()) {
                            $edit = sprintf('<a href="edit_minister.php?id=%s">Edit</a>', $row["id"]);
                                printf("<tr>
                                        <td>%s</td> 
                                        <td>%s</td> 
                                        <td>%s</td> 
                                        <td>%s</td>
                                        <td>%s</td>
                                        </tr>\n",
                                    $row["first_name"] .' '. $row["last_name"],
                                    $row["description"],
                                    $row["appointed_date"],
                                    $row["phone"],
                                $edit);
                            }
                            echo "</table>\n";
                        } else {
                            echo "0 results";
                        }
                    }
                    $mysqli -> close();
                }
                ?>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
