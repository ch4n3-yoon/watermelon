<?php require_once __DIR__ . '/core.php'; ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Watermelon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha256-VsEqElsCHSGmnmHXGQzvoWjWwoznFSZc6hs7ARLRacQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha256-eSi1q2PG6J7g7ib17yAaWMcrr5GrtohYChqibrV7PBE=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap-grid.min.css" integrity="sha256-vl+0p/Z28RcVvC+cofUiIeYusGdOc4CXk/taqgQ2/XU=" crossorigin="anonymous">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding|Ubuntu|Pacifico&amp;display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Ubuntu', sans-serif, 'Nanum Gothic Coding', monospace;
        }
        .content {
            width: 60%;
        }
        .header {
            /*font-family: 'Pacifico', sans-serif;*/
            font-weight: bold;
            text-align: center;
            padding-top: 2em;
            padding-bottom: 0.5em;
        }
        .menu {
            list-style-type: none;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .menu li {
            display: inline-block;
            padding: 1em;
        }

        .title {
            margin-top: 1em;
            margin-bottom: 1em;
            font-weight: bold;
        }

        .left {
            width: 30%;
            float: left;
        }

        .right {
            width: 70%;
            float: right;
        }

        .all {
            width: 100%;
        }

        .right {
            float: right;
        }

    </style>
</head>
<body>
<div class="container content">
    <?php require_once __DIR__ . '/nav.php'; ?>
    <hr>
    <div class="block">
        <?php

        $p = $_REQUEST['p'];
        switch ($p) {
            case 'main':
            case 'signin':
            case 'signin.ok':
            case 'signup':
            case 'signup.ok':
            case 'signout':
            case 'list':
            case 'chart':
            case 'upload':
            case 'upload.ok':
                require_once __DIR__ . '/' . $p . '.php';
                break;
            default:
                if (!isset($p))
                    require_once __DIR__ . '/main.php';
                else
                    require_once __DIR__ . '/404.php';
        }

        ?>
    </div>
</body>
</html>
