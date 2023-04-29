<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $submit = null;
                if ($_POST) {
                  $submit = $_POST['submit'];
                }
                if ($submit) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    if(isset($mysqli)) {
                        $id = null;
                        $sqlA = "SELECT id FROM cabmin WHERE finished_date IS NULL";
                        if ($result = $mysqli -> query($sqlA)) {

                            while ($row = $result->fetch_row()) {
                                $id = $row[0];
                            }
                            $result->free_result();
                            $date = date('Y-m-d');
                            $stmt = $mysqli->prepare("INSERT INTO committee (cabmin_id, title, description, created_date) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param('dsss', $id, $title, $description, $date);
                            if ($stmt->execute()) {
                                print_r ('<h4>Done!</h4><p><a href="committee.php" type="button" class="btn btn-link">Committee list</a>');
                            }
                        }
                        $mysqli -> close();
                    }
                } else {
                    ?>
                    <p> <h3> Add committee: </h3>
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title"  id="exampleFormControlInput1" placeholder="title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                            <input type=submit name="submit" class="btn btn-success" value="Add committee">
                        <input TYPE=reset value="Clear" class="btn btn-warning">
                    </form>
                    <?php
                }    // end if    ?>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
