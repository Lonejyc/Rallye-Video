<header>
    <a href="index.php"><h1>Rallye video</h1></a>
    <img src="images/logo.svg">
    <ul>
        <li><h2>Événement</h2></li>
        <li><a href="equipes.php"><h2>Équipe</h2></a></li>
        <li><h2>Dépot</h2></li>
        <li><h2>Vote</h2></li>
    </ul>
    <h2>Live</h2>
    <?php if (isset($_SESSION['user_id'])) {
        echo "<a href='deconnexion.php'><h2>Déconnexion</h2></a>";
    } else {
        echo "<a href='inscription.php'><h2>Connexion</h2></a>";
    } ?>
</header>