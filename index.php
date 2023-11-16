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
        <!-- Lien JS -->
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
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
                    <div class="lottie">
                        <dotlottie-player src="anim/WaitingAnimation.lottie" background="transparent" speed="1" loop autoplay></dotlottie-player>
                    </div>
                    <p class="title">Le Rallye Vidéo commence dans</p>
                    <div class="countdown">
                        <div class="box">
                            <div class="time">
                                <span class="days1"></span>
                                <span class="days2"></span>
                            </div>
                            <div class="unite">Jours</div>
                        </div>
                        <div class="dots">
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                        <div class="box">
                            <div class="time">
                                <span class="hours1"></span>
                                <span class="hours2"></span>
                            </div>
                            <div class="unite">Heures</div>
                        </div>
                        <div class="dots">
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                        <div class="box">
                            <div class="time">
                                <span class="minutes1"></span>
                                <span class="minutes2"></span>
                            </div>
                            <div class="unite">Minutes</div>
                        </div>
                    </div>
                    <script src="js/countdown.min.js"></script>
                </section>
            </div>
            <section class="bannière">
                <div class="bannièreText">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                    <p>Rallye</p>
                    <p>Vidéo</p>
                    <img src="images/logo_cam.svg" alt="Logo Caméra du Rallye Vidéo">
                </div>
            </section>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>