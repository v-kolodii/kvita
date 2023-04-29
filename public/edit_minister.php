<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php

                $id = null;
                $submit = null;

                if(!empty($_GET)) {
                    $id = (int) $_GET['id'];
                }

                if($_POST) {
                  $submit = $_POST['submit'];
                }
                if ($submit && isset($mysqli)) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $appointed_date = $_POST['appointed_date'];
                    $finished_date = $_POST['finished_date'];
                    $userId = (int) $_POST['user_id'];
                    $ministerId = (int) $_POST['minister_id'];
                    $email = $_POST['email'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $address1 = $_POST['address1'];
                    $address2 = $_POST['address2'];
                    $phone = $_POST['phone'];
                    $political_affiliation = $_POST['political_affiliation'];
                    $birth_date = $_POST['birth_date'];

                    $stmt = $mysqli->prepare("UPDATE minister SET title=?, description=?, appointed_date=?, finished_date=? WHERE id=?");
                    $stmt->bind_param('ssssd', $title, $description, $appointed_date, $finished_date, $ministerId);

                    $stmtUser = $mysqli->prepare("UPDATE user SET email=?, first_name=?, last_name=?, address1=?, address2=?, phone=?, 
                political_affiliation=?, birth_date=? WHERE id=?");
                    $stmtUser->bind_param('ssssssssd', $email, $first_name, $last_name, $address1, $address2, $phone, $political_affiliation, $birth_date, $userId);

                    if ($stmt->execute() && $stmtUser->execute()) {
                        print_r('<h4>Done!</h4><p><a href="ministers.php" type="button" class="btn btn-link">Ministers list</a>');
                    }

                    $mysqli -> close();
                } else {
                    if ($id && isset($mysqli)) {
                            $sql = sprintf("SELECT
                                                minister.title, 
                                                minister.description, 
                                                minister.appointed_date,
                                                minister.finished_date,
                                                minister.user_id,
                                                user.email,
                                                user.first_name, 
                                                user.last_name,
                                                user.address1,
                                                user.address2,
                                                user.phone,
                                                user.political_affiliation,
                                                user.birth_date
                                                FROM minister 
                                                INNER JOIN user ON minister.user_id = user.id
                                                WHERE minister.id = %d", $id);

                            $result = $mysqli->query($sql);
                            $minister = $result->fetch_assoc();
                    ?>
                    <p> <h3> Edit minister: </h3>
                    <form method="POST" class="row g-3">
                        <input type='hidden' name='minister_id' value='<?php echo $id;?>'>
                        <input type='hidden' name='user_id' value='<?php echo $minister["user_id"];?>'>

                        <div class="col-md-6">
                            <label for="inputName1" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="inputName1" value='<?php echo $minister["first_name"];?>'>
                        </div>
                        <div class="col-md-6">
                            <label for="inputName2" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="inputName2" value='<?php echo $minister["last_name"];?>'>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address1" id="inputAddress" placeholder="City" value='<?php echo $minister["address1"];?>'>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Stree, Apartment, studio, or floor" value='<?php echo $minister["address2"];?>'>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail4" value='<?php echo $minister["email"];?>'>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputPassword4" name="phone"  value='<?php echo $minister["phone"];?>'>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title"  value='<?php echo $minister["title"];?>' id="exampleFormControlInput1" placeholder="title">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"><?php echo $minister["description"];?></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="inputPol" class="form-label">Political Affiliation</label>
                            <input type="text" class="form-control" id="inputPol" name="political_affiliation" value='<?php echo $minister["political_affiliation"];?>'>
                        </div>

                        <div class="col-md-4">
                            <label for="Birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="Birthday" name="birth_date" value='<?php echo $minister["birth_date"];?>'>
                        </div>
                        <div class="col-md-4">
                            <label for="appointed_date" class="form-label">Appointed date</label>
                            <input type="date" class="form-control" name="appointed_date" id="appointed_date" value='<?php echo $minister["appointed_date"];?>'>
                        </div>
                        <div class="col-md-4">
                            <label for="finished_date" class="form-label">Finished date</label>
                            <input type="date" name="finished_date" class="form-control" id="finished_date" value='<?php echo $minister["finished_date"];?>'>
                        </div>
                        <div class="col-12 mb-5">
                            <input type=submit name="submit" class="btn btn-success" value="Save">
                            <input type=reset value="Clear" class="btn btn-warning">
                        </div>
                    </form>
                    <?php
                }  else {
                        printf('Sorry, Object Not found.');
                    }
                } // end if    ?>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
