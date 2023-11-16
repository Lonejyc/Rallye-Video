// Variables pour stocker l'ID de la vidéo YouTube et la clé API
const videoId = 'vMRXc06uN2vmpwWU'; // Remplacez par l'ID de votre vidéo
const apiKey = 'AIzaSyD03L3Cvbq--FipuDu-u5uLvgbPRcwFDBk'; // Remplacez par votre clé API

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
    // Actualisez les commentaires toutes les 5 secondes (ajustable selon vos besoins)
    setInterval(loadComments, 5000);
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
    // Vous pouvez implémenter l'envoi du commentaire à l'API YouTube ici avec une requête POST
    // N'oubliez pas de gérer l'authentification avec votre clé API
    // Cette fonction devrait être complétée selon vos besoins spécifiques
    console.log('Nouveau commentaire à poster :', newComment);
}