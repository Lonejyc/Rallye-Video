<?php 
    session_start();
?>

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
            </main>
            <?php include("Global/footer.php") ?>
        </div>
    </body>
</html>