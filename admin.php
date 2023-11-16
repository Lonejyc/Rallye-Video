<?php 
session_start();
require_once('connexion.php');

if(isset($_POST['action']) && $_POST['action'] === 'add') {
    $img_nom = $_FILES['image']['name'];
    $tmp_nom = $_FILES['image']['tmp_name'];
    $time = time();
    $new_nom_img = $time.$img_nom;
    $deplacer_img = move_uploaded_file($tmp_nom,'images/'.$new_nom_img);

    if($deplacer_img){
        $name = $_POST['name'];
        $link = $_POST['link'];
        $team = $_POST['team'];

        $request = "INSERT INTO rv_depot (Nom_film, rv_team_id, Affiche, Video) VALUES ('$name', '$team', '$new_nom_img', '$link')";
        if(mysqli_query($CONNEXION, $request)) {
            $succes1 = "Film ajouté avec succès";
        } else {
            echo "Erreur : " . mysqli_error($CONNEXION);
        }
    } else {
        echo "Erreur lors du déplacement de l'image";
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
<!-- Partie HTML de la page -->
<html>
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
        <link href="css/admin.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video - Admin</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1 class="gest">Gestion des données</h1>
                <section class="addFilm" aria-label="Ajout de films">
                    <h2>Ajout de films</h2>
                    <?php if(isset($succes1)) {?>
                        <span class="succes"><?php echo $succes1 ?></span>
                    <?php } else if(isset($error1)) {?>
                        <span class="error"><?php echo $error1 ?></span>
                    <?php } ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Nom du film" required>
                        <div class="poster">
                            <label>Image (en png): </label>
                            <input type="file" name="image" placeholder="Affiche" required>
                        </div>                            
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
                    <?php
                        $request = "SELECT d.Nom_film, COUNT(d.Nom_film) AS 'Nombre de votes' 
                        FROM rv_depot d
                        LEFT JOIN rv_votes v ON d.id=v.rv_depot_id 
                        GROUP BY d.Nom_film;";
                        $films = mysqli_query($CONNEXION, $request);
                    ?>
                    <table>
                        <tr>
                            <th>Film</th>
                            <th>Nombre de votes</th>
                        </tr>
                        <?php foreach($films as $film): ?>
                        <tr>
                            <td><?php echo $film['Nom_film']; ?></td>
                            <td><?php echo $film['Nombre de votes']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>

</html>