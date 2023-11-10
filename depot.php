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
        <title>Rallye Video - Depot</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Déposer un film</h1>
                <span>Pour déposer un film, vous devez déposer un dossier contenant votre film, une affiche et une miniature (dossier ≈ 300Mo).</span>
                <h2>Convention de nommage :</h2>
                <ul>
                    <li>Film.mp4 (Vidéo+générique / .mp4 / H.264 / 1920x1080 / Débit 150000 kbit/s)</li>
                    <li>Film_Affiche.png (format A4)</li>
                    <li>Film_minia.png (format 1920x1080)</li>
                </ul>
                <iframe
                    id="inlineFrameExample"
                    title="Inline Frame Example"
                    width="500"
                    height="500"
                    src="https://iutc-cloud.univ-smb.fr/s/z3FPBnSMLRCTCbk">
                </iframe>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>