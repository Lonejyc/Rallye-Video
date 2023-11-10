<header>
    <nav>
        <div class="logo">
            <a href="index.php"><h1>Rallye video</h1>
            <img src="images/logo.svg"></a>
        </div>
        <ul>
            <li><a href="evenement.php">Événement</a></li>
            <li><a href="equipes.php">Équipe</a></li>
            <li><a href="depot.php">Dépot</a></li>
            <li><a href="vote.php">Vote</a></li>
        </ul>
        <ul>
            <li><a href="live.php">Live</a></li>
            <?php if (isset($_SESSION['user_id'])) {
                echo "<li><a href='dashboard.php'>Dashboard</a></li>";
            } else {
                echo "<li><a href='se_connecter.php'>Connexion</a></li>";
            } ?>
        </ul>
    </nav>
</header>