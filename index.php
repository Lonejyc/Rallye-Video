<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once('connexion.php');
        ?>
        <link href='css/style.css' rel='stylesheet'>

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">

        <title>Rallye Video</title>
    </head>

    <body>
        <header>
            <a href="index.php"><h1>Rallye video - Index</h1></a>
            <img src="images/logo.svg">
            <ul>
                <li><h2>Événement</h2></li>
                <li><a href="equipes.php"><h2>Équipe</h2></a></li>
                <li><h2>Dépot</h2></li>
                <li><a href="vote.php"><h2>Vote</h2></a></li>
            </ul>
            <h2>Live</h2>
            <a href="inscription.php"><h2>Connexion</h2></a>
        </header>
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
        <footer>
            <div>
                <ul>
                    <li><h3>PARTENAIRES</h3></li>
                    <li><h3>MENTIONS LÉGALES</h3></li>
                    <li><h3>À PROPOS</h3></li>
                </ul>
                <img src="images/fleche.svg">
            </div>
            <p>Copyright © Rallye Vidéo MMI 2023-2024</p>
        </footer>
    </body>

</html>