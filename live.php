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
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
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
        // Variables pour stocker l'ID de la vidéo YouTube et la clé API
        const videoId = 'jfKfPfyJRdk';
        const apiKey = 'AIzaSyBmI6Wf--_cdvzQnD2NX4XtODw44xuJZgM';

        // Fonction d'initialisation du lecteur vidéo
        function onYouTubeIframeAPIReady() {
            new YT.Player('player', {
                height: '360',
                width: '640',
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
            // Actualisez les commentaires toutes les 1 secondes (ajustable selon vos besoins)
            setInterval(loadComments, 1000);
        }

        // Fonction pour charger les commentaires
        function loadComments() {
            // Utilisez l'API YouTube Data v3 pour récupérer les commentaires
            $.get(
                'https://www.googleapis.com/youtube/v3/commentThreads',
                {
                    part: 'snippet',
                    videoId: videoId,
                    key: apiKey,
                    maxResults: 10,
                },
                function(data) {
                    displayComments(data.items);
                }
            );
        }

        // Fonction pour afficher les commentaires
        function displayComments(comments) {
            var commentSection = $('#live-chat');
            commentSection.empty(); // Efface les commentaires existants

            comments.forEach(function(comment) {
                var commentText = comment.snippet.topLevelComment.snippet.textDisplay;
                commentSection.append('<p>' + commentText + '</p>');
            });

            // Ajoutez un formulaire pour ajouter des commentaires (si nécessaire)
            commentSection.append('<form id="comment-form"><textarea id="new-comment"></textarea><br/><button type="button" onclick="postComment()">Ajouter un commentaire</button></form>');
        }

        // Fonction pour poster un commentaire
        function postComment() {
            var newComment = $('#new-comment').val();
            
            // Préparez les données pour l'envoi du commentaire
            var commentData = {
                snippet: {
                    videoId: videoId,
                    topLevelComment: {
                        snippet: {
                            textOriginal: newComment
                        }
                    }
                }
            };
            
            // Envoie du commentaire à l'API YouTube
            $.ajax({
                type: 'POST',
                url: 'https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&key=' + apiKey,
                contentType: 'application/json',
                data: JSON.stringify(commentData),
                success: function(response) {
                    console.log('Commentaire posté avec succès :', response);
                    // Vous pouvez ajouter des actions supplémentaires après avoir posté le commentaire
                },
                error: function(error) {
                    console.error('Erreur lors de la publication du commentaire :', error);
                    // Gérez les erreurs ici
                }
            });
        }
    </script>
    </body>
</html>