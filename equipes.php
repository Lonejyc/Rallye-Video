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
    <?php include("Global/header.html") ?>
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
            <div>
                <p>Inscription dans une équipe</p>
                <form method="POST">
                    <?php
                    $request = "SELECT * FROM rv_team";
                    $noms = mysqli_query($CONNEXION, $request);
                    ?>
                    <div id="equipe-select">
                        <select id="id" required>
                            <option value="" disabled selected></option>
                            <?php while ($nom = mysqli_fetch_assoc($noms)): ?>
                                <option value="<?php echo $nom['id'] ?>"><?php echo $nom['Nom_equipe']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" name="action" value="confirmation">OK</button>
                    <p>L'équipe n'existe pas encore ? Inscris-la maintenant !</p>
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
    <?php include("Global/footer.html") ?>
</body>

</html>