<?php include "templates/head.php"?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="weather">
        <link rel="stylesheet" href="https://sinoptik.uk/resources/informer/css/informer.css">
        <div class="sin-informer sin-informer_font-verdana sin-informer_theme-light" style="width:262px;" data-lang="en"><div class="sin-informer__header"><a class="sin-informer__logo-link" href="https://sinoptik.uk" target="_blank" rel="nofollow"><img class="sin-informer__logo-image" width="66" height="20" srcset="https://sinoptik.uk/resources/informer/assets/icons/logo.png, https://sinoptik.uk/resources/informer/assets/icons/logo2x.png 2x" src="https://sinoptik.uk/resources/informer/assets/icons/logo.png" alt="Sinoptik - logo"></a><p class="sin-informer__date">Weather forecast for the near future</p><p class="sin-informer__time" data-format="24"><span class="sin-informer__time-icon"></span></p></div><div class="sin-informer__main sin-informer__main_inline"><a class="sin-informer__entry" href="https://sinoptik.uk/weather/lviv" target="_blank" rel="nofollow"><p class="sin-informer__location"> Lviv </p><div class="sin-informer__primary" style="display: none"><p class="sin-informer__local-time"></p><p class="sin-informer__temp" data-unit="c"></p><div class="sin-informer__condition" data-icon-path="https://sinoptik.uk/resources/informer/assets/icons/conditions"></div></div><div class="sin-informer__secondary" style="display: none"><p class="sin-informer__marker sin-informer__marker_wind" data-unit="ms" data-suffix="m/s" data-directions="West,Northwestern,Northern,Northeastern,Eastern,Southeastern,Southern,Southwestern,Calm" title="Wind"><span class="sin-informer__marker-icon"></span></p><p class="sin-informer__marker sin-informer__marker_humidity" title="Humidity"><span class="sin-informer__marker-icon"></span></p><p class="sin-informer__marker sin-informer__marker_pressure" data-unit="mm-hg" data-suffix="mm" title="Pressure"><span class="sin-informer__marker-icon"></span></p></div></a></div><div class="sin-informer__footer"> Weather for 10 days <a class="sin-informer__domain-link" href="https://sinoptik.uk/weather/lviv/10-days" target="_blank" rel="nofollow"> sinoptik.uk </a></div></div>
        <script src="https://sinoptik.uk/api/informer/content?loc=bwCOPQ6RBMAlPUoebrAObrFr&cem=GndJcn90GeY6GM=4CQASPw=V2nE5GMu4Cndx2k3RPS2UBM3ObSVu"></script>

    </div>

    <div class="container">
        <div class="bunners banners-2" id="bunnersWrapper">
            <div class="row">
                <div class="col-md-12">
                    <a href="https://ukc.gov.ua/" target="_blank" rel="nofollow" class="bunner js-bunners" style="background-image: url(https://www.kmu.gov.ua/storage/app/sites/1/17-baner/liniya-fon-temno-siniy.svg);" aria-label="https://ukc.gov.ua/"></a>
                    <a href="https://u24.gov.ua/uk" target="_blank" rel="nofollow" class="bunner js-bunners" style="background-image: url(https://www.kmu.gov.ua/storage/app/sites/1/17-baner/Frame%203.png);" aria-label="https://u24.gov.ua/uk"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                if(isset($mysqli)){
                    $sql = "SELECT id, title, created_date FROM cabmin WHERE finished_date IS NULL ";
                    $id = 0;
                    if ($result = $mysqli -> query($sql)) {

                        while ($row = $result -> fetch_row()) {
                            $id = $row[0];
                            printf ('<h1 class="mt-5">%s</h1>Appointed Date: <small>(%s)</small>', $row[1], $row[2]);
                        }
                        $result -> free_result();

                        echo "<hr>";
                        echo "<p class=\"lead\">The Cabinet of Ministers is the highest body in the system of bodies of executive power, 
which exercises executive power directly and through ministries, other central bodies of executive power, 
the Council of Ministers of the Autonomous Republic of Crimea and local state administrations, directs, 
coordinates and controls the activities of these bodies";
                        echo "<hr>";

                        $sql = "SELECT name FROM cabmin_powers WHERE cabmin_id = $id ";

                        if ($result = $mysqli -> query($sql)) {
                            printf('<figure><blockquote class="blockquote"><p class="h3">Cabmin powers:</p></blockquote>');

                            while ($row = $result->fetch_row()) {
                                printf('<figcaption class="blockquote-footer">%s</figcaption>', $row[0]);
                            }
                            printf('</figure>');
                            $result->free_result();
                        }
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
