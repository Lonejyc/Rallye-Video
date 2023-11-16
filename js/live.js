// Remplacez 'YOUR_API_KEY' par votre clé d'API YouTube
const apiKey = 'AIzaSyD03L3Cvbq--FipuDu-u5uLvgbPRcwFDBk';
// Remplacez 'YOUR_YOUTUBE_VIDEO_ID' par l'ID de votre vidéo YouTube
const videoId = '4xDzrJKXOOY';
let liveChatId;

function loadLiveChat() {
    // Appel à l'API YouTube Data v3
    fetch(`https://www.googleapis.com/youtube/v3/videos?part=liveStreamingDetails&id=${videoId}&key=${apiKey}`)
        .then(response => response.json())
        .then(data => {
            liveChatId = data.items[0].liveStreamingDetails.activeLiveChatId;
            startFetchingComments();
        })
        .catch(error => console.error('Erreur lors de la récupération des détails de la vidéo en direct:', error));
}

function startFetchingComments() {
    function fetchComments() {
        // Récupération des messages du chat
        fetch(`https://www.googleapis.com/youtube/v3/liveChat/messages?part=snippet&liveChatId=${liveChatId}&maxResults=10&key=${apiKey}`)
            .then(response => response.json())
            .then(chatData => {
                const chatContainer = document.getElementById('comments');

                // Nettoyer le conteneur avant d'ajouter de nouveaux messages
                chatContainer.innerHTML = '';

                chatData.items.forEach(item => {
                    const message = item.snippet.displayMessage;
                    const author = item.snippet.authorDisplayName;

                    const chatMessage = document.createElement('p');
                    chatMessage.textContent = `${author}: ${message}`;
                    chatContainer.appendChild(chatMessage);
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des messages du chat:', error));
    }

    // Rafraîchit les commentaires toutes les secondes (1000 millisecondes)
    setInterval(fetchComments, 1000);

    // Charge les commentaires au chargement initial de la page
    fetchComments();
}

// Appeler la fonction pour charger le chat en direct
loadLiveChat();

const socket = io();
socket.on('newComment', () => {
    startFetchingComments();
});

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value.trim();

    if (message !== '') {
        // Envoyer le message directement à l'API YouTube (à mettre en œuvre)
        // Notez que cela expose votre clé d'API, ce qui peut être un risque de sécurité
        fetch(`https://www.googleapis.com/youtube/v3/liveChat/messages?part=snippet&liveChatId=${liveChatId}&key=${apiKey}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                snippet: {
                    type: 'textMessageEvent',
                    liveChatId: liveChatId,
                    textMessageDetails: {
                        messageText: message,
                    },
                },
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Le message a été envoyé avec succès
            console.log('Message envoyé avec succès:', data);

            // Rafraîchir les commentaires après l'envoi d'un nouveau message
            socket.emit('newComment');
        })
        .catch(error => console.error('Erreur lors de l\'envoi du message:', error));

        // Effacer le champ de saisie après l'envoi
        messageInput.value = '';
    }
}
