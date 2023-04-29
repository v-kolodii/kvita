<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php
                if(isset($mysqli)){
                    $sql = "SELECT title, created_date FROM cabmin WHERE finished_date IS NULL ";

                    if ($result = $mysqli -> query($sql)) {

                        while ($row = $result -> fetch_row()) {
                            printf ('<h1 class="mt-5">%s</h1>Date: <small>(%s)</small>', $row[0], $row[1]);
                        }
                        $result -> free_result();

                    } else {
                        echo "Unfortunately, the Cabinet of Ministers has completed its work.";
                    }

                    $mysqli -> close();
                }
                ?>
                <h4 class="mt-5">News</h4>
                <?php include "templates/news.php"?>
            </div>
            <?php include "templates/sidebar.php"?>
        </div>
    </div>
</main>

<?php include "templates/footer.php"?>
