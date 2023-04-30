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
                if ($submit && isset($mysqli)) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $appointed_date = $_POST['appointed_date'] ?? date('Y-m-d');
                    $finished_date = !empty($_POST['finished_date']) ? $_POST['finished_date'] : null;
                    $email = $_POST['email'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $address1 = $_POST['address1'];
                    $address2 = $_POST['address2'];
                    $phone = $_POST['phone'];
                    $political_affiliation = $_POST['political_affiliation'];
                    $birth_date = $_POST['birth_date'];

                        $id = null;
                        $sqlA = "SELECT id FROM cabmin WHERE finished_date IS NULL";
                        if ($result = $mysqli -> query($sqlA)) {

                            while ($row = $result->fetch_row()) {
                                $id = $row[0];
                            }

                            $result->free_result();

                            $stmtUser = $mysqli->prepare("INSERT INTO user (email, first_name, last_name, address1, address2, phone, political_affiliation, birth_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmtUser->bind_param('ssssssss', $email, $first_name, $last_name, $address1, $address2, $phone, $political_affiliation, $birth_date);

                           if($stmtUser->execute()) {

                               $userId = null;

                               $sqlU = "SELECT id FROM user WHERE email = '$email'";

                               $result = $mysqli->query($sqlU);

                               while ($row = $result->fetch_row()) {
                                   $userId = $row[0];
                               }

                               $result->free_result();

                               $stmt = $mysqli->prepare("INSERT INTO minister (title, description, appointed_date, finished_date, user_id, cabmin_id) VALUES (?, ?, ?, ?, ?, ?)");
                               $stmt->bind_param('ssssdd', $title, $description, $appointed_date, $finished_date, $userId, $id );

                               if ($stmt->execute()) {
                                   print_r('<h4>Done!</h4><p><a href="ministers.php" type="button" class="btn btn-link">Ministers list</a>');
                               }
                           }

                            $mysqli -> close();
                        }
                } else {
                    ?>
                    <p> <h3> Add minister: </h3>
                    <form method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputName1" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="inputName1">
                        </div>
                        <div class="col-md-6">
                            <label for="inputName2" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="inputName2">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address1" id="inputAddress" placeholder="City">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Stree, Apartment, studio, or floor">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail4" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputPassword4" name="phone" >
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="title">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="inputPol" class="form-label">Political Affiliation</label>
                            <input type="text" class="form-control" id="inputPol" name="political_affiliation" >
                        </div>

                        <div class="col-md-4">
                            <label for="Birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="Birthday" name="birth_date" >
                        </div>
                        <div class="col-md-4">
                            <label for="appointed_date" class="form-label">Appointed date</label>
                            <input type="date" class="form-control" name="appointed_date" id="appointed_date" >
                        </div>
                        <div class="col-md-4">
                            <label for="finished_date" class="form-label">Finished date</label>
                            <input type="date" name="finished_date" class="form-control" id="finished_date">
                        </div>
                        <div class="col-12 mb-5">
                            <input type=submit name="submit" class="btn btn-success" value="Add new">
                            <input type=reset value="Clear" class="btn btn-warning">
                        </div>
                    </form>
                    <?php
                }    // end if    ?>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
