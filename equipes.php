<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once('connexion.php') ?>

        <link href='css/style.css' rel='stylesheet'>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">

        <title>Rallye Video</title>
    </head>

    <body>
        <?php include("Global/header.php") ?>
        <main>
            <div class="Liste">
                <p>Listes des équipes</p>
                <?php
                // Requête SQL pour récupérer les équipes et leurs membres
                $request = "SELECT t.Nom_equipe, u.Prenom FROM rv_team t 
                            JOIN rv_user u ON t.id = u.rv_team_id";
                $result = mysqli_query($CONNEXION, $request);

                // Créer un tableau associatif pour stocker les équipes et leurs membres
                $equipes = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $equipe = $row['Nom_equipe'];
                    $membre = $row['Prenom'];
                    if (!isset($equipes[$equipe])) {
                        $equipes[$equipe] = array();
                    }
                    $equipes[$equipe][] = $membre;
                }
                // Afficher les équipes et leurs membres dans un tableau
                echo "<table border='1'>";
                echo "<tr><th>Équipe</th><th>Membres</th></tr>";
                foreach ($equipes as $equipe => $membres) {
                    echo "<tr>";
                    echo "<td>$equipe</td>";
                    echo "<td>" . implode(", ", $membres) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>
            <div class="Inscription">
            <div>
                <div>
                    <p>Inscription dans une équipe</p>
                    <form method="POST">
                        <?php
                        // Vérifier si l'utilisateur est connecté (assumons que vous avez une session utilisateur)
                        if if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];

                            // Traitement du formulaire lorsqu'il est soumis
                            if (isset($_POST['action']) && $_POST['action'] === 'confirmation') {
                                // Récupérer l'ID de l'équipe sélectionnée
                                $equipe_id = $_POST['equipe'];

                                // Ajouter l'utilisateur à l'équipe dans la base de données
                                $request = "INSERT INTO rv_user (rv_team_id) VALUES ($equipe_id) WHERE id = $user_id";
                                mysqli_query($CONNEXION, $request);
                                echo "Vous avez été inscrit dans l'équipe avec succès.";
                            }
                        } else {
                            echo "Connectez-vous pour vous inscrire dans une équipe.";
                        }
                        ?>
                        <div id="equipe-select">
                            <select name="equipe" id="equipe" required>
                                <option value="" disabled selected>Sélectionnez une équipe</option>
                                <?php
                                $request = "SELECT id, Nom_equipe FROM rv_team";
                                $equipes = mysqli_query($CONNEXION, $request);

                                while ($equipe = mysqli_fetch_assoc($equipes)) {
                                    echo "<option value='" . $equipe['id'] . "'>" . $equipe['Nom_equipe'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <button type="submit" name="action" value="confirmation">OK</button>
                        <p>L'équipe n'existe pas encore ? Inscrivez-la maintenant !</p>
                    </form>
                </div>
                <div>
                    <p>Inscription d'une équipe</p>
                    <form action="traitement.php" method="post">
                        <p>Nom de l’équipe :</p>
                        <div class="equipe">
                            <input type="text" name="nom_equipe" placeholder="Exemple : Les zigotos" required>
                        </div>
                        <p>Membres de l’équipe :</p>
                        <div class="membre">
                            <input type="text" name="nom_membre" placeholder="Exemple : Jean Dupont" required>
                            <input type="text" name="nom_membre2" placeholder="Exemple : Jean Duval" required>
                            <input type="text" name="nom_membre3" placeholder="Exemple : Jean Aval" required>
                            <input type="text" name="nom_membre4" placeholder="Exemple : Jean Anal" required>
                        </div>
                        <br>
                        <button type="button" id="ajouter_membre">Ajouter un membre</button>
                        <br>
                        <button type="submit" name="action" value="confirmation">OK</button>
                        <p>L'équipe existe déjà ? Si oui, joins-toi à elle !</p>
                    </form>
                    <script>
                        document.getElementById('ajouter_membre').addEventListener('click', function() {
                            var membresDiv = document.getElementById('membres');
                            var newMembreDiv = document.querySelector('.membre').cloneNode(true);
                            membresDiv.appendChild(newMembreDiv);
                        });
                    </script>
                </div>
            </div>
        </main>
        <?php include("Global/footer.php") ?>
    </body>
    
</html>