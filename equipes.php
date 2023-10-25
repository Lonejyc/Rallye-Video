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
        <a href="index.php"><h1>Rallye video - Équipe</h1></a>
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
        <div class="Liste">
            <p>Listes des équipes</p>
            <?php
            $equipes = array(
                "Équipe 1" => array("Membre 1", "Membre 2", "Membre 3"),
                "Équipe 2" => array("Membre A", "Membre B", "Membre C"),
                "Équipe 3" => array("Membre X", "Membre Y", "Membre Z")
            );
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
            <p>Inscription dans une équipe</p>
            <form action="traitement.php" method="post">
                <p>Nom de l’équipe :</p>
                <select name="categorie" id="input-cat" value="Etat" required>
                        <option value="1">Ouai ouai</option>
                    </select>
                </div>
                <br>
                <input type="submit" value="OK">
                <p>L'équipe n'existe pas encore ? Inscris-la maintenant !</p>
            </form>
            <p>Inscription d'une équipe</p>
            <form action="traitement.php" method="post">
                <p>Nom de l’équipe :</p>
                <div class="equipe">
                    <input type="text" name="nom_equipe" placeholder="Exemple : Les zigotos" required>
                </div>
                <p>Membres de l’équipe :</p>
                <div class="membre">
                    <input type="text" name="nom_membre" placeholder="Exemple : Jean Dupont" required>
                </div>
                <br>
                <button type="button" id="ajouter_membre">Ajouter un membre</button>
                <br>
                <input type="submit" value="OK">
                <p>L'équipe existe déjà ? Si oui, joins-toi à elle !</p>
            </form>

             <!-- Script pour ajouter un membre
            <script>
                document.getElementById('ajouter_membre').addEventListener('click', function() {
                    var membresDiv = document.getElementById('membres');
                    var newMembreDiv = document.querySelector('.membre').cloneNode(true);
                    membresDiv.appendChild(newMembreDiv);
                });
            </script>
             -->
        </div>
    </main>
    <footer>
        <div>
            <ul>
                <li>
                    <h3>PARTENAIRES</h3>
                </li>
                <li>
                    <h3>MENTIONS LÉGALES</h3>
                </li>
                <li>
                    <h3>À PROPOS</h3>
                </li>
            </ul>
            <img src="images/fleche.svg">
        </div>
        <p>Copyright © Rallye Vidéo MMI 2023-2024</p>
    </footer>
</body>

</html>