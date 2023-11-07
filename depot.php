<?php 
    session_start();
    if(isset($_POST['action'])) {        
        $action = $_POST['action'];
        if ($action == 'envoie') {
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $connect = mysqli_connect('192.168.135.113', 'boullayt', '!decOrgyu159', 'boullayt');
            $query = "SELECT Nom, Prenom, Email, Mdp, rv_team_id, Nom_equipe FROM rv_user u RIGHT JOIN rv_team t ON u.rv_team_id=t.id WHERE u.id = $user_id";
            $result = mysqli_query($connect, $query);
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $nom = $row["Nom"];
                    $prenom = $row["Prenom"];
                    $mail = $row["Email"];
                    $team_id = $row["rv_team_id"];
                    $team = $row["Nom_equipe"];
                }
            } if(isset($team_id)) {
                if(!empty($_POST["nom"]) AND !empty($_POST["affiche"]) AND !empty($_POST["minia"]) AND !empty($_POST["video"])) {
                    // Récupération du lien soumis
                    $nom = $_POST["nom"];
                    $affiche = $_POST["affiche"];
                    $minia = $_POST['minia'];
                    $video = $_POST['video'];

                    // Préparation de la requête SQL
                    $sql = "INSERT INTO rv_depot (Nom_film, rv_team_id, Affiche, Miniature, Video) VALUES ('$nom', '$team_id', '$affiche', '$minia', '$video')";

                    // Exécution de la requête SQL
                    if ($connect->query($sql) === TRUE) {
                        echo "Les données de votre film ont été ajouté avec succès à la base de données.";
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $connect->error;
                    }
                } else {
                    echo "Veuillez remplir tout les champs";
                }
            } else {
                echo "Vous n'êtes inscrit dans aucune team";
            }
        } else {
            echo "Connexion requise pour déposer les fichiers";
        }
        $connect->close();
    }
}
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='css/style.css' rel='stylesheet'>
        <link href='css/header.css' rel='stylesheet'>
        <link href='css/footer.css' rel='stylesheet'>        

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Rallye Video</title>
    </head>

    <body>
        <?php include("Global/header.php") ?>
        <main>
            <section>
                <h1>Déposer un film</h1>
                <p><span>Pour déposer un film, vous devez mettre les liens mmi-cloud de votre film</span></p>
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="text" name="nom" placeholder="Nom de votre film" required>
                    <input type="text" name="affiche" placeholder="Affiche de votre film" required>
                    <input type="text" name="minia" placeholder="Miniature de votre film" required>
                    <input type="text" name="video" placeholder="Film" required>
                    <button type="submit" name="action" value="envoie">Envoyer</button>
                </form>
            </section>
        </main>
        <?php include("Global/footer.php") ?>
    </body>

</html>