<?php
session_start();
// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, affichez un message et empêchez-le de voter.
    echo "Vous devez vous connecter pour voter\n";
    echo "<a href='se_connecter.php'>Connexion</a>";
    exit; // Arrêtez le script
}
require_once('connexion.php');

if (isset($_POST['vote'])) {
    $action = $_POST['vote'];
    if ($action == "VOTER") {
        $id_film = $_POST['id_film'];
        $id_user = $_SESSION['user_id'];

        $req = "SELECT * FROM rv_votes WHERE rv_user_id = '$id_user'";
        $result = mysqli_query($CONNEXION, $req);
        if(mysqli_num_rows($result) >= 1){
            $error = "Vous avez déjà voté";
        } else {
            $req = "INSERT INTO rv_votes (rv_user_id, rv_depot_id) VALUES ('$id_user', '$id_film')";
            mysqli_query($CONNEXION, $req);
            $succes = "Merci d'avoir voté";
        }
    }
}
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
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/vote.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- Titre de la page web -->
        <title>Rallye Video - Vote</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Vote</h1>
                <?php if(isset($error)) {?>
                <p class="erreur" role="alert"><?php echo $error; ?></p>
                <?php } else if(isset($succes)) {?>
                    <p class="succes"><?php echo $succes; ?></p>
                <?php } ?>
                <?php $request = "SELECT * FROM rv_depot"; ?>
                <div class="films" role="list">
                    <?php if($rv_depot = mysqli_query($CONNEXION, $request)): ?>
                    <?php foreach($rv_depot as $rv_depot): ?>
                    <div class="film" role="listitem">
                        <div class="affiche">
                            <img src="images/<?php echo $rv_depot['Affiche']; ?>" alt="<?php echo $rv_depot['Affiche']; ?>" loading="lazy"/>
                            <form action="#" method="POST">
                                <input type="hidden" name="id_film" value="<?php echo $rv_depot['id']; ?>">
                                <button type="submit" name="vote" value="VOTER" aria-label="Voter pour <?php echo $rv_depot['Nom_film']; ?>">VOTER</button>
                            </form>
                        </div>
                        <p class="nom"><?php echo $rv_depot['Nom_film']; ?></p>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>