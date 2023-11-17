<?php
    // Lancement de la session
    session_start();

    $user_id = $_SESSION['user_id'];

    // Connexion à la base de données
    $connect = mysqli_connect('localhost', 'root', '', 'rallyevideo');

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Retrieve user information from the database
    $sql = "SELECT Nom, Prenom, Email, Mdp, Nom_equipe FROM rv_user u RIGHT JOIN rv_team t ON u.rv_team_id=t.id WHERE u.id = $user_id";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $nom = $row["Nom"];
            $prenom = $row["Prenom"];
            $mail = $row["Email"];
            $team = $row["Nom_equipe"];
        }
    } else {
        $sql = "SELECT Nom, Prenom, Email, Mdp FROM rv_user u WHERE u.id = $user_id";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $nom = $row["Nom"];
                $prenom = $row["Prenom"];
                $mail = $row["Email"];
            }
        } else echo "Aucun résultats";
    }
    $connect->close();
?>

<!DOCTYPE html>
<!-- Partie HTML de la page -->
<html lang="fr">
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
        <link href="css/dashboard.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video - Tableau de Bord</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Dashboard</h1>
                <section class="profil" aria-label="Informations du profil">
                    <h2>Information du profil</h2>
                    <p><span class="bold">Nom:</span> <?php echo $nom; ?></p>
                    <p><span class="bold">Prénom:</span> <?php echo $prenom; ?></p>
                    <p><span class="bold">Email:</span> <?php echo $mail; ?></p>
                    <?php if (isset($team)) { ?>
                    <p><span class="bold">Team:</span> <?php echo $team; ?></p>
                    <?php } else { ?>
                    <p><span class="bold">Team:</span> Aucune team</p>
                    <?php } ?>
                </section>
                <section class="mdp" aria-label="Changer le mot de passe">
                <h2>Changer le mot de passe</h2>
                    <form action="dashboard.php" method="post">
                        <input type="password" name="password" id="password" placeholder="Mot de passe actuel" required>
                        <input type="password" name="new_password" id="new_password" placeholder="Nouveau mot de passe" required>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le nouveau mot de passe" required>
                        <input type="submit" value="Changer le mot de passe">
                        <!-- <button type="submit" name="action" value="changement">Changer le mot de passe</button> -->
                    </form>
                    <?php
                        function changePassword($user_id, $current_password, $new_password) {
                            // Connexion à la base de données
                            $connect = mysqli_connect('localhost', 'root', '', 'rallyevideo');

                            // Check connection
                            if ($connect->connect_error) {
                                die("Connection failed: " . $connect->connect_error);
                            }

                            // Retrieve user information from the database
                            $sql = "SELECT Mdp FROM rv_user WHERE id = $user_id";
                            $result = $connect->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $mdp = $row["Mdp"];
                                }
                            } else {
                                echo "0 results";
                            }

                                // Verify current password
                            if (password_verify($current_password, $mdp)) {
                                // Hash new password
                                $new_mdp = password_hash($new_password, PASSWORD_DEFAULT);

                                // Update password in database
                                $sql = "UPDATE rv_user SET Mdp = '$new_mdp' WHERE id = $user_id";
                                if ($connect->query($sql) === TRUE) {
                                    echo "Mot de passe mis à jour";
                                } else {
                                    echo "Erreur lors de la mise à jour du mot de passe: " . $connect->error;
                                }
                            } else {
                                echo "Le mot de passe actuel est incorrect";
                            }
                            $connect->close();
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $current_password = $_POST["password"];
                            $new_password = $_POST["new_password"];
                            $confirm_password = $_POST["confirm_password"];

                            if ($new_password != $confirm_password) {
                                echo "Le nouveau mot de passe et le mot de passe confirmé ne sont pas les même";
                            } else {
                                changePassword($user_id, $current_password, $new_password);
                            }
                        }
                    ?>
                </section>
                <a href='se_deconnecter.php' aria-label="Déconnexion"><span class="decon">Déconnexion</span></a>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>
