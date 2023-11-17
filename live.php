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
        <link href="css/live.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video - Live</title>
        <!-- Inclusion de jQuery avant le script -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Live</h1>
                <section>
                    <div id="player"></div>
                    <div id="live-chat"></div>
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
        <script src="https://www.youtube.com/iframe_api"></script>
        <script>
        var videoId = 'mPhl23eo69g';
        var apiKey = 'AIzaSyD03L3Cvbq--FipuDu-u5uLvgbPRcwFDBk';

        // Fonction pour charger les commentaires
        function loadComments() {
            $.get(
                'https://www.googleapis.com/youtube/v3/commentThreads', {
                    part: 'snippet',
                    videoId: videoId,
                    key: apiKey,
                    maxResults: 15,
                },
                function(data) {
                    var commentSection = $('#live-chat');
                    commentSection.empty(); // Efface les commentaires existants

                    data.items.forEach(function(comment) {
                        var commentText = comment.snippet.topLevelComment.snippet.textDisplay;
                        commentSection.append('<p>' + commentText + '</p>');
                    });
                }
            );
        }

        // Fonction d'initialisation du lecteur vidéo
        function onYouTubeIframeAPIReady() {
            new YT.Player('player', {
                videoId: videoId,
                events: {
                    'onReady': onPlayerReady,
                }
            });
        }

        // Fonction appelée lorsque le lecteur est prêt
        function onPlayerReady(event) {
            event.target.playVideo();
            // Chargez les commentaires lorsque le lecteur est prêt
            loadComments();
            // Actualisez les commentaires toutes les 1 seconde (ajustable selon vos besoins)
            setInterval(loadComments, 1000);
        }
    </script>
    </body>
</html>