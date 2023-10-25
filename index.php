<!DOCTYPE html>
<html>
    <head>
        <?php require_once('connexion.php') ?>

        <link href='css/style.css' rel='stylesheet'>

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">

        <title>Rallye Video</title>
    </head>

    <body>
        <main>
            <?php include("Global/header.php") ?>
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
            <?php include("Global/footer.php") ?>
        </main>
    </body>

</html>