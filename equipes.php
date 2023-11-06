<?php session_start(); ?>

<?php
// Vérifie si le formulaire a été soumis
if (isset($_POST['action']) && $_POST['action'] === 'confirmation') {
    // Récupère le nom de l'équipe
    $nomEquipe = $_POST['nom_equipe'];

    // Connexion à la base de données (assurez-vous de configurer la connexion à votre base de données)
    $CONNEXION = mysqli_connect('localhost', 'root', 'root', 'rallyevideo');

    // Vérifie si la connexion à la base de données a réussi
    if ($CONNEXION) {
        // Échappe les valeurs pour éviter les injections SQL
        $nomEquipe = mysqli_real_escape_string($CONNEXION, $nomEquipe);

        // Insère l'équipe dans la table rv_team
        $insertEquipeQuery = "INSERT INTO rv_team (Nom_equipe) VALUES ('$nomEquipe')";
        if (mysqli_query($CONNEXION, $insertEquipeQuery)) {
            $equipe_id = mysqli_insert_id($CONNEXION); // Récupère l'ID de l'équipe nouvellement créée

            // Parcourir les membres de l'équipe
            for ($i = 1; $i <= 8; $i++) {
                if (isset($_POST["membre$i"])) {
                    $membreEmail = $_POST["membre$i"];
                    $membreEmail = mysqli_real_escape_string($CONNEXION, $membreEmail);

                    // Recherche l'ID de l'utilisateur en fonction de son email
                    $searchUserQuery = "SELECT id, rv_team_id FROM rv_user WHERE Email = '$membreEmail'";
                    $result = mysqli_query($CONNEXION, $searchUserQuery);

                    // Vérifie si l'utilisateur existe dans la base de données
                    if ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];
                        $user_team_id = $row['rv_team_id'];

                        if ($user_team_id !== null) {
                            // L'utilisateur a déjà une équipe, afficher un message d'erreur et arrêter l'inscription
                            $erreur = "L'utilisateur avec l'email $membreEmail a déjà une équipe. Cherchez un autre membre pour votre équipe ou contactez l'administrateur du site.";
                            break; // Arrêter le traitement des autres membres
                        } else {
                            // Mettre à jour le champ rv_team_id de l'utilisateur avec l'ID de l'équipe
                            $updateMembreQuery = "UPDATE rv_user SET rv_team_id = $equipe_id WHERE id = $user_id";
                            mysqli_query($CONNEXION, $updateMembreQuery);
                        }
                    } else {
                        // L'utilisateur avec cet e-mail n'existe pas, afficher un message d'erreur
                        $erreur = "L'utilisateur avec l'e-mail $membreEmail n'existe pas dans la base de données.";
                        // Annule l'inscription et arrête le traitement des autres membres
                        $annulerInscriptionQuery = "DELETE FROM rv_team WHERE id = $equipe_id";
                        mysqli_query($CONNEXION, $annulerInscriptionQuery);
                        break;
                    }
                }
            }
            $succes = "L'équipe a été inscrite avec succès !";
        } else {
            $erreur = "Erreur lors de l'inscription de l'équipe. Veuillez réessayer.";
        }

        // Ferme la connexion à la base de données
        mysqli_close($CONNEXION);
    } else {
        $erreur = "Erreur de connexion à la base de données. Veuillez contacter l'administrateur.";
    }
}
?>

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
                // Requête SQL pour récupérer les équipes et leurs membres avec prénom et nom
                $request = "SELECT t.Nom_equipe, CONCAT(u.Prenom, ' ', u.Nom) AS Membre FROM rv_team t 
                JOIN rv_user u ON t.id = u.rv_team_id";
                $result = mysqli_query($CONNEXION, $request);

                // Créer un tableau associatif pour stocker les équipes et leurs membres
                $equipes = array();
                while ($row = mysqli_fetch_assoc($result)) {
                $equipe = $row['Nom_equipe'];
                $membre = $row['Membre'];
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
                    <p>Inscription dans une équipe</p>
                    <form method="POST">
                        <?php
                        // Vérifier si l'utilisateur est connecté (assumons que vous avez une session utilisateur)
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];

                            // Vérifier si l'utilisateur a déjà une équipe (rv_team_id non NULL)
                            $checkTeamQuery = "SELECT rv_team_id FROM rv_user WHERE id = $user_id";
                            $row = mysqli_fetch_assoc(mysqli_query($CONNEXION, $checkTeamQuery));

                            if ($row['rv_team_id'] === NULL) {
                                // L'utilisateur n'a pas d'équipe, donc il peut s'inscrire
                                if (isset($_POST['action']) && $_POST['action'] === 'confirmation') {
                                    // Récupérer l'ID de l'équipe sélectionnée
                                    $equipe_id = $_POST['equipe'];

                                    // Récupérer le nom de l'équipe correspondant à l'ID
                                    $getTeamNameQuery = "SELECT Nom_equipe FROM rv_team WHERE id = $equipe_id";
                                    $teamNameRow = mysqli_fetch_assoc(mysqli_query($CONNEXION, $getTeamNameQuery));

                                    if ($teamNameRow) {
                                        $equipe_nom = $teamNameRow['Nom_equipe'];

                                        // Ajouter l'utilisateur à l'équipe dans la base de données
                                        $updateUserTeamQuery = "UPDATE rv_user SET rv_team_id = $equipe_id WHERE id = $user_id";
                                        mysqli_query($CONNEXION, $updateUserTeamQuery);
                                        echo "Vous avez été inscrit dans l'équipe $equipe_nom.";
                                    }
                                }
                            } else {
                                // L'utilisateur a déjà une équipe
                                echo "Vous êtes déjà inscrit dans une équipe. Si vous voulez changer d'équipe, contactez l'administrateur du site.";
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
                <div class="Inscription">
                    <?php if(isset($succes)) {?>
                        <span class="succes"><?php echo $succes ?></span>
                    <?php } if(isset($erreur)) {?>
                        <span class="erreur" ><?php echo $erreur ?></span>
                    <?php } ?>
                    <p>Inscription d'une équipe</p>
                    <form method="POST" action="">
                        <p>Nom de l’équipe :</p>
                        <div class="equipe">
                            <input type="text" name="nom_equipe" placeholder="Exemple : Les zigotos" required>
                        </div>
                        <p>Membres de l’équipe :</p>
                        <div class="membre">
                            <input type="text" name="membre1" placeholder="Exemple : Jean1@gmail.com" required>
                            <input type="text" name="membre2" placeholder="Exemple : Jean2@gmail.com" required>
                            <input type="text" name="membre3" placeholder="Exemple : Jean3@gmail.com" required>
                            <input type="text" name="membre4" placeholder="Exemple : Jean4@gmail.com" required>
                        </div>
                        <br>
                        <button id="ajouterMembres">Ajouter un membre</button>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const ajouterMembresButton = document.getElementById("ajouterMembres");
                                const membresContainer = document.querySelector(".membre");

                                ajouterMembresButton.addEventListener("click", function (e) {
                                    e.preventDefault();
                                    
                                    // Compter le nombre de champs de membre actuels
                                    const existingMembreInputs = membresContainer.querySelectorAll("input[type='text'][name^='membre']");

                                    // Vérifier s'il y a déjà 4 membres
                                    if (existingMembreInputs.length >= 8) {
                                        alert("Vous avez atteint la limite de membre.");
                                        return; // Ne pas ajouter de membre supplémentaire
                                    }

                                    // Si la limite n'est pas atteinte, ajouter un nouveau membre
                                    const newMembreIndex = existingMembreInputs.length + 1;

                                    // Cloner le premier champ de membre (ou un modèle)
                                    const clonedMembreInput = existingMembreInputs[0].cloneNode(true);

                                    // Mettre à jour le nom du champ cloné pour le nouveau membre
                                    clonedMembreInput.name = `membre${newMembreIndex}`;
                                    clonedMembreInput.placeholder = `Exemple : Jean${newMembreIndex}@gmail.com`;

                                    // Ajouter le champ cloné au formulaire
                                    membresContainer.appendChild(clonedMembreInput);
                                });
                            });
                        </script>
                        <br>
                        <button type="submit" name="action" value="confirmation">OK</button>
                        <p>L'équipe existe déjà ? Si oui, ajoute-toi à elle !</p>
                    </form>
                </div>
            </div>
        </main>
        <?php include("Global/footer.php") ?>
    </body>
    
</html>