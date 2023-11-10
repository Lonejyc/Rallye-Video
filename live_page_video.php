<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once('connexion.php') ?>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">

        <title>Rallye Video</title>
    </head>

    <body>
        <div class="wrap">
            <?php include("Global/header.php") ?>
            <main>
                <h1>À faire</h1>
            </main>
            <?php include("Global/footer.php") ?>
        </div>
    </body>

</html>