<?php 
session_start();
require_once('connexion.php');

if(isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = $_POST['name'];
    $poster = $_POST['poster'];
    $link = $_POST['link'];
    $team = $_POST['team'];

    $request = "INSERT INTO rv_depot (Nom_film, rv_team_id, Affiche, Video) VALUES ('$name', '$team', '$poster', '$link')";
    if(mysqli_query($CONNEXION, $request)) {
        $succes1 = "Film ajouté avec succès";
    } else {
        echo "Erreur : " . mysqli_error($CONNEXION);
    }
}

if(isset($_POST['action']) && $_POST['action'] === 'remove') {
    $id = $_POST['films'];

    $request = "DELETE FROM rv_depot WHERE id = $id";
    if(mysqli_query($CONNEXION, $request)) {
        $succes2 = "Film supprimé avec succès";
    } else {
        echo "Erreur : " . mysqli_error($CONNEXION);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">

        <title>Rallye Video</title>
    </head>

    <body>
        <div class="wrap">
            <?php include("Global/header.php") ?>
            <main>
                <h1>Gestion des données</h1>
                <section class="addFilm" aria-label="Ajout de films">
                    <h2>Ajout de films</h2>
                    <?php if(isset($succes1)) {?>
                        <span class="succes"><?php echo $succes1 ?></span>
                    <?php } ?>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Nom du film" required>
                        <input type="text" name="poster" placeholder="Affiche" required>
                        <input type="url" name="link" placeholder="Lien Youtube" required>
                        <?php
                            $request = "SELECT * FROM rv_team";
                            $teams = mysqli_query($CONNEXION, $request);
                        ?>
                            <select name="team">
                                <option value="" disabled selected>Team</option>
                                <?php while ($team = mysqli_fetch_assoc($teams)): ?>
                                <option value="<?php echo $team['id']; ?>"><?php echo $team['Nom_equipe']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        <button type="submit" name="action" value="add">Ajouter</button>
                    </form>
                </section>
                <section class="remFilm" aria-label="Suppression de films">
                    <h2>Suppression de films</h2>
                    <?php if(isset($succes2)) {?>
                        <span class="succes"><?php echo $succes2 ?></span>
                    <?php } ?>
                    <form action="" method="POST">
                    <?php
                        $request = "SELECT * FROM rv_depot";
                        $films = mysqli_query($CONNEXION, $request);
                    ?>
                        <select name="films">
                            <option value="" disabled selected>Films</option>
                            <?php while ($film = mysqli_fetch_assoc($films)): ?>
                                <option value="<?php echo $film['id']; ?>"><?php echo $film['Nom_film']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit" name="action" value="remove">Supprimer</button>
                    </form>
                </section>
                <section class="result" aria-label="Résultat des votes">
                    <h2>résultat des votes</h2>
                </section>
            </main>
            <?php include("Global/footer.php") ?>
        </div>
    </body>

</html>