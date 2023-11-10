<!-- Lancement de la session  -->
<?php session_start(); ?>

<!DOCTYPE html>
<!-- Partie HTML de la page -->
<html>
    <!-- Section Head de la page HTML -->
    <head>
        <?php require_once('connexion.php') ?>
        <!-- Lien Logo -->
	    <link rel="icon" type="image/x-icons" href="images/logo_cam.svg">
        <!-- Lien CSS -->
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/wrap.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <div>
                    <p>Le Rallye Vidéo commence dans</p>
                    <img src="images/logo_montre.svg">
                    <div>
                        <p>0</p>
                        <p>0</p>
                        <p>Jours</p>
                    </div>
                    <div>
                        <p>0</p>
                        <p>0</p>
                        <p>Heures</p>
                    </div>
                    <div>
                        <p>0</p>
                        <p>0</p>
                        <p>Minutes</p>
                    </div>
                </div>
                <p>Annimation Bannière à faire</p>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>