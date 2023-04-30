<?php

require_once 'db/databaseconnect.php';

?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap contributors">
    <meta name="generator" content="">
    <link rel="icon" type="image/png" sizes="72x72" href="https://www.kmu.gov.ua/themes/kmu/assets/images/favicon/android-icon-72x72.png">
    <title><?php echo getenv('PROJECT_NAME') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bunners {
            padding-left: 40px;
            padding-right: 40px;
            background-color: #f4f7fa;
            padding-bottom: 20px;
            padding-top: 25px;
        }

        .bunners .bunner {
            display: block;
            width: 565px;
            height: 290px;
            margin: 0 auto;
            margin-bottom: 20px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .banners-2 .bunner:nth-child(1) {
            margin-right: 10px;
        }
        .banners-2 .bunner {
            float: left;
        }

        .weather {
            position: absolute;
        }

        .weather .sin-informer {
            width: 240px !important;
            margin-top: 60px;
        }

        body {
            /*background: linear-gradient(90deg, rgba(2,0,32,0) 0%, rgba(255,215,0,0.2525603991596639) 2%, rgba(0,87,184,0.1909357492997199) 100%)*/
            background: rgb(2,0,32);
            background: linear-gradient(90deg, rgba(2,0,32,0) 0%, rgba(255,215,0,0.05087972689075626) 0%, rgba(0,87,184,0.022868522408963532) 86%);
        }
    </style>
    <link href="../sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Government Editor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ministers.php">Ministers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="committee.php">Committees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.kmu.gov.ua/" target="_blank">
                            Official website
                        </a>
                    </li>
                </ul>
<!--                <form class="d-flex">-->
<!--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                    <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--                </form>-->
            </div>
        </div>
    </nav>
</header>
