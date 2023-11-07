<?php
session_start();

// Récupère les données saisies par l'utilisateur
if(isset($_POST['action'])) {
    $action = $_POST['action'];
    if($action == 'inscription') {
        if(!empty($_POST['name']) AND !empty($_POST['firstName']) AND !empty($_POST['mail']) AND !empty($_POST['password'])) {
            $nom = $_POST['name'];
            $prenom = $_POST['firstName'];
            $mail = $_POST['mail'];
            $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

            // Connexion à la base de données
            $connect = mysqli_connect('192.168.135.113', 'boullayt', '!decOrgyu159', 'boullayt');

            // Vérifie si la connexion a réussi
            if (!$connect) {
                die('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Prépare la requête SQL pour insérer les données dans la table "utilisateurs"
            $request = "INSERT INTO rv_user (Nom, Prenom, Email, Mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";

            // Exécute la requête SQL
            if (mysqli_query($connect, $request)) {
                $succes2 = "Votre compte a été créé avec succès";
            } else {
                echo "Erreur : " . mysqli_error($connect);
            }

            // Ferme la connexion à la base de données
            mysqli_close($connect);
        } else $erreur2 = "Veuillez remplir tout les champs";
    } else if($action == 'connexion') {
        if(!empty($_POST['mail']) AND !empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $mdp = $_POST['password'];

            // Connexion à la base de données
            $connect = mysqli_connect('192.168.135.113', 'boullayt', '!decOrgyu159', 'boullayt');
            
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
                        header('Location: dashboard.php');
                        exit();
                    } else {
                        $erreur1 = "Mot de passe incorrect";
                    }
                } else {
                    $erreur1 = "Utilisateur introuvable";
                }
            } else {
                echo "Erreur : " . mysqli_error($connect);
            }

            // Ferme la connexion à la base de données
            mysqli_close($connect);
        } else $erreur1 = "Veuillez remplir tout les champs";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/inscription.css" rel="stylesheet">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Rallye Video</title>
    </head>

    <body>
        <?php include("Global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Connexion</h1>
                <section class="container">
                    <div class="card">
                        <div class="conne">
                            <?php if(isset($erreur1)) {?>
                                <span class="error" ><?php echo $erreur1 ?></span>
                            <?php } ?>
                            <form method="POST" action="#">
                                <h2>Connexion</h2>
                                <input type="text" name="mail" placeholder="Mail" autocomplete="off" required>
                                <input type="password" name="password" placeholder="Mot de passe" autocomplete="off" required>
                                <button type="submit" name="action" value="connexion" class="submit">Connexion</button>
                            </form>
                            <section class="infos">
                                <p>Nouveau ici ?</p>
                                <button class="change normal">S'inscrire</button>
                            </section>
                        </div>
                        <div class="inscr">
                        <?php if(isset($succes2)) {?>
                            <span class="succes"><?php echo $succes2 ?></span>
                        <?php } if(isset($erreur2)) {?>
                            <span class="error" ><?php echo $erreur2 ?></span>
                        <?php } ?>
                            <form method="POST" action="#">
                                <h2>Inscription</h2>
                                <input type="text" name="name" placeholder="Nom" required>
                                <input type="text" name="firstName" placeholder="Prénom" required>
                                <input type="text" name="mail" placeholder="Mail" required>
                                <input type="password" name="password" placeholder="Mot de Passe" minlength="8" required>
                                <button type="submit" name="action" value="inscription" class="submit">S'inscrire</button>
                            </form>
                            <section class="infos">
                                <p>Déjà inscrit ?</p>
                                <button class="change reverse">Se connecter</button>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
            <script src="script/flipcard.js"></script>
        </main>
        <?php include("Global/footer.php") ?>
    </body>
    
</html>