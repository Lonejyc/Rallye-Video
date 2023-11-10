<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, affichez un message et empêchez-le de voter.
    echo "Vous devez vous connecter pour voter.";
    exit; // Arrêtez le script
}

// Vérifiez si l'utilisateur a déjà voté
if (!isset($_SESSION['votes'])) {
    $_SESSION['votes'] = array(); // Créez un tableau pour suivre les votes
}
?>

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
        <?php include("Global/header.php") ?>
        <main>
            <div>
                <h1>Vote</h1>
                <div class="parent">
                    <div class="div1"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div2"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div3"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div4"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div5"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div6"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div7"> 
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span>
                    </div>
                    <div class="div8">
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span> </div>
                    <div class="div9">
                        <button class="vote-button" data-votes="0">Vote</button>
                        <span class="vote-count">0</span> 
                    </div>
                </div>
            </div>
            <script>
                // Sélectionnez tous les boutons de vote
                const voteButtons = document.querySelectorAll('.vote-button');

                // Limite de votes par utilisateur
                const maxVotes = 3;

                // Écoutez les clics sur les boutons de vote
                voteButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const div = button.parentElement;
                        const voteCount = div.querySelector('.vote-count');
                        let votes = parseInt(voteCount.textContent);

                        if (votes < maxVotes) {
                            // Vérifiez si l'utilisateur a déjà voté pour cette œuvre
                            if (!hasVoted(div)) {
                                votes++;
                                voteCount.textContent = votes;
                                button.setAttribute('disabled', 'true');

                                // Enregistrez le vote dans la session de l'utilisateur
                                recordVote(div);

                                // Vous pouvez également ajouter ici le code pour enregistrer le vote côté serveur.
                            } else {
                                alert('Vous avez déjà voté pour cette œuvre.');
                            }
                        } else {
                            alert('Vous avez atteint la limite de votes.');
                        }
                    });
                });

                // Fonction pour vérifier si l'utilisateur a déjà voté pour une œuvre
                function hasVoted(div) {
                    const divIndex = Array.from(div.parentElement.children).indexOf(div);
                    return divIndex in userVotes;
                }

                // Fonction pour enregistrer le vote de l'utilisateur dans la session
                function recordVote(div) {
                    const divIndex = Array.from(div.parentElement.children).indexOf(div);
                    userVotes[divIndex] = true;
                }
            </script>
        </main>
        <?php include("Global/footer.php") ?>
    </body>

</html>