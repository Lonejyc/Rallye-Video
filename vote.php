<?php
session_start();
// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, affichez un message et empêchez-le de voter.
    echo "Vous devez vous connecter pour voter";
    echo "<a href='se_connecter.php'>Connexion</a>";
    exit; // Arrêtez le script
}
require_once('connexion.php');
$request = "SELECT * FROM rv_depot";

if (isset($_POST['vote'])) {
    $action = $_POST['vote'];
    if ($action == "Voter") {
        $id_film = $_POST['id_film'];
        $id_user = $_SESSION['user_id'];

        $req = "SELECT * FROM rv_votes WHERE rv_user_id = '$id_user'";

        $result = mysqli_query($CONNEXION, $req);
        if(mysqli_num_rows($result) >= 1){
            $vote = "Vous avez déjà voté";
        } else {
            $req = "INSERT INTO rv_votes (rv_user_id, rv_depot_id) VALUES ('$id_user', '$id_film')";
            mysqli_query($CONNEXION, $req);
            $vote = "Merci d'avoir voté";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <link href='css/reset.css' rel='stylesheet'>

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
  
        <title>Rallye Video</title>
    </head>
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div>
                <h1>Vote</h1>
                <?php if(isset($vote)): ?>
                <p><?php echo $vote; ?></p>
                <?php endif; ?>
                <div class="films">
                    <?php if($rv_depot = mysqli_query($CONNEXION, $request)): ?>
                    <?php foreach($rv_depot as $rv_depot): ?>
                    <div class="film">
                        <span class="affiche"><?php echo $rv_depot['Affiche']; ?></span>
                        <span class="nom"><?php echo $rv_depot['Nom_film']; ?></span>
                        <form action="#" method="POST">
                            <input type="hidden" name="id_film" value="<?php echo $rv_depot['id']; ?>">
                            <input type="submit" name="vote" value="Voter">
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>