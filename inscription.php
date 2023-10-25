<?php
session_start();

// Récupère les données saisies par l'utilisateur
if(isset($_POST['action'])) {
    $action = $_POST['action'];
    if($action == 'inscription') {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

            // Connexion à la base de données
            $connect = mysqli_connect('localhost', 'root', '', 'rallyevideo');

            // Vérifie si la connexion a réussi
            if (!$connect) {
                die('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Prépare la requête SQL pour insérer les données dans la table "utilisateurs"
            $request = "INSERT INTO rv_user (Nom, Prenom, Email, Mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";

            // Exécute la requête SQL
            if (mysqli_query($connect, $request)) {
                $succes = "Votre compte a été créé avec succès";
            } else {
                echo "Erreur : " . mysqli_error($connect);
            }

            // Ferme la connexion à la base de données
            mysqli_close($connect);
        } else $erreur = "Veuillez remplir tout les champs";
    } else if($action == 'connexion') {
        if(!empty($_POST['mail']) AND !empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $mdp = $_POST['password'];

            // Connexion à la base de données
            $connect = mysqli_connect('localhost', 'root', '', 'rallyevideo');

            // Vérifie si la connexion a réussi
            if (!$connect) {
                die('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Prépare la requête SQL pour récupérer les données de l'utilisateur
            $request = "SELECT * FROM rv_user WHERE Email='$mail'";

            // Exécute la requête SQL
            $result = mysqli_query($connect, $request);
            if($result){
                // Vérifie si l'utilisateur existe
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if(password_verify($mdp, $row['Mdp'])) {
                        $_SESSION['user_id'] = $row['id'];
                        echo "Connecté";
                        //header('Location: dashboard.php');
                        exit();
                    } else {
                        $erreur = "Mot de passe incorrect";
                    }
                } else {
                    $erreur = "Utilisateur non trouvé";
                }
            } else {
                echo "Erreur : " . mysqli_error($connect);
            }

            // Ferme la connexion à la base de données
            mysqli_close($connect);
        } else $erreur = "Veuillez remplir tout les champs";
    }
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
        <main>
            <?php include("Global/header.html") ?>
            <div class="wrap">
            <?php if(isset($succes)) {?>
                <span class="succes"><?php echo $succes ?></span>
            <?php } if(isset($erreur)) {?>
                <span class="erreur" ><?php echo $erreur ?></span>
            <?php } ?>
                <form method="POST" action="#">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="text" name="mail" placeholder="Mail">
                    <input type="password" name="password" placeholder="Mot de Passe" minlength="8" required>
                    <button type="submit" name="action" value="inscription">S'inscrire</button>
                </form>
                <form method="POST" action="#">
                    <input type="text" name="mail" placeholder="Mail">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <button type="submit" name="action" value="connexion">Connexion</button>
                </form>
                <div class="txt">
                    <h2>Hello World !</h2>
                </div>
            </div>
            <?php include("Global/footer.html") ?>
        </main>
    </body>
    
</html>