<!-- Lancement de la session  -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require_once('connexion.php') ?>
        <link rel="icon" type="image/x-icons" href="images/logo_cam.svg">
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/live.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Rallye Video - Live Page Attente</title>
    </head>
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap" role="main" aria-label="Contenu principal">
                <h1 role="heading" aria-level="1">À faire</h1>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>
