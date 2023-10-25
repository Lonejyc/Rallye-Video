<?php 
    require_once('connexion.php');
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <link href='css/style.css' rel='stylesheet'>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Rallye Video</title>
    </head>

    <body>
        <?php include("Global/header.php") ?>
        <main>
            <div>
                <p>Le Rallye Vidéo commence dans</p>
                <img src="images/animhorloge.svg">
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
        </main>
        <?php include("Global/footer.php") ?>
    </body>

</html>