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
        <link href="css/style.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
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
                <section class="tempsRestant">
                    <p class="title">Le Rallye Vidéo commence dans</p>
                    <img src="images/logo_montre.svg">
                    <div class="countdown">
                        <div class="box">
                            <span class="days"></span>
                            <div class="unite">Jours</div>
                        </div>
                        <div class="box">
                            <span class="hours"></span>
                            <div class="unite">Heures</div>
                        </div>
                        <div class="box">
                            <span class="minutes"></span>
                            <div class="unite">Minutes</div>
                        </div>
                    </div>
                    <script src="js/countdown.min.js"></script>
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>